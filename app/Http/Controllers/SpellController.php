<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spell;

class SpellController extends Controller
{
    public function index(Request $request)
    {
        $query = Spell::query();

        if ($request->filled('class')) {
            $query->whereJsonContains('classes', $request->class);
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        $spells = $query->orderBy('level')->orderBy('name')->paginate(20);
        
        return view('spells.index', compact('spells'));
    }
}
