<?php

namespace App\MyLibs\GetTestTakers;

CLass Factory {

    public static function get(String $type) {
        $type = ucfirst(strtolower($type)); // to avoid case sensitive check and create proper class name.
        switch ($type) {
            case 'Mysql':
                $classname = 'App\Testtaker';
                break;
            case 'Csv':
            case 'Rest':
            case 'Json':
                $classname = 'App\MyLibs\GetTestTakers\TestTakers'.$type;
                break;
            default:
                $classname = 'App\MyLibs\GetTestTakers\TestTakersJson';
                break;
        }
        $theClass = new $classname();
        return $theClass->getTestTakers();
    }

}