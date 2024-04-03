<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function saleIndex(string $userID){
        $salesDetails = Item::where('user_id', $userID)
        ->limit(6)->orderBy('name', 'ASC')->get();
        return view('sale.index', ['saleDetails' => $salesDetails]);
    }

    public function pendingIndex(string $userID){
        $salesDetails = Item::limit(6)->orderBy('artist_name', 'DESC')->get();
        return view('sale.pending-sales-index', ['pendingSaleDetails' => $salesDetails]);
    }
}
