<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class AboutController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return view('about.index', compact('products'));
    }
}
