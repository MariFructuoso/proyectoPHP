<?php

namespace dwes\app\utils;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Level;

class MyLog
{
    /**
     * @var \Monolog\Logger
     */
    private $log;

    private $level;
    /**
     * @param string $filename
     */

    private function __construct(string $filename, $level)
    {
        $this->level = $level;
        $this->log = new Logger('name');
        $this->log->pushHandler(new StreamHandler($filename, $this->level));
    }

    /**
     * @param string $filename
     * @return MyLog
     */

    public static function load(string $filename, $level = Level::Info): MyLog
    {
        return new MyLog($filename, $level);
    }

    /**
     * @param string $message
     * @return void
     */

    public function add(string $message): void
    {
        $this->log->log($this->level, $message);
    }
}
