<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidController extends Controller
{
    public function summaryApi()
    {
        $response = Http::get('https://api.kawalcorona.com/indonesia');
        $data = $response->json();
        return response($data);
    }
}
