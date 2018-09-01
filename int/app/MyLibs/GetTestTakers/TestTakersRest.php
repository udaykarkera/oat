<?php

namespace App\MyLibs\GetTestTakers;

use App\MyLibs\GetTestTakers\TestTakersInt;

CLass TestTakersRest implements TestTakersInt {

    public function getTestTakers() {
        $data = [];
        // Your curl operations will come here to fetch data from another REST web service
        return $data;
    }

}