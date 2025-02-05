<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Commission;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products' , compact('products'));
    }

    public function purchase(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $price = $product->price;

        //Direct Referral commission 10%
        if($user->referrer){
            Commission::create([
                'user_id' => $user->referrer_id,
                'referrer_id' => $user->id,
                'amount' => $price * 0.10,
                'type' => 'direct',
                'level' => '1',
                'distribution_date' => now()->addMonth(),
            ]);
        }

        //level based commissions

        $referrer = $user->referrer;
        $percentages = [5,4,3,2,1];
        $level = 1;

        while($referrer && $level <=5) {
            Commission::create([
                'user_id' => $referrer->id,
                'referrer_id' => $user->id,
                'amount' => $price * ($percentages[$level - 1] / 100),
                'type' => 'level',
                'level' => $level,
                'distribution_date' => now()->addMonth(),
            ]);
            $referrer = $referrer->referrer;
            $level++;
        }

        return redirect()->route('earnings')->with('success','Purchase successful!');

    }
}
