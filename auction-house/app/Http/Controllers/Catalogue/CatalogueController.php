<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogue\CatalogueAddFormRequest;
use App\Http\Requests\Catalogue\CatalogueEditFormRequest;
use App\Models\Catalogue;
use App\Models\Item;
use Illuminate\Http\Request;
//  this catalogue for controlling the catalogue
class CatalogueController extends Controller
{
    //  For displaying the auction
    //  
    public function index()
    {
        //  if the catalogue is viewed from the auctions table
        //  it will executed this query
        if(request()->input('auctionID')){
            //  get all catalogues
            $cataloguesDetails['cataloguesFetchedDetails'] = Catalogue::with('auction')
            //  fetch all by auction id
                ->where('auction_id', request()->input('auctionID'))->get();
                //  get auction id
            $cataloguesDetails['auctionID'] = request()->input('auctionID');

        }else {
            //  this will return all the catalogues which are not archived
            $cataloguesDetails['cataloguesFetchedDetails'] = Catalogue::with('auction')
            //  paginate function is used
                ->where('is_archived', 'no')->paginate(3);
        }
//  return the catalogues
        return view('catalogue.index', $cataloguesDetails);
    }
// " This will open the add form 
// " This will open the add form 
// " This will open the add form 
    public function create()
    {
        //  for adding the catalogue
        if(request()->input('auctionID')){
            //  it will allow to add only if 
            //  it is callled from the auctions page
            $fetchedDetails = [
                // store
                'auctionID' => request()->input('auctionID'),
                'itemNames' => Item::get(['name', 'id']),
            ];
//  return view for the catalogue
//  return 
            return view('catalogue.create', $fetchedDetails);
        }else{
            return redirect()->route('catalogues.index');
        }
    }

//   this will store the catalogues
//  store
    public function store(CatalogueAddFormRequest $requestInput)
    {
        //  create new catalogue
//        $validatedData = $requestInput->();
        $newCatalogueCreated = Catalogue::Create($requestInput->validated());

//        $itemDetail = Item::with('itemCategory')->findOrFail($requestInput['item_id']);
//
//        $itemDetail ->update(['catalogue_id' =>$newCatalogueCreated->id]);

        return redirect()->route('catalogues.index', ['auctionID' => $requestInput['auction_id']])->with('message', 'Catalogue Added');
    }

//    this will open the edit form of the catalogues
    public function edit(Catalogue $catalogue)
    {
//  return edit form 
//  return 
        return view('catalogue.edit', ['catalogueDetailData' => $catalogue,   'itemNames' => Item::get(['name', 'id'])]);
    }
//  this helps to update the catalogues details
    public function update(CatalogueEditFormRequest $catalogueValidInput, Catalogue $catalogue)
    {
        //  only admin can update the catalogues
        $catalogue->update($catalogueValidInput->validated());
        //  return to this route 
        //  return t"

        return redirect()->route('catalogues.index', ['auctionID' => $catalogue->auction_id])->with('message', 'Successfully Updated Catalogue');


    }

//   this will delete teh catalogue 
    public function destroy(Catalogue $catalogue)
    {
        //  find the object of the catalogue
        //  and calls the delete function
        //  and calls the delete function
        $catalogue->delete();
        //  return on success
        return redirect()->route('auctions.index')->with('message', 'Catalogue Successfully Deleted');
    }
}
// this ends here"