<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laptop;

class LaptopApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laptop = Laptop::all();
        return $laptop;
    }

    public function detail($id)
    {
        $detail = Laptop::find($id);
        return $detail;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laptop = new Laptop();
        $laptop->name = $request->input('name');
        $laptop->brand = $request->input('brand');
        $laptop->price = $request->input('price');
        $laptop->processor = $request->input('processor');
        $laptop->RAM = $request->input('ram');
        $laptop->storage = $request->input('storage');
        $laptop->screen_size = $request->input('screen_size');
        $laptop->graphic_card = $request->input('graphic_card');
        $laptop->operating_system = $request->input('operating_system');
        $laptop->description = $request->input('description');
        $laptop->image_url = $request->input('image_url');
        $laptop->save();
        return response()->json([
            'message' => 'Thêm sản phẩm thành công!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Laptop::find($id);
        return $detail;
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
        $laptop = Laptop::find($id);
        $laptop->name = $request->input('name');
        $laptop->brand = $request->input('brand');
        $laptop->price = $request->input('price');
        $laptop->processor = $request->input('processor');
        $laptop->RAM = $request->input('ram');
        $laptop->storage = $request->input('storage');
        $laptop->screen_size = $request->input('screen_size');
        $laptop->graphic_card = $request->input('graphic_card');
        $laptop->operating_system = $request->input('operating_system');
        $laptop->description = $request->input('description');
        $laptop->image_url = $request->input('image_url');
        $laptop->save();
        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công!'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laptop = Laptop::find($id);
        if (!$laptop) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
        $laptop->delete();
        return response()->json(['message' => 'Xóa sản phẩm thành công'], 200);
    }
}
