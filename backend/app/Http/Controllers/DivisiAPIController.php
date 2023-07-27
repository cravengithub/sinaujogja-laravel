<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Facades\Validator;

class DivisiAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisi = Divisi::all();
        return json_encode($divisi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required | max:50',
            'keterangan' => 'required'
        ];
        $message = [
            'required' => 'Kolom isian harus diisi',
            'max' => 'Karakter yang diinputkan melebihi ketentuan'
        ];
        $validator = Validator::make($request->all(), $rules, $message = $message);
        $data = [
            'divisi' => null,
            'message' => null
        ];
        if ($validator->fails()) {
            $data['message'] = $validator;
        }
        $validate = $validator->validate();
        if ($validate) {
            $divisi = new Divisi();
            $divisi->nama = $validate['nama'];
            $divisi->keterangan = $validate['keterangan'];
            $divisi->save();
            $data['divisi'] = $divisi;
            $data['message'] = 'Data berhasil disimpan';
        }
        return json_encode($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $divisi = Divisi::find($request->id);
        $divisi->delete();

    }
}
