<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
class Izin extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'izins';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['karyawan_id', 'jenis_perizinan', 'dari_tanggal', 'sampe_tanggal', 'keterangan', 'file'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    // public static function boot()
    // {
    //     parent::boot();
    //     static::deleting(function($obj) {
    //         \Storage::disk('uploads')->delete($obj->bukti);
    //     });
    // }
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

    public function setFileAttribute($value)
        {
            $attribute_name = "file";
            $disk = "public";
            $destination_path = "uploads";

            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
        }


   public function getKaryawanIdAttribute ($value) {
        $id = $value;
        $karyawan = Karyawan::find($id);
        $value = $karyawan['nama'];
        return $value;
   }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

        public function getJenisPerizinanAttribute($value)
    {
        if ($value==1){
            $value = 'alpa';
        }

        if ($value==2) {
            $value = 'izin';
        }

        if ($value==3) {
            $value = 'cuti';
        }

        if ($value==4) {
            $value = 'sakit';
        }
        return $value;
    }


    public function karyawan()
    {
        return $this->hasMany('App\Models\Karyawan');    
    }
}
