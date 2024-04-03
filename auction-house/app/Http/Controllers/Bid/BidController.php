<?php

namespace App\Http\Controllers\Bid;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class BidController extends Controller
{

    private function getMaxBidding(string $itemID){
        $maxBidding = Bid::where('item_id', $itemID)->max('amount');

        return $maxBidding ?? 0;
    }

    public function showBiddings(string $auctionID, string $itemID){
        $biddingDetails = Bid::with('item', 'auction', 'user')
            ->where('auction_id', $auctionID)
            ->where('item_id', $itemID)->get();


        return view('bid.index', ['bidDetails' => $biddingDetails]);
    }

    public function createBid(string $catalogueID, $itemID, $bidType){

        $catalogueDetail = Catalogue::findOrFail($catalogueID);

        if($this->getMaxBidding($itemID)){
            $maxBidding = $this->getMaxBidding($itemID);
        }else{
            $maxBidding = $catalogueDetail->estimated_price;
        }

        return view('bid.create', ['auctionID' => $catalogueDetail->auction->id, 'itemID' => $itemID, 'maxBidding' => $maxBidding, 'bidType'=> $bidType]);
    }

    public function storeBid(Request $BidRequestData){

        $validDataDetail = $BidRequestData->validate([
            'auction_id' => 'required|string',
            'item_id' => 'required|string',
            'amount' => 'required|numeric|min:'.$BidRequestData['min_bid'],
            'description' => 'required',
            'type' => 'required',

        ]);


        $validDataDetail['status'] = 'open';
        $validDataDetail['user_id'] = auth()->user()->id;
        $validDataDetail['created_at'] = now();

        Bid::create($validDataDetail);

        return redirect()->route('catalogues.index')->with('message', 'Bid successful');

    }
}
