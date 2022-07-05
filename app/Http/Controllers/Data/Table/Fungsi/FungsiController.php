<?php

namespace App\Http\Controllers\Data\Table\Fungsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Data;
use App\Core;
use App\Verifikasi;
use App\Antri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use QRCode;
use File;
use Hash;
use SweetAlert;
class FungsiController extends Controller
{
    public function buat_antrian(Request $request){

        $key = Auth::user()->key;
        $EZ = Auth::user()->id;
         $user = Auth::user();

    	$validateData = $request->validate([
		'name' => 'required|min:3|max:20',
        'alamat'=>'required|min:3|max:50',
        'nomor'=>'required|digits_between:0,12',
		]);
		$isi = new Core();

        $permitted_kers = '01234567';
        $ab= substr(str_shuffle($permitted_kers), 0, 100);


        $isi->id = $ab;
        $isi->fk_id = $EZ;
        $isi->name = $validateData['name'];
        $isi->alamat = $validateData['alamat'];
        $isi->nomor = $validateData['nomor'];
        $isi->key = $key;

        $antriandimiliki = $user-> antriandimiliki++;

         $user->save();
		$isi->save();

		return redirect()->route('index')->with('success', 'Antrian Berhasil Di Tambahkan');
    }

    public function tambah_antrian(Request $request,$id){

        $key = Auth::user()->key;
        $user = Auth::user();

    	$validateData = $request->validate([
		'name' => 'required|min:3|max:20',
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
        $isi->key = $key;
        $ini->idB = $ab;

        $ini->qrcode = $aa;
        $ini->antri_jalan = $nomor;
        $ini->nomor_antri = $nomor;

        $daftarantriandimiliki = $user-> daftarantriandimiliki++;

        $user->save(); 
		$isi->save();
        $ini->save();

        //show back 
        $ini = Core::findOrFail($id);

        $users = DB::table('data')
                    ->where('key',$key)
                    ->where('data.fk_id',$id)
                    ->join('antris', 'antris.fk_id', '=', 'data.id')
                    ->select('data.*','antris.random', 'antris.qrcode','antris.antri_jalan','antris.nomor_antri')
                    ->get();


	    return view('show',['id' => $ini])->with('data', $users)->with('success', 'Antrian Berhasil Di Tambahkan');
    }




    public function update(Request $request,$id)
	{
      	$request->validate([
        'name' => 'required',
        'deskripsi'=> 'required',
		'nomor_antri' => 'required', 
		'antri_jalan' => 'required',
		]);
        $data = Data::find($id);

		$data->name = $request['name'];
        $data->deskripsi = $request['deskripsi'];
		$data->save();

        $antri = $data->antri()->first();
        $antri->nomor_antri = $request['nomor_antri'];
		$antri->antri_jalan = $request['antri_jalan'];
        $antri->save();

		return redirect()->route('index')->with('success', 'Edit Berhasil');
	}

    public function updateantrian(Request $request,$id)
	{
      	$request->validate([
		'name' => 'required|min:3|max:20',
        'alamat'=>'required|min:3|max:50',
        'nomor'=>'required|digits_between:0,12',
		]);
        $data = Core::find($id);

		$data->name = $request['name'];
        $data->alamat = $request['alamat'];
        $data->nomor = $request['nomor'];
		$data->save();

		return redirect()->route('index')->with('success', 'Edit Berhasil');
	}

    public function antrianupdate(Request $request,$id)
	{
        $user = Auth::user();

        $data = Data::find($id);
        $name = $data->name;
        $email = $data->email;
        $data->save();

        $antri = $data->antri()->first();
        $qrcode = $antri->qrcode;
        $nomor_antri = $antri->nomor_antri;
        $antri_jalan = $antri->antri_jalan++;

        $antrijalan = $user-> antrijalan++;
        $user->save();
        $antri->save();

		return redirect()->route('data_antri.antrianedit',['data' => $data->id]);
	}

    public function destroy(Request $request,$id)
	{
       $user = Auth::user();
       $data = Core::find($id);

       $antriandimiliki = $user-> antriandimiliki--;

       $total = DB::table('data')
                ->where('fk_id',$id)            
                ->count();

       $daftarantriandimiliki = $user-> daftarantriandimiliki -= $total ;

       $key = Auth::user()->key;
       $same = $data->key;

       if($key==$same){

           $user->save();
           $data->delete();
           //show back
           return redirect()->route('index')->with('success', 'Antrian Berhasil Di Hapus');

       }else{

           return redirect()->route('index');

       }
	}

    public function destroy2(Request $request,$id)
	{
       $user = Auth::user();
       $data = Data::find($id);
       $see = $data->fk_id;
       $data->antri()->delete();
       $daftarantriandimiliki = $user-> daftarantriandimiliki--;

       $key = Auth::user()->key;
       $same = $data->key;

       if($key==$same){

           $user->save();
           $data->delete();
           //show back
           return redirect()->route('show',['data' => $see])->with('success', 'Antrian Berhasil Di Hapus');

       }else{
           return redirect()->route('show',['data' => $see]);
       }
	}




    public function update_data(Request $request){

        $validateData = $request->validate([
          'name'=> 'required|min:1',
          'email'=> 'required|min:1',
        ]);
        
        $user = Auth::user();

        $user->name = $validateData['name'];
        $user->email = $validateData['email'];

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile Telah Di Update');

    }

    public function update_pic(Request $request){

        $validateData = $request->validate([
            'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if($request->hasFile('pic'))
		{
	        $avatarName = $user->id.'_avatar'.time().'.'.request()->pic->getClientOriginalExtension();
            $path = $request->pic->move('storage/assets/images/photo',$avatarName);
            $user->pic = $path;
		}		

        $user->save();
        return redirect()->route('profile')->with('success', 'Gambar Telah Di Ganti');
    }

    public function update_bg(Request $request){

        $validateData = $request->validate([
            'bg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if($request->hasFile('bg'))
		{
	        $avatarName = $user->id.'_avatar'.time().'.'.request()->bg->getClientOriginalExtension();
            $path = $request->bg->move('assets/images/photo',$avatarName);
            $user->bg = $path;
		}		

        $user->save();
        return redirect()->route('profile')->with('success', 'Background Telah Diganti');
    }



    public function updatepassword(UpdatePasswordRequest $request)
    {
    $request->user()->update([
        'password' => Hash::make($request->get('password'))
    ]);

    return redirect()->route('profile')->with('success', 'Password Berhasil Di Ganti');
    }

}
