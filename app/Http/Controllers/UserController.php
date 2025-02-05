<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function earnings()
    {
        $user = Auth::user();
    $earnings = Commission::where('user_id', $user->id)->orderBy('distribution_date', 'asc')->get();

    return view('earnings', compact('earnings'));
    }

    public function referralTree()
    {
        $user = Auth::user();
        return view('tree', compact('user'));
    }
}
