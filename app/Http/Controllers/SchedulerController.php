<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban\NomorDua;
use App\Jawaban\NomorTiga;
use App\Jawaban\NomorEmpat;
use Illuminate\Support\Facades\Auth;

class SchedulerController extends Controller {

    public function home() {
        $nomorTiga = new NomorTiga(); 
        return $nomorTiga->getData();  
    }

    public function submit (Request $request) {

        $nomorDua = new NomorDua();
        return $nomorDua->submit($request);
    }

    public function getJson () {

        $nomorEmpat = new NomorEmpat();
        return $nomorEmpat->getJson(); 
    }

    public function getSelectedData (Request $request) {

        $nomorTiga = new NomorTiga(); 
        return $nomorTiga->getSelectedData($request);
    }

    public function update (Request $request) {

        $nomorTiga = new NomorTiga();
        return $nomorTiga->update($request);
    }

    public function delete (Request $request) {

        $nomorTiga = new NomorTiga();
        return $nomorTiga->delete($request);
    }
}
