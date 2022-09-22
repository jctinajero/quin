<?php

namespace App\Libs;

class Logger
{
    function __construct()
    {
        $this->log = new \Monolog\Logger($_ENV['APP_NAME']);
        $this->filename = $_ENV['LOG_PATH'];
    }

    public function warning($message)
    {
        $this->log->pushHandler(new \Monolog\Handler\StreamHandler($this->filename, \Monolog\Logger::WARNING));
        $this->log->warning($message);
    }

    public function error($message)
    {
        $this->log->pushHandler(new \Monolog\Handler\StreamHandler($this->filename, \Monolog\Logger::ERROR));
        $this->log->error($message);
    }

    public function info($message)
    {
        $this->log->pushHandler(new \Monolog\Handler\StreamHandler($this->filename, \Monolog\Logger::INFO));
        $this->log->info($message);
    }
}
