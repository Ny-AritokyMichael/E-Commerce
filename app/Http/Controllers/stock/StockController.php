<?php

namespace App\Http\Controllers\stock;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::getStockGrouped();
        return view('admin.stock', ['stocks' => $stocks]);
    }
}
