<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;
use App\CartItem;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CartItem::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_id = $request->user_id;
        $quantity = $request->quantity;
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        if($product->stock < $quantity){
            $quantity = $product->stock;
        }
        $cart_user = Cart::firstOrCreate(array('client_id' => $client_id));
        
        $added_items = new CartItem;

        $added_items->quantity = $quantity;
        $added_items->product_id = $product_id;
        $added_items->cart_id = $cart_user->id;
        
        if($added_items->save()){
            return response()->json([
                'message' => 'Item agregado correctamente'
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $total_pagar=0;
        $total_productos=0;
        $cart_client = Cart::where('client_id', $id)->first();
        $total_referencias=count($cart_client->cartItems);

        foreach ($cart_client->cartItems as $key => $item) {
            
            $total_pagar = $total_pagar + ($item->product->price * $item->quantity);
            $total_productos = $total_productos + $item->quantity;
        }

        return response()->json([
                'total_pagar' => $total_pagar,
                'total_referencias' => $total_referencias,
                'total_productos' => $total_productos,
                'detalle_items' => $cart_client->cartItems
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quantity = $request->quantity;
        $product = Product::find($request->product_id);
        if($product->stock < $request->quantity){
            $quantity = $product->stock;
        }
        $item = CartItem::find($id);

        $item->quantity = $quantity;
        $item->product_id = $request->product_id;
        if($item->update()){

            return response()->json([
                'message' => 'Item actualizado correctamente'
            ], 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(CartItem::find($id)->delete()){
            return response()->json([
                'message' => 'Item eliminado correctamente'
            ], 200);
        }
    }
}
