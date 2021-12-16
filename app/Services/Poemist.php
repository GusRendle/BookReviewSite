<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class Poemist
{
    public function getData() {
        $poems = HTTP::get("https://www.poemist.com/api/v1/randompoems");
        return $poems[0];
    }
}