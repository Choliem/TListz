<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tier_id' => 'nullable|exists:tiers,id',
            'post_id' => 'required|exists:posts,id'
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->image = $request->image;
        $item->description = $request->description;
        $item->tier_id = $request->tier_id;
        $item->post_id = $request->post_id;
        $item->save();

        return response()->json($item);
    }

    public function assignTier(Request $request, $item)
    {
        $tierId = $request->input('tier_id');
        $item = Item::find($item);

        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        $item->tier_id = $tierId;
        $item->save();

        return response()->json(['success' => true, 'item' => $item]);
    }

    public function updateTier(Request $request, Item $item)
    {
        // Validate incoming request
        $request->validate([
            'tier_id' => 'nullable|exists:tiers,id',
            'post_id' => 'required|exists:posts,id',
        ]);

        // Update the item with the new tier
        $item->tier_id = $request->input('tier_id'); // Set the new tier ID (null if moved to container)
        $item->save();

        return response()->json(['message' => 'Item tier updated successfully']);
    }



}
