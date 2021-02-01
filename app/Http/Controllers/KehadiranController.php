<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Kehadiran;
use App\Models\Izin;
use Carbon\Carbon;

class KehadiranController extends Controller
{

    public function index()
    {

        $absens = Kehadiran::whereDate('created_at', Carbon::today())->get();
        $totalkaryawan = Karyawan::all()->count();
        $totalabsenmasuk = Kehadiran::whereDate('created_at', Carbon::today())->where('jenis','=','masuk')->count();
        $totalabsenpulang = Kehadiran::whereDate('created_at', Carbon::today())->where('jenis','=','pulang')->count();
        $alpa = Izin::where('jenis_perizinan','=','1')->count();
        $izin = Izin::where('jenis_perizinan','=','2')->count();
        $cuti = Izin::where('jenis_perizinan','=','3')->count();
        $sakit = Izin::where('jenis_perizinan','=','4')->count();
        return view('welcome')->with(compact('absens','totalkaryawan', 'totalabsenmasuk', 'totalabsenpulang',
            'alpa', 'izin', 'cuti', 'sakit'
    ));
    }
    public function masuk() {
        $karyawans = Karyawan::all();
        return view('masuk')->with(compact('karyawans'));
    }

    public function pulang() {
        $karyawans = Karyawan::all();
        return view('pulang')->with(compact('karyawans'));
    }

    public function store(Request $request) {
        $kehadiran = new Kehadiran;
        $kehadiran->nama = $request->nama;
        $kehadiran->jenis = $request->jenis;
        $kehadiran->save();
        return view('welcome');
    }

    public function show() {
        return view('welcome');
    }
    public function create() {
        return view('welcome');
    }
    public function destroy() {
        return view('welcome');
    }
}
