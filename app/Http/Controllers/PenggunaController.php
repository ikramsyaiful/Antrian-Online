<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Data;
use App\Core;
use App\Verifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use QRCode;

class PenggunaController extends Controller
{
    public function viewpengguna(){

        $Data = DB::table('cores')
		            ->paginate(9);
          
		return view('welcome',['data' => $Data]);
    }

    public function showpengguna($id){

        $ini = Core::findOrFail($id);

       $Data = DB::table('data')
                    ->join('antris', 'antris.fk_id', '=', 'data.id')
                    ->where('data.fk_id',$id)
                    ->select('data.*','antris.random', 'antris.qrcode','antris.antri_jalan','antris.nomor_antri')
                    ->paginate(9);
                    
		return view('welcomeshow',['id' => $ini])->with('data', $Data);
    }

	public function cari(Request $request)
	{
		
		$cari = $request->cari;

		$Data = DB::table('cores')
		            ->where('name','like',"%".$cari."%")
		            ->paginate(9);

		return view('welcome',['data' => $Data]);
	}
}
