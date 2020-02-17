<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemController extends Controller
{ 
  public function createItem(Request $request, Item $item){
    $newItem = Item::create([
      'item' => $request->item,
    ]);

/*
    //Associate With User
    $user = auth()->guard('api')->user();
    $newAddress->user()->associate($user->id);
    $newAddress->save();
*/

    return $newItem;
  }
  
  public function getItems(){
    $allItems = Item::orderBy('id', 'desc')->get();
    return $allItems;
  }
}
