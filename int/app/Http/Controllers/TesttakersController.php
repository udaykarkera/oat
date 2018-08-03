<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testtaker;

class TesttakersController extends Controller
{
    //

    public function index(Request $request) {

        $input = $request->all();

        $fileTypeArrays = ['csv', 'json','mysql','REST'];
        if (isset($input['file_type']) && in_array($input['file_type'], $fileTypeArrays)) {

            // Could be better written using a design pattern but not sure with requirement so keeping it safe with a switch.
            switch ($input['file_type']) { // giving option for the source
                case 'json':
                    $data = json_decode(file_get_contents('testtakers.json'),1);
                    break;
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
                    $data = $dataObj->mysqlTesttaker();
                    break;

                case 'REST':
                    $data = [];
                    // Your curl operations will come here to fetch data from another REST web service
                    break;

                default:
                    # code...
                    break;
            }

        }
        else {
            $data = json_decode(file_get_contents('testtakers.json'),1);
        }
        return response()->json([
            'status'=>'success',
            'test_takers'=>$data
        ],200); // no need of writin 200, its a default http status code on succesfull response
    }
}
