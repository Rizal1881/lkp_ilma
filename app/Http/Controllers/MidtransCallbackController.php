<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Riwayat;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        $order_id = $request->order_id;
        $status = $request->transaction_status;

        $data = Pendaftaran::where('order_id', $order_id)->first();

        if (!$data) {
            return response()->json(['message' => 'Not found'], 404);
        }

        if ($status == 'settlement') {
            $data->payment_status = 'success';
        } elseif ($status == 'pending') {
            $data->payment_status = 'pending';
        } else {
            $data->payment_status = 'failed';
        }

        $data->save();

        return response()->json(['message' => 'OK']);
    }
}