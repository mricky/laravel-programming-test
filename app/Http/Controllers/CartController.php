<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Impl\CartServiceImpl;
use App\Models\{
    Cart,
    CartDetail,
    Discount
};

class CartController extends Controller
{
    
    public function usingDiscount(Request $request)
    {
        $code = $request->input('code');

        $discount = Discount::where('code',$code)->first();
        $discount_value = 0;

        if($discount){
            if($discount->tipe == "default"){
                if($discount->operation == 'nominal'){
                    $discount = 100; // sample value
                    return back()->with('success', 'Item berhasil diupdate discount');
                } else {

                }
            }

        }
        
    }
    public function cartList(Request $request) {

        $itemCart = Cart::all()->first();
    
        return response()->view("cartlist.cartlist",[
            "title" => "Cart List",
            "cartlist" => $itemCart
        ]);
    }

    public function removeDetail(Request $request){

        $value = $request->input('value');

        $itemdetail = CartDetail::findOrFail($value);
        if ($itemdetail->delete()) {

            $itemdetail->cart->updatetotal($itemdetail->cart, '-'.$itemdetail->subtotal);
            return back()->with('success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
       
    }

    public function updatePlus(Request $request){
        
        $value = $request->input('value');
        $itemdetail = CartDetail::findOrFail($value);
        $qty = 1;
        $itemdetail->updatedetail($itemdetail, $qty, $itemdetail->price, $itemdetail->discount);
        
        $itemdetail->cart->updatetotal($itemdetail->cart, ($itemdetail->price - $itemdetail->discount));
        return back()->with('success', 'Item berhasil diupdate');

    }
    public function updateMinus(Request $request){

        $value = $request->input('value');
        $itemdetail = CartDetail::findOrFail($value);
        $qty = 1;
        $itemdetail->updatedetail($itemdetail, '-'.$qty, $itemdetail->price, $itemdetail->discount);
       
        $itemdetail->cart->updatetotal($itemdetail->cart, '-'.($itemdetail->price - $itemdetail->discount));
        return back()->with('success', 'Item berhasil diupdate');
    }

    public function updateDiscount($id){
        
    }
}
