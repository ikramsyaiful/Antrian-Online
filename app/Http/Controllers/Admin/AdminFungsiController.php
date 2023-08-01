<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Core;
use App\Data;
use App\Antri;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminFungsiController extends Controller
{

    //User--------------------------------------------------------------------------------------
    public function tambahuser(Request $request){

    	$validateData = $request->validate([
		'name' => 'required|min:3|max:30',
        'email'=>'required|min:3|max:50|unique:users',
        'password'=>'required|confirmed|min:3|max:50',
        'pic' => 'required|file|image|max:1000',
		]);

		$isi = new User();      
     
        $isi->name = $validateData['name'];
        $isi->email = $validateData['email'];
        $isi->password =  Hash::make($validateData['password']);

		if($request->hasFile('pic'))
			{
			$extFile = $request->pic->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->pic->move('public/storage/assets/images/photo',$namaFile);
			$isi->pic = $path;
		}        
    
		$isi->save();

		return redirect()->route('admin.data.user')->with('success', 'Antrian Berhasil Di Tambahkan');
    }

    public function edituser(Request $request,$id){

    	$validateData = $request->validate([
        'pic'=>'file|image|max:1000',
		'name' => 'required|min:3|max:30',
        'email'=>'required|min:3|max:50',
       
		]);
        $isi = User::findOrFail($id);
		      
        $isi->name = $validateData['name'];
        $isi->email = $validateData['email'];

   		if($request->hasFile('pic'))
			{
			$extFile = $request->pic->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->pic->move('public/storage/assets/images/photo',$namaFile);
			$isi->pic = $path;
		}        

		$isi->save();

		return redirect()->route('admin.data.user')->with('success', 'Antrian Berhasil Di Tambahkan');
    }
    
    public function updatepassword(Request $request,$id)
    {
    $validateData = $request->validate([
        'password' => 'required|string|min:8|confirmed',
	]);
    $isi = User::findOrFail($id);
		      
    $isi->password = Hash::make($validateData['password']);
    
    $isi->save();

    return redirect()->route('admin.data.user')->with('success', 'Password Berhasil Di Ganti');
    }

    public function destroy($id)
	{
       $data = User::find($id);
       $data->delete();

       //show back
       return redirect()->route('admin.data.user')->with('success', 'Antrian Berhasil Di Hapus');
	}
    //--------------------------------------------------------------------------------------------

    //Antrian
    public function tambahantrian(Request $request,$id){

        $ini = User::findOrFail($id);
        $see = $ini->key;

    	$validateData = $request->validate([
		'name' => 'required|min:3|max:30',
        'alamat'=>'required|min:3|max:50',
        'nomor'=>'required|digits_between:0,12',
		]);

		$isi = new Core();

        $permitted_kers = '01234567';
        $ab= substr(str_shuffle($permitted_kers), 0, 100);

        $isi->id = $ab;
        $isi->fk_id = $id;
        $isi->name = $validateData['name'];
        $isi->alamat = $validateData['alamat'];
        $isi->nomor = $validateData['nomor'];
        $isi->key = $see;

        $antriandimiliki = $ini-> antriandimiliki++;

        $ini->save();
		$isi->save();

		return redirect()->route('admin.data.antrian',['data' => $id])->with('success', 'Antrian Berhasil Di Tambahkan');
    }

    public function editantrian(Request $request,$id){


    	$validateData = $request->validate([
		'name' => 'required|min:3|max:30',
        'alamat'=>'required|min:3|max:50',
        'nomor'=>'required|digits_between:0,12',
 
		]);

		$isi = Core::findOrFail($id);
        $ids = $isi->fk_id;
        $isi->name = $validateData['name'];
        $isi->alamat = $validateData['alamat'];
        $isi->nomor = $validateData['nomor'];


		$isi->save();

		return redirect()->route('admin.data.antrian',['data' => $ids])->with('success', 'Antrian Berhasil Di Tambahkan');
    }

    public function destroyantrian(Request $request,$id)
	{
       $data = Core::find($id);
       $idz =1632457;
       $fk_key = $data->fk_id;
       $user = User::find($fk_key);

       $antriandimiliki = $user-> antriandimiliki--;
       
        $total = DB::table('data')
                    ->where('data.fk_id',$id)
                    ->count();

       $daftarantriandimiliki = $user-> daftarantriandimiliki -= $total ;

       $user->save();
       $data->delete();
       //show back
       $ids = $data->fk_id;
       return redirect()->route('admin.data.antrian',['data' => $ids])->with('success', 'Antrian Berhasil Di Hapus');
	}
    //--------------------------------------------------------------------------------------------------------------------------

    //daftar antrian
    public function tambahdaftarantrian(Request $request,$id)
    {

        $ini = Core::findOrFail($id);
        $see = $ini->key;

        $theforeign = $ini->fk_id;
        $tambah = User::find($theforeign);
        

    	$validateData = $request->validate([
		'name' => 'required|min:3|max:30',
        'deskripsi'=>'required|min:3|max:50',
		]);

		$isi = new Data();
        $ini = new Antri();

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $permitted_kers = '01234567';
		$aa= substr(str_shuffle($permitted_chars), 0, 10);
        $ab= substr(str_shuffle($permitted_kers), 0, 100);
        $nomor = 0;

        $isi->id = $ab;
        $isi->fk_id = $id;
        $ini->fk_id = $ab;
        $ini->random = $aa;

        $isi->name = $validateData['name'];
        $isi->deskripsi = $validateData['deskripsi'];
        $isi->key = $see;
        $ini->idB = $ab;

        $ini->qrcode = $aa;
        $ini->antri_jalan = $nomor;
        $ini->nomor_antri = $nomor;

        $daftarantriandimiliki = $tambah-> daftarantriandimiliki++;

        $tambah->save();
		$isi->save();
        $ini->save();

		return redirect()->route('admin.data.daftarantrian',['data' => $id])->with('success', 'Antrian Berhasil Di Tambahkan');
    }

    public function editdaftarantrian(Request $request,$id)
    {

    	$validateData = $request->validate([
        'name' => 'required',
        'deskripsi'=> 'required',
		'nomor_antri' => 'required', 
		'antri_jalan' => 'required',
		]);
       
        $data = Data::find($id);
        $ids = $data->fk_id;
		$data->name = $request['name'];
        $data->deskripsi = $request['deskripsi'];
		$data->save();

        $antri = $data->antri()->first();
        $antri->nomor_antri = $request['nomor_antri'];
		$antri->antri_jalan = $request['antri_jalan'];
        $antri->save();

		return redirect()->route('admin.data.daftarantrian',['data' => $ids])->with('success', 'Antrian Berhasil Di Tambahkan');
    }

    public function destroydaftarantrian($id)
	{
       $data = Data::find($id);
       $fk_id = $data->fk_id;
       $data2 = Core::find($fk_id);
       $fk_id_core = $data2->fk_id;
       $data3 = User::find($fk_id_core);

       $daftarantriandimiliki = $data3-> daftarantriandimiliki--;

       $data3->save();
       $data->delete();
       $ids = $data->fk_id;

      
       return redirect()->route('admin.data.daftarantrian',['data' => $ids])->with('success', 'Antrian Berhasil Di Hapus');
	}
    public function aktifantrian($id)
	{
       $data = Data::where('id',$id)->first();
       $check = $data->id;
       $data2 = Antri::where('fk_id', $check)->first();
       $data2->antri_jalan++;
       $data2->save();
       $ids = $data->fk_id;

       return redirect()->route('admin.data.daftarantrian',['data' => $ids])->with('success', 'Antrian Berhasil Di Hapus');
	}
}
