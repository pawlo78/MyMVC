<?php
use Mvc\Exceptions\HelpersException;
use Mvc\Http\Response\Response;


//funkcja pomocnicza do zmiennych srodowiskowych .env
function env($key, $default) {
    if(isset($_ENV[$key]))
    return $_ENV[$key];
    return $default;
}

//funkcja do ładowania naszych konfigow zapisanych w ../config/app.php
//wykorzystując loadrera - ../loaders/configs.php
function config($config) {
    $configs = require __DIR__ . '/../loaders/configs.php';

    $configArray = explode('.', $config);
    try {
        if(isset($configs[$configArray[0]])){
            $fromConfig = $configs[$configArray[0]];            
            if(isset($fromConfig[$configArray[1]]))            
            return $fromConfig[$configArray[1]];
        }
        throw new HelpersException('Config ' . $config . ' does not exists.');

    } catch(HelpersException $ex) {
        exit($ex->report());
    }
}

function response() {
    return new Response();
}