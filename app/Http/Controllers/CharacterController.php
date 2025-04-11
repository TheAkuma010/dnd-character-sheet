<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = auth()->user()->is_gm
            ? Character::all()
            : auth()->user()->characters;
            
        return view('characters.index', compact('characters'));
    }
    public function create()
    {
        return view('characters.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'strength' => 'required|integer',
            'dexterity' => 'required|integer',
            'constitution' => 'required|integer',
            'intelligence' => 'required|integer',
            'wisdom' => 'required|integer',
            'charisma' => 'required|integer',
            'level' => 'nullable|integer',
        ]);

        Character::create($validated);

        return redirect()->route('characters.index');
    }
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }
    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }
    public function update(Request $request, Character $character)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'strength' => 'required|integer',
            'dexterity' => 'required|integer',
            'constitution' => 'required|integer',
            'intelligence' => 'required|integer',
            'wisdom' => 'required|integer',
            'charisma' => 'required|integer',
            'level' => 'nullable|integer',
        ]);

        $character->update($validated);
        
        return redirect()->route('characters.show', $character);
    }
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index');
    }
}
