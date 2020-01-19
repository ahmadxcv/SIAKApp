<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $q = DB::select(
            DB::raw("SELECT * FROM pengajuans WHERE DATE(created_at) LIKE CURRENT_DATE"));
        $jumlah = count($q);
        return view('welcome')->with('jumlah', $jumlah);
    }
}
