<?php
/* require_once '/../src/exceptions/FileException.class.php';*/
require_once __DIR__ . '/../exceptions/FileException.class.php';

class File
{
    private $file; // Contenido del fichero que se sube al servidor
    private $fileName; // Nombre del fichero

    // Se pasa el nombre del fichero y una lista con los tipos de archivos que acepta la clase.
    /**
     * @param string $fileName
     * @param array $arrTypes
     * @throws FileException
     */
    public function __construct(string $fileName, array $arrTypes)
    {
        $this->file = $_FILES[$fileName]; // $_FILES guarda los datos que se envían en forma de fichero
        $this->fileName = '';
        if (!isset($this->file)) { // Comprobar si ya existe el fichero o establecer un error
            throw new FileException('Debes seleccionar un fichero');
        } {
            if ($this->file['error'] !== UPLOAD_ERR_OK) // Si se ha producido algún error en la subida
                switch ($this->file['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new FileException('El fichero es demasiado grande');
                    case UPLOAD_ERR_PARTIAL:
                        throw new FileException('No se ha podido subir el fichero completo');
                    default:
                        throw new FileException('No se ha podido subir el fichero');
                }
        }
        // Comprobar si los archivos pasados son de un tipo admitido
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    public function getFileName()
    {
        return $this->fileName;
    }
    /**
     * @param string $rutaDestino
     * @return void
     * @throws FileException
     */
    public function saveUploadFile(string $rutaDestino)
    {
        // Primero hay que comprobar que el fichero se ha subido desde el formulario.
        // Hay un tipo de ataques que intenta acceder a archivos del SO
        if (is_uploaded_file($this->file['tmp_name']) === false)
            throw new FileException('El archivo no ha sido subido mediante un formulario.');
        
        $this->fileName = $this->file['name'];
        
        // Ruta absoluta al directorio del proyecto
        $projectRoot = realpath(__DIR__ . '/../../');
        
        // Eliminar cualquier barra inicial de rutaDestino
        $rutaDestino = ltrim($rutaDestino, '/');
        
        // Construir la ruta completa al archivo
        $rutaCompleta = $projectRoot . '/' . $rutaDestino . $this->fileName;
        
        // Asegurarse de que el directorio de destino existe
        $directorioDestino = dirname($rutaCompleta);
        if (!is_dir($directorioDestino)) {
            if (!mkdir($directorioDestino, 0777, true)) {
                throw new FileException('No se puede crear el directorio de destino');
            }
        }
        
        // Comprobamos si ya existe el fichero
        if (is_file($rutaCompleta) === true) {
            // Generamos un nombre aleatorio
            $idUnico = time();
            $this->fileName = $idUnico . "_" . $this->fileName;
            $rutaCompleta = $projectRoot . '/' . $rutaDestino . $this->fileName;
        }
        
        if (move_uploaded_file($this->file['tmp_name'], $rutaCompleta) === false)
            throw new FileException('No se puede mover el archivo a su destino: ' . $rutaCompleta);
    }
}
