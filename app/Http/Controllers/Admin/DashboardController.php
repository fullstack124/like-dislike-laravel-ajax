<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $sale = Lead::where('type','sale')->count();
        $lead = Lead::where('type','lead')->count();
        $sale_user = User::whereRole(2)->count();
        $designer_user = User::whereRole(3)->count();
        $production_user = User::whereRole(4)->count();
        $shipping_user = User::whereRole(5)->count();
        if (Auth::user() && Auth::user()->role == 1) {
            return view('admin.dashboard', compact(
                'sale',
                'lead',
                'sale_user',
                'designer_user',
                'production_user',
                'shipping_user',
            ));
        } else {
            return view('admin.seles-dashboard.dashboard', compact(
                'sale',
                'lead',
            ));
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function user_logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
