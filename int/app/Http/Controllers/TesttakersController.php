<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testtaker;
use App\MyLibs\GetTestTakers\Factory;

class TesttakersController extends Controller
{
    //

    public function index(Request $request) {

        $input = $request->all();

        // $fileTypeArrays = ['csv', 'json','mysql','REST'];
        $input['file_type'] = isset($input['file_type']) ? $input['file_type'] : 'json';

        // Could be better written using a design pattern but not sure with requirement so keeping it safe with a switch.
        switch ($input['file_type']) { // giving option for the source
            case 'csv':
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
                break;
            case 'mysql':
                $dataObj = new Testtaker;
                $data = $dataObj->getTestTakers();
                break;

            case 'REST':
                $data = [];
                // Your curl operations will come here to fetch data from another REST web service
                break;

            case 'json':
            default:
                $data = json_decode(file_get_contents('testtakers.json'),1);
                break;
        }

        return response()->json([
            'status'=>'success',
            'test_takers'=>$data
        ],200); // no need of writin 200, its a default http status code on succesfull response
    }

    // Handling it using a Factory Design Pattern
    public function getTestTakersByFactory(Request $request) {
        $input = $request->all();
        $input['file_type'] = isset($input['file_type']) ? $input['file_type'] : 'json';

        $data = Factory::get($input['file_type']);
        return response()->json([
            'status'=>'success',
            'test_takers'=>$data
        ],200); // no need of writin 200, its a default http status code on succesfull response
    }
}
