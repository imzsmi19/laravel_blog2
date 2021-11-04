<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    //
    public function register(){
        // $response = Http::get('https://api.kawalcorona.com/indonesia');
        // $response = Http::post('http://127.0.0.1:8000/api/register', [
            $response = Http::post('http://localhost/laravel_jwt2/public/api/register', [
            'name' => 'Steve',
            'email' => 'steve@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);
        $responseBody = json_decode($response->getBody());
        return dd($responseBody);
        // return view('blog.register', compact('responseBody'));
    }
}
