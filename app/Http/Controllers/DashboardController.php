<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Kehadiran;
use App\Models\Izin;
use Carbon\Carbon;

class DashboardController extends Controller
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
        return view('vendor.backpack.base.dashboard')->with(compact('absens','totalkaryawan', 'totalabsenmasuk', 'totalabsenpulang',
            'alpa', 'izin', 'cuti', 'sakit'
        ));
    }
}