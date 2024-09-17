<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __invoke() {
        $item = Item::all();

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'pengawas') {
            return view('operator.dashboard');
        }

        return view('unit.dashboard', compact('item'));
    }
}
