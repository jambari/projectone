<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
class Jabatan extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'jabatans';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['nama', 'gaji', 'tiap'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function getTiapAttribute($value)
    {
        if ($value==1){
            $value = 'jam';
        }

        if ($value==2) {
            $value = 'minggu';
        }

        if ($value==3) {
            $value = 'bulan';
        }

        if ($value==4) {
            $value = 'tahun';
        }

        if ($value==5) {
            $value = 'sekali';
        }
        return $value;
    }
    public function karyawan()
    {
        return $this->belongsTo('App\Models\Karyawan');
    } 
}
