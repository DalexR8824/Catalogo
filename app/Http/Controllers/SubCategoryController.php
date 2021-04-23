<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubCategory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCategory = new SubCategory();

        $subCategory->name = $request->name;

        try {
            $subCategory->save();
            return response([
                'message'=>'Subcategoria Almacenada correctamente'
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
        return SubCategory::find($id);
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
        if(SubCategory::find($id)->update($request->all())){
            return response()->json([
                'message' => 'Subcategoria almacenada correctamente'
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
        if(SubCategory::find($id)->delete()){
            return response()->json([
                'message' => 'Subcategoria eliminada correctamente'
            ], 200);
        }
    }
}
