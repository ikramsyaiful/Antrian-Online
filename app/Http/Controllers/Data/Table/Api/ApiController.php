<?php

namespace App\Http\Controllers\Data\Table\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Data;
use App\Verifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use QRCode;

class ApiController extends Controller
{
    public function scan(Request $request){

        $msg='';
        $msa='';
        if($request->data){

            $user = Data::where('qrcode',$request->data)->first();

             if($user){

                    $qrcode = $user->qrcode;
                    $Email = $user->email;
                    $no = $user->nomor_antri;
                    
                    $isi = new Verifikasi();
                    $isi->email=$Email;
                    $isi->qrcode = $qrcode;
                    $isi->nomor_antri = $no;

                      if($user->nomor_antri){

                       $user->nomor_antri++;

                                        if($user->qrcode){
                                 
                                            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		                                    $aa= substr(str_shuffle($permitted_chars), 0, 10);

                                            $user->qrcode=$aa;
                                            
                                            $msg=['nomor_antri'=>$user->nomor_antri];
                                            $info = "ok";

                                            $user->save();
                                            $isi->save();

                                        }else{
                                            $msg="Ngotak dong";
                                        }
              
                         

                     }else{
                        $msg="Access di Tolak";
                        
                     }
             }else{
                $msg='Qrcode invalide';
             }
        }else{
            $msg='Error';
        }
       return response()->json(['msg'=>$msg,'info'=>$info ?? '']);

    }




    public function Verifikasi(Request $request){

        $msg='';


        if($request->data){
            $user = Verifikasi::where('qrcode',$request->data)->first();
                  if($user){
                    
                             if($user->idB){
                                $idB = $user->idB;
                                $same = Data::where('id', '=', $idB)->first();
                                $see = $same->id;
                                    if($see==$idB){
                                                    if($user){
                                                                     if($user->nomor_antri){

                                                                         $user->nomor_antri;
                                                                         $msg=['nomor_antri'=>$user->nomor_antri];
                                                                         $info = "ok";
                                                                         $serve = $idB;
                                                                         $user->delete();

                                                                     }else{
                                                                        $msg="Tidak Dapat Melakukan Salto Belakang";
                                                                     }
                                                    }else{
                                                        $msg='Qrcode Gagal Verifikasi';
                                                    }
                                    }else{
                                          $msg='Qrcode Tidak Ditemukan';
                                    }
                             }else{
                                $msg='Qrcode Tidak Ada';
                             }
                   }else{
                      $msg='Gagal Masuk';
                   }
        }else{
             $msg='Error';
        }

       return response()->json(['msg'=>$msg ??'','info'=>$info ?? '','serve'=>$serve??'']);
    }

}
