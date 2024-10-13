<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor= Distributor::all();

        confirmDelete('Hapus Data!', 'Apakah Anda Yakin Ingin Menghapus Data Ini?');

        return view('pages.admin.distributor.index', compact('distributor'));
    }

    public function create()
    {
        $distributor = Distributor::all();
        return view('pages.admin.distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'lokasi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        Distributor::create($request->all());
        return redirect()->route('admin.distributor')->with('success', 'Data Berhasil di Tambah.');
    }

    public function edit($id)
{
    $distributor = Distributor::findOrFail($id); // Mengambil satu distributor
    return view('pages.admin.distributor.edit', compact('distributor'));
}

    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'lokasi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        $distributor->update($request->all());
        return redirect()->route('admin.distributor')->with('success', 'Data Berhasil di Update.');
    }

    public function delete($id)
    {
        $distributor = distributor::findOrFail($id);
        $distributor->delete();

        if ($distributor) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Data gagal dihapus');
            return redirect()->back();
        }
    }
}