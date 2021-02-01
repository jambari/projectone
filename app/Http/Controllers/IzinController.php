<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\IzinRequest;

class IzinController extends Controller
{
    public function create ()
    {
        $karyawans = Karyawan::all();
        return view('izin')->with(compact('karyawans'));
    }

    public function store (Request $request) 
    {
        $requestData = $request->all();
 
            if(!empty($_POST['file'])){
                  $encoded_data = $_POST['file'];
                    $binary_data = base64_decode( $encoded_data );
 
                    // save to server (beware of permissions // set ke 775 atau 777)
                    $namafoto = uniqid().".png";
                    //$result = file_put_contents( 'uploads/'.$namafoto, $binary_data );
                    Storage::disk('public')->put('uploads'.'/'.$namafoto, $binary_data);
                    //if (!$result) die("Could not save image!  Check file permissions.");
                }
        $izin = new Izin;
        $izin->karyawan_id = $request->input('nama');
        $izin->jenis_perizinan = $request->input('jenis');
        $izin->dari_tanggal = $request->input('dari');
        $izin->sampe_tanggal = $request->input('sampe');
        $izin->keterangan = $request->input('keterangan');
        $izin->file = $namafoto;
        $izin->save();
        Session::flash('success', 'Data berhasil ditambahkan'); 
        return redirect()->route('welcome');
    }

    public function show ()
    {

    }

    public function destroy ()
    {

    }
}
