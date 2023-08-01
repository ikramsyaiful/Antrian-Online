<?php

namespace App\Http\Controllers\Data\Table\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Antri;
use App\User;
use App\Data;
use App\Verifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use QRCode;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
/*
    public function verifikasiview(Request $request, $data_kode)
    {
        //$key = Auth::user()->key;
        $key = "WSB2O9NJNUBTJ5J";
        
        $core = Data::with('antri')->where('id', $data_kode)->firstOrFail();
        $core2 = Antri::where('fk_id', $data_kode)->firstOrFail();
        $check = $core2->antri_jalan;
        $same = $core->key;
        
        //$data = "27035146";
        $data = [
           "data" => $core,
          "antri" => $core2
        ];

        if ($key == $same) {
            if ($check > 0) {
                return response()->json(['data' => $data]);
            } else {
                return response()->json(['error' => 'Aktifkan Antrian Terlebih Dahulu'], 400);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
*/
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
                                            $msg="";
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
		
		
		
public function Verifikasi(Request $request, $id)
{
    $msg = '';
    $user = Verifikasi::where('qrcode', $request->input('qrcode'))->first();
    $info = '';

    if ($user){
        $info = 'ok';
        if ($user->idB) {
            $idB = $user->idB;
            if ($id == $idB) {
			    $info2 = 'ok';
                $serve = $id;
                $antri = Antri::where('fk_id', $id)->first();
                if ($antri) {
                    if ($antri->antri_jalan == $user->nomor_antri) {
						$info3 = 'ok';
						$antri->antri_jalan++;
						$same = $user->nomor_antri + 1;
						$antri->save();
						$checkin = Verifikasi::where('idB', $idB)
								   ->where('nomor_antri', $same)
								   ->first();	
						if($checkin){									      
							$result = $checkin ->qrcode;
							$antri->qrcode = $result; 
							$antri->save();	
								if ($user->nomor_antri) {
									$msg = ['nomor_antri' => $user->nomor_antri];
									$serve = $idB;
									$user->delete();

                                    $antri = Data::where('id', $id)->first();
                                    $keys = $antri->key;
                                    $art = User::where('key', $keys)->first();
                                    $art->antrijalan++;
                                    $art->save();

								} else {
									$msg = "";
								}			
						}else{						      
								if ($user->nomor_antri) {
								    $msg = ['nomor_antri' => $user->nomor_antri];
								    $serve = $idB;
								    $user->delete();

                                    $antri = Data::where('id', $id)->first();
                                    $keys = $antri->key;
                                    $art = User::where('key', $keys)->first();
                                    $art->antrijalan++;
                                    $art->save();
                                    
								} else {
									$msg = "";
								}
						}					
                    }else{
                        $msg = "Belum Giliran";
                    }		
                }else{
                    $msg = "Tidak Ada Data Antri";
                }
            }else{
                $msg = "Salah Antrian";
            }
        }else{
            $msg = "Qrcode Tidak Ada";
        }
    }else{
        $msg = "Qrcode Tidak Ada";
    }
    return response()->json(['msg' => $msg ?? '', 'info' => $info ?? '', 'info2' => $info2 ?? '', 'info3' => $info3 ?? '', 'serve' => $serve ?? '']);
}


/*
public function Verifikasi(Request $request, $id)
{
    $msg = '';
    $user = Verifikasi::where('qrcode', $request->input('qrcode'))->first();
		//
		$antri = Antri::where('qrcode', $request->input('qrcode'))->first();
		//$antrijln = $antri->antri_jalan;
		//$nomorantri = $user->nomor_antri;
		//
		
    if ($user) {
	   	  $info = 'ok';
        if ($user->idB) {
            $idB = $user->idB;
            if ($id == $idB) {
						    $serve = $id;
								//
								if ($antri->antri_jalan == $user->nomor_antri) {
								//
								//
												if ($user->nomor_antri) {
														$msg = ['nomor_antri' => $user->nomor_antri];
														$serve = $idB;
														$user->delete();
												} else {
														$msg = "";
												}
								//				
								} else {
										$msg = "Belum Giliran";
								}								
								//				
            } else {
                $msg = "Salah Antrian";
            }
        } else {
            $msg = "Qrcode Tidak Ada";
        }
    } else {
        $msg = "Error";
    }

    return response()->json(['msg' => $msg ?? '', 'info' => $info ?? '', 'serve' => $serve ?? '']);
}

*/
}
