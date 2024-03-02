<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\Order;
use App\Models\Cargo;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    // Контактная форма
    public function contactFormShow()
    {
        $data = ContactForm::orderBy('created_at', 'desc')->get();

        return view('manager.contact-form', compact('data'));
    }
    public function contactFormDestroy($id)
    {
        ContactForm::destroy($id);

        return redirect()->back();
    }

    // Заказы
    public function ordersShow()
    {
        $managerId = Auth::id();

        $orders = Order::with('user', 'status')->whereNull('id_manager')->orWhere('id_manager', $managerId)->orderBy('created_at', 'desc')->get();

        $formattedDates = [];
        foreach ($orders as $order) {
            $date = Carbon::parse($order->created_at);
            $formattedDates[$order->id] = $date->translatedFormat('d M Y');
        }

        return view('manager.orders', compact('orders', 'formattedDates'));
    }

    public function orderShow(Order $order, Status $status)
    {
        $order->load('user', 'status', 'cargo');

        $order->declared_cost = number_format($order->declared_cost, ($order->declared_cost - floor($order->declared_cost)) ? 2 : 0, ',', ' ') . ' ₽';
        $status = Status::all();
        $date = Carbon::parse($order->created_at);
        $formattedDate = $date->translatedFormat('d M Y');

        $order->delivery_date = Carbon::parse($order->delivery_date);
        $order->delivery_date = $order->delivery_date->translatedFormat('d M Y');

        return view('manager.order', compact('order', 'formattedDate', 'status'));
    }
    public function orderUpdate(Order $order, Request $request, $id)
    {
        $order = Order::find($id);

        $order->cost = $request->input('cost');
        $status = $request->input('status');

        $order->id_status = $status;
        $order->id_manager = Auth::id();

        $order->save();

        return redirect()->back();
    }

    public function orderDelete($id)
    {
        Cargo::where('id_order', $id)->delete();
        Order::destroy($id);

        return redirect()->route('manager-orders');
    }

    public function orderShowUser(User $user, Order $order, $user_id)
    {
        $user = User::find($user_id);
        $user->load('company');
        return view('manager.order-user', compact('user'));
    }
}
