<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Data;
use App\Verifikasi;
use App\Antri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use QRCode;

class ReadController extends Controller
{
    public function index(){

        $key = Auth::user()->key;

        $users = DB::table('cores')
                    ->where('key',$key)
                    ->get();

		return view('index',['data' => $users]);
    }

    public function dashboard(){

      $key = Auth::user()->key;

       $total = DB::table('data')
                ->where('key',$key)
                ->join('antris', 'antris.fk_id', '=', 'data.id')
                ->select('data.*','antris.nomor_antri')               
                ->sum('antris.nomor_antri');

		return view('dashboard',['data' => $total]);
    }


    public function semua()
	{

        $key = Auth::user()->key;

        $users = DB::table('cores')
                    ->where('key',$key)
                    ->get();

		return view('cores',['data' => $users]);

	}
}
