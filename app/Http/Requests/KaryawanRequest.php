<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
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
            'nama' => 'required|min:5|max:255',
            'nomor_hp' => 'required|numeric',
            'alamat' => 'required|min:3|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|min:5|max:255',
            'jabatan' => 'required'
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
            'nama.required' => 'nama harus diisi',
            'nama.min' => 'nama terlalu pendek',
            'nama.max' => 'nama terlalu panjang',
            'nomor_hp.required' => 'nomor hp harus diisi',
            'nomor_hp.numeric' => 'nomor hp harus angka',
            'alamat.required' => 'alamat harus diisi',
            'alamat.required' => 'alamat terlalu pendek',
            'tanggal_lahir.required' => 'tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'tanggal harus berformat tanggal',
            'tempat_lahir.required' => 'tempat lahir harus diisi',
            'jabatan.required' => 'jabatan harus diisi'
        ];
    }
}
