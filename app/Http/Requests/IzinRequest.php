<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class IzinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'karyawan_id' => 'required|numeric',
            'jenis_perizinan' => 'required|numeric',
            'dari_tanggal' => 'required|date',
            'sampe_tanggal' => 'required|date',
            'keterangan'    => 'required|string',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'karyawan_id.required' => 'Nama Karyawan harus diisi',
            'jenis_perizinan.required' => 'Jenis Perizinan harus diisi',
            'dari_tanggal.required' => 'kolom dari tanggal harus diisi',
            'dari_tanggal.date' => 'kolom dari tanggal harus berformat tanggal',
            'sampe_tanggal.required' => 'kolom sampai tanggal harus diisi',
            'sampe_tanggal.date' => 'kolom sampai tanggal harus berformat tanggal',
            'keterangan.required' => 'Keterangan harus diisi',
        ];
    }
}
