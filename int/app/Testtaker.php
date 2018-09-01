<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\GetTestTakers\TestTakersInt;

class Testtaker extends Model implements TestTakersInt
{
    //

    public function getTestTakers() {
        // here you mysql operation will come
        return [];
    }
}
