<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    function test()
    {
        //$file = Storage::disk("public")->get("images/brands/tVM7kVJe6z7YJFfei7s1kjKrhLCVv9ocshQS25wd.png");
        //return  Storage::disk("public")->download("images/brands/tVM7kVJe6z7YJFfei7s1kjKrhLCVv9ocshQS25wd.png");
       // Storage::disk("public")->copy("images/brands/tVM7kVJe6z7YJFfei7s1kjKrhLCVv9ocshQS25wd.png" ,"images/tVM7kVJe6z7YJFfei7s1kjKrhLCVv9ocshQS25wd.png");
        Storage::disk("public")->move("images/brands/tVM7kVJe6z7YJFfei7s1kjKrhLCVv9ocshQS25wd.png" ,"images/tVM7kVJe6z7YJFfei7s1kjKrhLCVv9ocshQS25wd.png");


        
    }
}
