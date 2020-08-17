<?php
namespace Mvc\Exceptions;
use Exception;

class ExceptionHandler extends Exception {
    public function report() {
        echo 'Caught exception: ' . $this->getMessage() . '<BR>' . 
        'In file: ' . $this->getFile() . '<BR>' . 
        'In line: ' . $this->getLine() . '<BR>' . 
        'Trace: ' . $this->getTraceAsString();
    }    
}
