<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cargo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function create(Order $order)
    {
        $orders = auth()->user()->ordersUser()->orderBy('created_at', 'desc')->get();

        $formattedDates = [];

        foreach ($orders as $order) {
            $date = Carbon::parse($order->created_at);
            if ($date->year != now()->year) {
                $formattedDates[$order->id] = $date->translatedFormat('d F Y');
            } else {
                $formattedDates[$order->id] = $date->translatedFormat('d F');
            }
        }

        return view('user.my-orders', compact('orders', 'formattedDates'));
    }


    public function store(Request $request)
    {
        $items = $request->input('items');
        $liquid = $request->input('liquid');
        $fragile = $request->input('fragile');
        $loose = $request->input('loose');
        $dangerous = $request->input('dangerous');
        $declaredCost = $request->input('declared_cost');
        $deliveryDate = $request->input('delivery_date');
        $pallet = $request->input('pallet');
        $protective_packaging = $request->input('protective_packaging');
        $carton = $request->input('carton');
        $totalPrice = $request->input('totalPrice');
        $city_from = $request->input('city_from');
        $city_into = $request->input('city_into');

        $user = $request->user();
        $order = Order::create([
            'id_client' => $user->id,
            'liquid' => $liquid,
            'fragile' => $fragile,
            'loose' => $loose,
            'dangerous' => $dangerous,
            'declared_cost' => $declaredCost,
            'delivery_date' => $deliveryDate,
            'pallet' => $pallet,
            'protective_packaging' => $protective_packaging,
            'carton' => $carton,
            'cost' => $totalPrice,
            'city_from' => $city_from,
            'city_into' => $city_into,
        ]);


        foreach ($items as $item) {
            $cargo = new Cargo();
            $cargo->id_order = $order->id;
            $cargo->length = $item['length'];
            $cargo->width = $item['width'];
            $cargo->height = $item['height'];
            $cargo->weight = $item['weight'];
            $cargo->quantity = $item['quantity'];
            $cargo->save();
        }

        return response()->json(['message' => 'Data saved successfully']);
    }

    public function show(Order $order)
    {
        $order->load('cargo');

        $order->declared_cost = number_format($order->declared_cost, ($order->declared_cost - floor($order->declared_cost)) ? 2 : 0, ',', ' ') . ' ₽';
        $order->cost = number_format($order->cost, ($order->cost - floor($order->cost)) ? 2 : 0, ',', ' ') . ' ₽';
        $date = Carbon::parse($order->created_at);
        $formattedDate = $date->translatedFormat('d F Y');

        if ($date->year != now()->year) {
            $formattedDate = $date->translatedFormat('d F Y');
        } else {
            $formattedDate = $date->translatedFormat('d F');
        }

        switch ($order->status->id) {
            case '1':
                $progress = 2;
                break;
            case '2':
                $progress = 16;
                break;
            case '3':
                $progress = 35;
                break;
            case '4':
                $progress = 45;
                break;
            case '5':
                $progress = 66;
                break;
            case '6':
                $progress = 86;
                break;
            case '7':
                $progress = 100;
                break;
            default:
                $progress = 0;
        }

        $merchant_id = 50220;
        $order_amount = $order->cost;
        $secret_word = 'D@ss5,itAGB6g9y';
        $currency = 'RUB';
        $order_id = $order->id;
        $sign = md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$currency.':'.$order_id);

        return view('user.order', compact('order', 'progress', 'formattedDate', 'sign'));
    }
}
