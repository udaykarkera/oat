<?php

namespace App\MyLibs\GetTestTakers;

use App\MyLibs\GetTestTakers\TestTakersInt;

CLass TestTakersCsv implements TestTakersInt {

    public function getTestTakers() {
        $csvArray = array_map("str_getcsv", explode("\n", file_get_contents('testtakers.csv')));
        $count = 0;
        $data = [];
        $csvRowCount = count($csvArray);
        foreach ($csvArray as $index => $value) {
            if ($index < $csvRowCount - 1) {
                if ($count == 0)
                    $header = $value;
                else {
                    foreach ($value as $key => $csvValue) {
                        $row[$header[$key]] = $csvValue;
                    }
                    $data[] = $row;
                }
                ++$count;
            }
        }
        return $data;
    }

}