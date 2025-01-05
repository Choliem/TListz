<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $item = Item::create($request->all());

        return response()->json($item);
    }
}
