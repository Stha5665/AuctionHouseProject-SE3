<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\EditItemFormRequest;
use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Item\AddItemFormRequest;
use Illuminate\Support\Facades\File;

//  this /" is the item controller
class ItemController extends Controller
{
//    For displaying the list of items
    public function index()
    {
        //  if the user is admin allow to view all the items

        //  if the user is not admin the item added by current user will only be 
        //  viewed

        if(auth()->user()->isUserAdmin()){
//  get details
            $itemDetails['itemsDetails'] = Item::with('user', 'itemCategory')->get();
        }else{
            //  get item details
            $itemDetails['itemsDetails'] = Item::where('user_id', auth()->user()->id)->with('user', 'itemCategory')->get();
        }
//  returnin the items page
        return view('item.index', $itemDetails);
    }

//  this will open create the form
    public function create()
    {
//  return view
        return view('item.create');
    }

    //  this function is used for storing the item details
    public function store(AddItemFormRequest $inputDetails)
    {
        //  apply these validateion
        $validatedDetails = $inputDetails->except(['_token',
            'category_name', 'image_path', 'used_medium', 'used_material', 'weight', 'is_framed', 'image_type_of', 'dimension']);
//  if the coun is 0
//  then create new item lot reference
// 
       if(Item::count() == 0){
           $validatedDetails['lot_reference_id'] = random_int(10000000, 99999999);
       }else{
        //  if already exists then the max lot reference will be plus with 1
           $validatedDetails['lot_reference_id'] = Item::max('lot_reference_id') + 1;
       }

    //     open
       $validatedDetails['status'] = 'open';
    //     get current logged user
       $validatedDetails['user_id'] = auth()->user()->id;

//  create new item
        $newCreatedItem = Item::create($validatedDetails);
//  get the only validate asked details
        $validatedDetails = $inputDetails->only(['category_name', 'image_path', 'used_medium', 'used_material', 'weight', 'is_framed', 'image_type_of', 'dimension']);
    //     get item id
        $validatedDetails['item_id'] = $newCreatedItem->id;
//  create new item 
//  create new item 
        ItemCategory::create($validatedDetails);

//        For adding photo
        if($inputDetails->hasFile('image_path')){
            $saveImageLocation = 'uploads/items/';

            $getImageExtension = $validatedDetails['image_path']->getClientOriginalExtension();

            $imageName = $newCreatedItem->id.'.'.$getImageExtension;
            $validatedDetails['image_path']->move($saveImageLocation, $imageName);

            $image_path = $saveImageLocation.$imageName;

            $newCreatedItem->update([
                'image_path' => $image_path
            ]);
        }


        return redirect()->route('items.index')->with('message', 'Successfully Added New Item');

    }

//  thiw will call the edit form
    public function edit(Item $item)
    {
//  return the item detail
        return view('item.edit', [
            'itemDetail' => $item
        ]);
    }

//   update the item selected
    public function update(EditItemFormRequest $inputDetails, string $itemID)
    {
        //  get the item having this key
        //  for the storage
        $validatedDetails = $inputDetails->except(['_token',
            'category_name', 'image_path', 'used_medium', 'used_material', 'weight', 'is_framed', 'image_type_of', 'dimension']);
//  the item will be find
        $itemDetail = Item::with('itemCategory')->findOrFail($itemID);
//  update the dtail
        $itemDetail ->update($validatedDetails);
//  get only this details from validated request
        $validatedDetails = $inputDetails->only(['category_name', 'image_path', 'used_medium', 'used_material', 'weight', 'is_framed', 'image_type_of', 'dimension']);
// upate the item 
        $itemDetail->itemCategory->update($validatedDetails);

//        For adding photo
        if($inputDetails->hasFile('image_path')){

            if(File::exists($itemDetail->image_path)){

                File::delete($itemDetail->image_path);
            }

            $saveImageLocation = 'uploads/items/';

            $getImageExtension = $validatedDetails['image_path']->getClientOriginalExtension();

            $imageName = $itemDetail->id.'.'.$getImageExtension;
            $validatedDetails['image_path']->move($saveImageLocation, $imageName);

            //  for saving imagpe apgtha
            $image_path = $saveImageLocation.$imageName;
// "update image details
            $itemDetail->update([
                // image path
                'image_path' => $image_path
            ]);
        }

//  return this route
//  return this route
        return redirect()->route('items.index')->with('message', 'Successfully Updated Item');

    }

    public function destroy(Item $item)
    {
        try {

            $itemDetail = $item;

            if ($item->image_path) {
                if (File::exists($itemDetail->image_path)) {

                    File::delete($itemDetail->image_path);
                }
            }

//        deleting the child table record
            $item->itemCategory()->delete();
//        deleting parent record
            $item->delete();

        }catch (\Exception $exceptionMessage) {
            // redirect when exception is obtained
            return redirect()->route('items.index')->withErrors($exceptionMessage->getMessage());
        }

        return redirect()->route('items.index')->with('message', 'Successfully Deleted Item');

    }
}
