<?php

namespace App\Http\Controllers\Auction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auction\AuctionAddFormRequest;
use App\Http\Requests\Auction\AuctionEditFormRequest;
use App\Models\Auction;
use App\Models\Catalogue;
use Illuminate\Http\Request;

//tHIS IS THE CONTROLLER FOR THE AUCTION
class AuctionController extends Controller
{
//THIS CONTROLLER calls or perform query with model
//
// The index function will return the auctions page.
    public function index()
    {
//         if the user have searched the auction this condition will be executed
//
        if(request()->input('advance_search_by') || request()->input('start_date')){
//fetch all the item details
//             get only auction having the catalogue mathcing the artist name
//            or start date
            $itemDetails['itemsDetails'] = Auction::whereHas('catalogues', function ($queryDetail){
//                this will return the query result
                return $queryDetail->whereHas('item', function ($query){
                    //  return the detail by artist name
                    //  return the detail by artist name

                   return $query->where('artist_name', request()->input('advance_search_by'));
                });
            })
                ->orWhere('start_date', \request()->input('start_date'))
                ->get();
//  this will give all teh auctions details
        }else{
            // return all the item s details
        //  in each auction
            $itemDetails['itemsDetails'] = Auction::get();
        }
//  return view
        return view('auction.index', $itemDetails);
    }

//  this wil return the add form
    public function create()
    {
        //  return the view
        return view('auction.create');
    }
//  this store function will store the detail of auction
    public function store(AuctionAddFormRequest $auctionAddDetails)
    {
        //  all the valid details are obtained from form validation
        $validatedDetails = $auctionAddDetails->validated();
        //  the auctions are open at initial stage
        $validatedDetails['status'] = 'open';
        //  create the auction date
        Auction::create($validatedDetails);
//  return the route to the auction page
        return redirect()->route('auctions.index')->with('message', 'Successfully Added New Auction');

    }

//    this will send the edit form
    public function edit(Auction $auction)
    {
//  for the edit form
        return view('auction.edit', ['auctionDetailData' => $auction]);
    }

//     this will update the auction detail
    public function update(AuctionEditFormRequest $auctionEditDetail, Auction $auction)
    {
//  get the valid detail and update the detail
        $auction->update($auctionEditDetail->validated());
//  get the auction to archive
        if($auctionEditDetail['is_archived'] == 'yes'){
            // update auction to archive
            $auction->catalogues()->update([
                'is_archived' => 'yes',
            ]);
            //  if not archived 
        }else if($auctionEditDetail['is_archived'] == 'no'){
            //  set to no
            $auction->catalogues()->update([
                'is_archived' => 'no',
            ]);
            //  return this page
        }
        return redirect()->route('auctions.index')->with('message', 'Successfully Updated Auction');

    }

//  this destroy function will delete the auction
    public function destroy(Auction $auction)
    {
        //  delete the auction
        $auction->delete();
        //  return the route for the auction
        //  and show the success message
        return redirect()->route('auctions.index')->with('message', 'Successfully Deleted');
    }

    //  archive auction data
    
    public function archiveAuctionData(string $auctionID){
//  when we click on the archive, the auction will be archived by this function
        $auctionDetailData = Auction::with('catalogues')->findOrFail($auctionID);
//  update to archive
        $auctionDetailData->update([
            'is_archived' => 'yes'
        ]);
//  update catalogue to hide when auction are archived
        $auctionDetailData->catalogues()->update([
            'is_archived' => 'yes'
        ]);
        //  return to this route
        return redirect()->route('auctions.index')->with('message', 'Successfully Archived Auction and lot details');
    }
}
