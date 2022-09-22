<?php

namespace App\Http\Controllers;

use DOMComment;
use DOMDocument;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function returnView() {
        return view('testpost');
    }

    public function post() {
        $url = "https://www.fxp.co.il/register.php";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        $response = curl_exec($ch);

        $data = [
            'username' => 'batterystaple',
            'email' => 'correcthorse@gmail.com',
            'agree' => '1',
            'securitytoken' => 'guest',
            'do' => 'addmember',
            'url' => 'https://www.fxp.co.il/',
            'password_md5' => '81dc9bdb52d04dc20036dbd8313ed055',  // 1234
            'passwordconfirm_md5' => '81dc9bdb52d04dc20036dbd8313ed055'
        ];


        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $result = curl_exec($ch);
        echo $result;
    }
}
