<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Order;
use App\Orderdetail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order != null)
        {
            $orderdetails = Orderdetail::where('order_id', $order->id)->get();
            return view('order/index', compact('order', 'orderdetails'));
        }
        return view('order/index', compact('order'));
    }

    public function pesan(Request $request, $id)
    {
        $menu = Menu::where('id', $id)->first();
        
        // cek inputan jumlah lebih dari 0
        if ($request->total_order < 1) 
        {
            //alert()->warning('Jumlah order minimal 1', 'Warning !!!');
            return redirect()->back();
        }

        // cek validasi apakah akun yang digunakan adalah akun customer
        if(Auth::user()->role != 1)
        {
            //alert()->warning('harus menggunakan akun customer', 'Warning !!!');
            return redirect()->back();
        }

        // cek validasi apakah sudah ada keranjang
        $order_check = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order_check == null) 
        {
            // simpan ke database order
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status = 0;
            $order->total_price = 0;
            $order->save();
        }

        // simpan ke database orderdetails
        $new_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek order detail apa sudah ada
        $orderdetail_check = Orderdetail::where('menu_id', $menu->id)->where('order_id', $new_order->id)->first();
        if($orderdetail_check == null)
        {
            $orderdetail = new Orderdetail;
            $orderdetail->menu_id = $menu->id;
            $orderdetail->order_id = $new_order->id;
            $orderdetail->quantity = $request->total_order;
            $orderdetail->total_price = $menu->price*$orderdetail->quantity;
            $orderdetail->save();
        }
        else
        {
            $orderdetail = Orderdetail::where('menu_id', $menu->id)->where('order_id', $order_check->id)->first();

            $orderdetail->quantity = $orderdetail->quantity+$request->total_order;
            $orderdetail->total_price = $menu->price*$orderdetail->quantity;
            $orderdetail->update();
        }

        // jumlah total harga
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order->total_price = $order->total_price + $menu->price * $request->total_order;
        $order->update();
        return redirect()->back();
    }
    
    public function delete($id)
    {
        $orderdetail = Orderdetail::where('id', $id)->first();
        $order = Order::where('id', $orderdetail->order_id)->first();

        $order->total_price = $order->total_price - $orderdetail->total_price;
        $order->update();

        $orderdetail->delete();
        
        // menghapus semua keranjang
        $orderdetails = Orderdetail::where('order_id', $orderdetail->order_id)->count();
        if($orderdetails == null)
        {
            $order->delete();
        }

        return redirect('order');
    }

    public function checkout()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order->status = 1;
        $order->update();
        
        return redirect('order');
    }
}
