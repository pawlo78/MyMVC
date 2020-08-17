<?php

//tworzy tablice z naszych konfiguracji znajdujacyc sie w pliku config/app.php
$configs = [];
$configs['app'] = require __DIR__ . '/../config/app.php';

return $configs;