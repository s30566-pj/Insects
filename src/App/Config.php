<?php

namespace App;

use http\Exception\RuntimeException;

class Config
{
    public static array $data =[]; // Config data

    public static function load(string $file)
    {
        // Throw exception when file doesnt exist
        if (!file_exists($file)) {
            throw new RuntimeException("Config file '$file' not found", 500);
        }

        //this will be provided in index.php
         self::$data =require $file;
    }
    // gets array from given key
    public static function getConfigArray(string $key, $default = null){
        return self::$data[$key] ?? $default;
    }
    // get one value
    public static function getConfigValue(string $group, string $key, $default = null){
        return self::$data[$group][$key] ?? $default;
    }

}