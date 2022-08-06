<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function make(Request $request) {
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Ymd");
        $randChar =  substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 5);
        $dataOrder['orderNumber'] = $date."_".$randChar;
        $dataOrder['orderData'] = $request->all();

        try {
            Order::create($dataOrder);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()]);
        }
        return response()->json(["message" => "success"]);

    }
}
