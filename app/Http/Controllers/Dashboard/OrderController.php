<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
            /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.orders.index');
    }
}
