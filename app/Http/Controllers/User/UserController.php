<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Flashsale;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flashsales = Flashsale::all();

        return view('pages.user.index', compact('products', 'flashsales'));
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.user.detail', compact('product'));
    }

    public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);

        if ($user->point > $product->price) {
            $totalPoint = $user->point - $product->price;

            $user->update([
                'point' => $totalPoint
            ]);

            Alert::success('Berhasil', 'Produk berhasil dibeli');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Poin Anda tidak cukup');
            return redirect()->back();
        }
    }

    public function detail_flashsale($id)
    {
        $flashsale = Flashsale::findOrFail($id);

        return view('pages.user.detail', compact('flashsale'));

    }

    public function purchaseflashsale($flashsaleId, $userId)
    {
        $flashsale = Flashsale::findOrFail($flashsaleId);
        $user = User::findOrFail($userId);

        if ($user->point > $flashsale->price) {
            $totalPoint = $user->point - $flashsale->price;

            $user->update([
                'point' => $totalPoint,
            ]);

            Alert::success('Berhasil', 'Produk berhasil dibeli');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Poin Anda tidak cukup');
            return redirect()->back();
        }
    }

}