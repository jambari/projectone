<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;
use App\Models\Izin;
class Karyawan extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'karyawans';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
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
   public function getGajiAttribute ($value) {
        $id = $this->attributes['jabatan'];
        $gaji = Jabatan::find($id);
        $value = $gaji['gaji'];
        return $value;
   }

   public function getJabatanAttribute ($value) {
        $id = $value;
        $jabatan = Jabatan::find($id);
        $value = $jabatan['nama'];
        return $value;
   }



    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function jabatan()
    {
        return $this->hasMany('App\Models\Jabatan');    
    }

    public function izin()
    {
        return $this->belongsTo('App\Models\Izin');
    } 
}
