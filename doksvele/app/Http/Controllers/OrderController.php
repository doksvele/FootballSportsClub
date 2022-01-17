<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index()
  {
    $orders = Order::join('users', 'users.id', '=', 'orders.user_id')->join('tickets', 'tickets.id', '=', 'orders.ticket_id')->get(['orders.*', 'users.*', 'tickets.*']);
    return view('orders.index',compact('orders'));
  }

  public function create()
  {
    $orders = Order::join('users', 'users.id', '=', 'orders.user_id')->join('tickets', 'tickets.id', '=', 'orders.ticket_id')->get(['orders.*', 'users.*', 'tickets.*']);
    return view('orders.create',compact('orders'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'user_id' => 'required',
      'ticket_id' => 'required',
      'amount' => 'required',
    ]);
    Order::create($request->all());
    return redirect()->route('orders.index')->with('success','Order created successfully.');
  }
}
