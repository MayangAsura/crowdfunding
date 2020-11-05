<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['emailMid', 'adminMid', 'auth']);
    }

    public function room1(){
        return 'Berhasil Masuk karena Email sudah diverifikasi';
    }
    public function room2(){
        return 'Berhasil Masuk sebagai Admin';
    }

}
