<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flashsale;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class FlashsaleController extends Controller
{
    public function index()
    {
        $flashsales = Flashsale::all();

        confirmDelete('Hapus Data!', 'Apakah Anda Yakin Ingin Menghapus Data Ini?');

        return view('pages.admin.flashsale.index', compact('flashsales'));
    }

    public function create()
    {
        return view('pages.admin.flashsale.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'numeric',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Pastikan semua data terisi dengan benar');
            return redirect()->back();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }

        $flashsale = Flashsale::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        if ($flashsale) {
            Alert::success('Success', 'Flashsale berhasil ditambahkan');
            return redirect()->route('admin.flashsale');
        } else {
            Alert::error('Error', 'Flashsale gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $flashsale = Flashsale::findOrFail($id);

        return view('pages.admin.flashsale.detail', compact('flashsale'));
    }

    public function edit($id)
    {
        $flashsale = Flashsale::findOrFail($id);

        return view('pages.admin.flashsale.edit', compact('flashsale'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'numeric',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Pastikan semua data terisi dengan benar');
            return redirect()->back();
        }

        $flashsale = Flashsale::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldPath = public_path('images/' . $flashsale->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        } else {
            $imageName = $flashsale->image;
        }

        $flashsale->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        if ($flashsale) {
            Alert::success('Success', 'Flashsale berhasil diubah');
            return redirect()->route('admin.flashsale');
        } else {
            Alert::error('Error', 'Flashsale gagal diubah');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $flashsale = Flashsale::findOrFail($id);

        $oldpath = public_path('images/' . $flashsale->image);
        if (File::exists($oldpath)) {
            File::delete($oldpath);
        }

        $flashsale->delete();

        if ($flashsale) {
            Alert::success('Berhasil', 'Flashsale berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Flashsale gagal dihapus');
            return redirect()->back();
        }
    }
}