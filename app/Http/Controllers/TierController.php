<?php

namespace App\Http\Controllers;

use App\Models\Tier;
use Illuminate\Http\Request;

class TierController extends Controller
{
    public function store(Request $request)
    {
        $tier = Tier::create([
            'name' => $request->name,
            'rank' => $request->rank,
            'post_id' => $request->post_id,
        ]);

        return response()->json($tier);
    }
    public function destroy(Tier $tier)
    {
        $tier->delete();
        return response()->json(['success' => 'Tier deleted successfully']);
    }
}
