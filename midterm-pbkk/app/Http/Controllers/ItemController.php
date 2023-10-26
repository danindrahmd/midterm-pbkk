<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\ItemCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    // Menampilkan formulir tambah item
    public function create()
    {
        $itemTypes = ItemType::all();
        $itemConditions = ItemCondition::all();

        return view('items.create', compact('itemTypes', 'itemConditions'));
    }

    public function store(Request $request)
    {
        // Validate form
        $validatedData = $request->validate([
            'item_type_id' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            // Add other validation rules here
        ]);

        // Dump validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('item_images', 'public');
            $validatedData['image_paths'] = $imagePath;
        }

        // Add the following line to set the item_type_id
        $validatedData['item_type_id'] = $request->item_type_id;

        // Save data to the database
        \Auth::user()->items()->create($validatedData);

        // Redirect or show success message
        return redirect()->route('dashboard')->with('success', 'Item berhasil disimpan.');
        
    }

    // Menampilkan daftar item di dashboard
    public function dashboard()
    {
        $user = auth()->user();
        $items = $user->items()->get();

        return view('dashboard', compact('items'));
    }
    
}