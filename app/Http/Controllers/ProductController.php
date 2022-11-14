<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ProductController extends Controller
{
    public static function webRoutes()
    {
        Route::get('products', [ProductController::class, 'index'])->name('products');
    }

    public function index()
    {
        return Inertia::render('Products', [
            'user' => Auth::user()
        ]);
    }
    
    public static function apiRoutes()
    {
        Route::get('products', [ProductController::class, 'getCollection']);
    }

    public function getCollection(Request $request)
    {
        $products = Product::search(
            $request->input('search', null),
            $request->input('sort', null),
            $request->input('sort_type', 'asc'),
        )->paginate($request->input('per_page', 10));

        return ProductResource::collection($products);
    }
}
