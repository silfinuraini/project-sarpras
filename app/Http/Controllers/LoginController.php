<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view ('operator.dashboard');
    }

    public function unit()
    {
        $item = Item::all();
        
        return view('unit.dashboard', compact('item'));
    }
    
}
