<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $data['divisi'] = Divisi::all();
        return view('divisi.list', $data);
        return redirect('/login')->withErrors(['message' => 'Anda belum login'])->onlyInput('email');
    }
    /*
    public function index(Request $request)
    {
        $url = 'http://localhost:8080/api/divisi/list';
        $content = Http::get($url);
        $divisi = json_decode($content->body());
        return view('divisi.list', ['divisi' => $divisi]);
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['action'] = '/divisi';
        $data['status'] = 'store';
        $data['divisi'] = new Divisi();
        return view('divisi.form', $data);
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
        if ($validator->fails()) {
            return redirect('/divisi/create')->withErrors($validator)->withInput();
        }
        $validate = $validator->validate();
        if ($validate) {
            $divisi = new Divisi();
            $divisi->nama = $validate['nama'];
            $divisi->keterangan = $validate['keterangan'];
            $divisi->save();
        }
        /*
        $url = 'http://localhost:8080/api/divisi/store';
        $divisi = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ];
        $response = Http::post($url, $divisi);
        // $this->pre($response->body());*/
        return redirect('divisi')->with('success', 'Data yang Anda Simpan Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisi $divisi)
    {
        $data['action'] = '/divisi/' . $divisi->id;
        $data['status'] = 'destroy';
        $data['divisi'] = $divisi;
        return view('divisi.destroy', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        $data['action'] = '/divisi/' . $divisi->id;
        $data['status'] = 'edit';
        $data['divisi'] = $divisi;
        return view('divisi.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisi $divisi)
    {
        $divisi->nama = $request->nama;
        $divisi->keterangan = $request->keterangan;
        $divisi->save();
        return redirect('divisi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect('divisi');
    }


    private function pre($arr = [])
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}
