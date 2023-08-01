<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Core;
use App\User;
use App\Data;
use SweetAlert;
class AdminDataController extends Controller
{
     public function index()
	{
        $total = DB::table('users')
                    ->where('type','=','default')
                    ->count();

        $total2 = DB::table('cores')
                    ->count();

        $total3 = DB::table('data')
                    ->count();

        $total4 = DB::table('data')
                    ->join('antris', 'antris.fk_id', '=', 'data.id')
                    ->select('data.*','antris.antri_jalan')               
                    ->sum('antris.antri_jalan');

		return view('admin.data.index')->with('total', $total)->with('total2', $total2)->with('total3', $total3)->with('total4', $total4);
	}

    public function user()
	{
        $total = DB::table('users')
                    ->where('type','=','default')
                    ->count();

        $Data = DB::table('users')  
                    ->where('type','=','default')
                    ->paginate(5);
                    
		return view('admin.data.menu.user',['data' => $Data])->with('total', $total);

	}

    public function cariuser(Request $request)
    {
        $cari = $request->cari;

        $total = DB::table('users')
                    ->where('type','=','default')
                    ->where('name','like',"%".$cari."%")
                    ->count();

		$users = DB::table('users')
                    ->where('type','=','default')
                    ->where('name','like',"%".$cari."%")
                    ->paginate(5);

		return view('admin.data.menu.user',['data' => $users])->with('total', $total);
    }

    public function viewantrian()
	{
        $total = DB::table('cores')
                    ->count();

        $Data = DB::table('cores')
                    ->paginate(6);
                    
		return view('admin.data.menu.antrian',['data' => $Data])->with('total', $total);

	}
    public function infokontak()
	{
	return view('admin.data.menu.infokontak');
	}

    public function cariantrian(Request $request)
    {
        $cari = $request->cari;

        $total = DB::table('cores')
                    ->where('name','like',"%".$cari."%")
                    ->count();

		$users = DB::table('cores')
                    ->where('name','like',"%".$cari."%")
                    ->paginate(6);

		return view('admin.data.menu.antrian',['data' => $users])->with('total', $total);
    }

    public function viewdaftarantrian()
	{
       $total = DB::table('data')
                    ->count();

       $Data = DB::table('data')
                    ->join('antris', 'antris.fk_id', '=', 'data.id') 
                    ->select('data.*','antris.random', 'antris.qrcode','antris.antri_jalan','antris.nomor_antri')
                    ->paginate(9);
                    
	   return view('admin.data.menu.daftarantrian',['data' => $Data])->with('total', $total);
	}

    public function caridaftarantrian(Request $request)
    {
        $cari = $request->cari;

        $total = DB::table('data')
                    ->where('name','like',"%".$cari."%")
                    ->count();

		$users = DB::table('data')
                    ->where('name','like',"%".$cari."%")
                   ->join('antris', 'antris.fk_id', '=', 'data.id')
                    ->select('data.*','antris.random', 'antris.qrcode','antris.antri_jalan','antris.nomor_antri')
                    ->paginate(9);

		return view('admin.data.menu.daftarantrian',['data' => $users])->with('total', $total);
    }

     public function tambahuser()
	{
        
        $Data = DB::table('users')
                    ->paginate(9);
                    
		return view('admin.data.tambahuser',['data' => $Data]);

	}

     public function edituser($id)
	{
          $ini = User::find($id);

        $Data = DB::table('users')
                    ->where('id','=',$id)
                    ->get();
                    
		return view('admin.data.edituser',['data' => $ini]);

	}

    //antrian

     public function antrian($id)
	{
       $total = DB::table('cores')
                    ->where('cores.fk_id',$id)
                    ->count();

        $Data = DB::table('users')
                    ->where('cores.fk_id',$id)
                    ->join('cores', 'cores.fk_id', '=', 'users.id')
                    ->select('users.*','cores.id','cores.name', 'cores.alamat','cores.nomor')
                    ->paginate(6);
        $ini = User::findOrFail($id);            
		return view('admin.data.antrian',['id' => $ini])->with('data', $Data)->with('total', $total);
	}

     public function editantrian($id)
	{
        $ini = Core::find($id);

        $Data = DB::table('cores')
                    ->where('id','=',$id)
                    ->get();
                    
		return view('admin.data.editantrian',['data' => $ini]);
	}
    //---------------------------------------------------------------------------------

     //daftar antrian
     public function daftarantrian($id)
	{
        $total = DB::table('data')
                    ->where('data.fk_id',$id)
                    ->count();

        $ini = Core::findOrFail($id);

        $Data = DB::table('cores')
                    ->where('data.fk_id',$id)
                    ->join('data', 'data.fk_id', '=', 'cores.id')
                    ->join('antris', 'antris.fk_id', '=', 'data.id')
                    ->select('cores.*','data.name')
                    ->select('data.*','antris.nomor_antri','antris.antri_jalan')
                    ->paginate(9);


		return view('admin.data.daftarantrian',['id' => $ini])->with('data', $Data)->with('total', $total);
	}

    public function editdaftarantrian($id)
	{

       $core = Data::with('antri')->where('id', $id)->firstOrFail();
       $data = ["data" => $core];

       return view('admin.data.editdaftarantrian')->with($data);
	}

    //---------------------------------------------------------------------------------

}
