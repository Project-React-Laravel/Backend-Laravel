<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DetailOrder;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $id = time();
        $order_date = date("Y-m-d H:i:s");
        $customer_name = $r['customer_name'];
        $email = $r['email'];
        $phone = $r['phone'];

        $order = new Order();
        $order->id = $id;
        $order->order_date = $order_date;
        $order->customer_name = $r->input('customer_name');
        $order->email = $r->input('email');
        $order->phone = $r->input('phone');
        $order->save();
        $cartData = $r->input('cartList');
        if (is_array($cartData) || is_object($cartData)){
        foreach ($cartData as $item){
           $detailOrder = new DetailOrder();
           $detailOrder->id_laptop = $item['id_product'];
           $detailOrder->id_order = $order->id;
           $detailOrder->quantity = $item['quantity'];
           $detailOrder->price = $item['price'];
           $detailOrder->name = $item['name'];
           $detailOrder->color = $item['color'];
           $detailOrder->size = $item['size'];
           $detailOrder->img = $item['img'];      
           $detailOrder->save();         
        }}else{
            return response()->json([
                'message' => 'Đã xảy ra lỗi, vui lòng thử lại sau!'
            ], 400);
        }
        return response()->json([
            'message' => 'Đặt hàng thành công!'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
