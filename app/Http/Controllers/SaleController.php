<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        $leads = [];
        if (Auth::user()->role == 1) {
            $leads = Lead::orderBy('id', 'desc')->get();
            return view('admin.sales.index', compact('leads'));
        }else{
            $leads = Lead::where(['user_id' => auth()->id(), 'type' => 'sale'])->orderBy('id', 'desc')->get();
            return view('admin.sales.index', compact('leads'));
        }
       
    }
}
