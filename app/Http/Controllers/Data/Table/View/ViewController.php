<?php

namespace App\Http\Controllers\Data\Table\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Data;
use App\Core;
use App\Antri;
use App\Verifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use QRCode;

class ViewController extends Controller
{

    public function buat_antrian_index()
	{
		return view('data_antri.tambah');
	}


    public function semua2($id)
	{

        $key = Auth::user()->key;

        $ini = Core::findOrFail($id);

        $users = DB::table('data')
                    ->where('key',$key)
                    ->where('data.fk_id',$id)
                    ->join('antris', 'antris.fk_id', '=', 'data.id')
                    ->select('data.*','antris.random', 'antris.qrcode','antris.antri_jalan','antris.nomor_antri')
                    ->get();

		return view('show',['id' => $ini])->with('data', $users);
	}


    public function show($data_kode)
	{
		$ini = Data::findOrFail($data_kode);
		return view('data_antri.show',['data' => $ini]);
	}

    public function barcode($data_kode)
	{
		$ini = Data::findOrFail($data_kode);
		return view('data_antri.barcode',['data' => $ini]);
	}

    public function barcodepengguna($id,Request $request)
	{
        $msg='';
        $msa='';

        $ini = Antri::findOrFail($id);
        
        if($ini){

		    $nomor_antri = $ini->nomor_antri++;
            $qrcode = $ini->qrcode;
            $random = $ini->random;
            $idB = $ini->idB;

               if($ini->nomor_antri){

                  $nomor_antri = $ini->nomor_antri;

                    if($ini){

                                        $permitted_charsz = '0123456';
		                                $ab= substr(str_shuffle($permitted_charsz), 0, 10);
                                        $ini->random=$ab;

                                      if($ini->qrcode){



                                        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		                                $aa= substr(str_shuffle($permitted_chars), 0, 10);
                                         $ini->qrcode=$aa;

                                       

                                         $isi = new Verifikasi();
                                         $isi->idB=$idB;
                                         $isi->qrcode = $aa;

                                         $msg=['nomor_antri'=>$ini->nomor_antri];
                                         $info = "ok";
                                        

                                         $isi->nomor_antri += $nomor_antri;

                                         $ini->save();
                                         $isi->save();

                                        }else{
                                            $msg="Ngotak dong";
                                        }
                          }else{
                             $msg="Ngotak dong";
                          }                         
                            
               }else{
                   $msg="Ngotak dong";
               }
                                    
        }else{
           $msg="Ngotak dong";
        }

  
		return view('pengguna.barcode',['data' => $ini]);
	}

    public function scanview($data_kode)
	{
		$ini = Data::findOrFail($data_kode);
		return view('data_antri.scan',['data' => $ini]);

	}

    public function verifikasiview($data_kode)
	{        
       $key = Auth::user()->key;

       $core = Data::with('antri')->where('id', $data_kode)->firstOrFail();

       $same = $core->key;
       $data = ["data" => $core];


       if($key==$same){
       return view('data_antri.verifikasi')->with($data);

       }else{

       return redirect()->route('index');

       }

	}

    public function edit($id)
	{
       $key = Auth::user()->key;

       $core = Data::with('antri')->where('id', $id)->firstOrFail();

       $same = $core->key;
       $data = ["data" => $core];


       if($key==$same){

       return view('data_antri.edit')->with($data);

       }else{

       return redirect()->route('index');

       }

	}
    //buat
    public function editantrian($id)
	{

       $ini = Core::findOrFail($id);
       return view('data_antri.editantrian',['data' => $ini]);


	}
    //++
    public function antrianedit($id)
	{

       $key = Auth::user()->key;

       $core = Data::with('antri')->where('id', $id)->firstOrFail();
       $data = ["data" => $core];

       $same = $core->key;



       if($key==$same){

            return view('data_antri.antrian')->with($data);

       }else{

           return redirect()->route('index');
       }
	}

    public function editprofile(Request $request)
    {
        $user = Auth::user();

        return view('profile.edit',compact('user',$user)->with($total));
    }

    public function editpassword()
    {
        return view('profile.password');
    }

    public function profileshow()
    {
        $key = Auth::user()->key;

        $total = DB::table('data')
                ->where('key',$key)
                ->join('antris', 'antris.fk_id', '=', 'data.id')
                ->select('data.*','antris.nomor_antri')               
                ->sum('antris.nomor_antri');


        return view('profile.account',['data' => $total]);
    }

}
