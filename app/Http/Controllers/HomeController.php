<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public static function webRoutes()
    {
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard', [
            'user' => Auth::user()
        ]);
    }
}
