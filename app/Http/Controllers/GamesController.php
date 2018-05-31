<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getResult(Request $request)
    {

        // 1. get the value from the input with Laravel request

        $sub = $request->sub_text;
        $text = $request->text;

        $sub = strtolower($sub);
        $text = strtolower($text);

        // 2. check if the input value is null
        if($sub == '' || $text == ''){

            $message = "Please Enter Text and Sub text";

            return response()->json($message);
        }

        $arr = explode($sub, $text);

        unset($arr[count($arr) - 1]);

        $countSub = strlen($sub);
        $startStr = 0;
        $result  = [];

        foreach ($arr as $value) {
            $count = strlen($value);
            $startStr += ($count + 1);
            $result[] = $startStr;
            $startStr += ( $countSub - 1 );
        }

        return response()->json($result); 

    }

}
