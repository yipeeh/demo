<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();

        if(auth()->check()){
            if($user->role == 'admin'){
                return view('admin.dashboard', compact('products'));
            }
            else if($user->role == 'user'){
                return view('home');
            }
        }
        return redirect(view('welcome'));
    }
}
