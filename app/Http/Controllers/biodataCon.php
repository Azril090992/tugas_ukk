<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class biodataCon extends Controller
{
       public function home()
    {
        $biodata = DB::table('biodata')->get();
        return view('utama', ['biodata' => $biodata]);
    }

    public function index()
    {
        $biodata = DB::table('biodata')->get();
        return view('biodata', ['biodata' => $biodata]);
    }

    public function input()
    {
        return view('tambahbiodata');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbproduk
        $file = $request->file('foto');
        $filename = $request->kode . "." . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img'), $filename);
        DB::table('biodata')->insert([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'foto' => $filename
        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/biodata/tampil');
    }

    public function update($biodata)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $biodata = DB::table('biodata')->where('kode', $biodata)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/biodata/tampil');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('biodata')->where('nis', $request->nis)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'foto' => $request->foto
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/biodata/tampil');
    }

    public function delete($nis)
    {
        // mengambil data produk berdasarkan id yang dipilih
        DB::table('biodata')->where('nis', $nis)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/biodata/tampil');
    } 
}
