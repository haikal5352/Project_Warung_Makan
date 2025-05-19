<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Form Order (customer)
    public function create()
    {
        $menus = Menu::where('is_available', true)->get();
        return view('orders.create', compact('menus'));
    }

    // Simpan Order
    public function store(Request $request)
    {
        $request->validate([
            'items'   => 'required|array',
            'address' => 'required|string',
            'phone'   => 'required|string',
        ]);

        $order = Order::create([
            'user_id'       => Auth::id(),
            'customer_name' => Auth::user()->name,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'status'        => 'pending',
            'total_price'   => 0,
        ]);

        $total = 0;
        foreach ($request->items as $menuId => $qty) {
            $menu = Menu::findOrFail($menuId);
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id'  => $menu->id,
                'quantity' => $qty,
                'price'    => $menu->price,
            ]);
            $total += $menu->price * $qty;
        }
        $order->update(['total_price' => $total]);

        return redirect()->route('orders.success');
    }

    // Halaman sukses
    public function success()
    {
        return view('orders.success');
    }

    // Admin: lihat semua pesanan
    public function adminIndex()
    {
        $orders = Order::with('orderItems.menu')->get();
        return view('admin.orders.index', compact('orders'));
    }
}


