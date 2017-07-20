<?php

namespace Learning;

require_once 'logger_interface.php';

class Logger implements LoggerInterface
{
    public function log($message)
    {
        echo $message . "<br/>";
    }
}
