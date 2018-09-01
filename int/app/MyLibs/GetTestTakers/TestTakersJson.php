<?php

namespace App\MyLibs\GetTestTakers;

use App\MyLibs\GetTestTakers\TestTakersInt;

CLass TestTakersJson implements TestTakersInt {

    public function getTestTakers() {
        return json_decode(file_get_contents('testtakers.json'),1);
    }

}