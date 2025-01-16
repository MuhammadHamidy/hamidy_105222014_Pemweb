<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban\NomorSatu;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function auth (Request $request) {

        $nomorSatu = new NomorSatu();
        return $nomorSatu->auth($request);
    }

    public function logout (Request $request) {
        $nomorSatu = new NomorSatu();
        return $nomorSatu->logout($request);
    }
}
