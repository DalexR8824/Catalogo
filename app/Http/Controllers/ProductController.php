<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('stock', '>', 0)
                            ->where('price', '>', 0)
                            ->whereHas('subCategory', function(Builder $query){
                                $query->where('state',1);
                            })
                            ->with('subCategory')
                            ->get();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->image = $request->image;
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->sub_category_id = $request->sub_category_id;

        try {
            $product->save();
            return response([
                'message'=>'Producto Almacenado'
            ], 200);
        } catch (\Throwable $th) {
            return response([
                'data' => $th,
                'message'=>'Intenta nuevamente'
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
        return Product::find($id);
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
        if(Product::find($id)->update($request->all())){
            return response()->json([
                'message' => 'Producto almacenado correctamente'
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
        if(Product::find($id)->delete()){
            return response()->json([
                'message' => 'Producto eliminado correctamente'
            ], 200);
        }
    }
}
