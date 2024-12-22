<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem; // Correct model import
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        // Get all items in inventory using InventoryItem model
        $items = InventoryItem::all();
        return view('inventory-management', compact('items')); // Changed to use inventory-management.blade.php
    }

    public function store(Request $request)
    {
        // Store a new inventory item using InventoryItem model
        $inventoryItem = new InventoryItem(); // Correct model
        $inventoryItem->item_name = $request->item_name;
        $inventoryItem->quantity = $request->quantity;
        $inventoryItem->price = $request->price;
        $inventoryItem->save();

        return redirect()->route('inventory.index')->with('success', 'Item added successfully!');
    }

    public function edit($id)
    {
        // Edit an inventory item using InventoryItem model
        $item = InventoryItem::find($id); // Correct model
        return view('inventory.edit', compact('item')); // Ensure you have inventory/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        // Update an inventory item using InventoryItem model
        $item = InventoryItem::find($id); // Correct model
        $item->item_name = $request->item_name;
        $item->quantity = $request->quantity;
        $item->price = $request->price;
        $item->save();

        return redirect()->route('inventory.index')->with('success', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        // Delete an inventory item using InventoryItem model
        $item = InventoryItem::find($id); // Correct model
        $item->delete();

        return redirect()->route('inventory.index')->with('success', 'Item deleted successfully!');
    }

    public function create()
    {
        // Return the view for creating a new inventory item
        return view('inventory.create'); // Ensure you have inventory/create.blade.php
    }
}
