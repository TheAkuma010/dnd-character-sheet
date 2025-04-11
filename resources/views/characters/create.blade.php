@extends('layouts.app')

@section('content')
    <h1>Create a New Character</h1>

    <form method="POST" action="{{ route('characters.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="race">Race:</label>
        <input type="text" name="race" required>
        
        <label for="class">Class:</label>
        <input type="text" name="class" required>

        <label for="strength">Strength:</label>
        <input type="number" name="strength" required>

        <label for="dexterity">Dexterity:</label>
        <input type="number" name="dexterity" required>

        <label for="constitution">Constitution:</label>
        <input type="number" name="constitution" required>

        <label for="intelligence">Intelligence:</label>
        <input type="number" name="intelligence" required>

        <label for="wisdom">Wisdom:</label>
        <input type="number" name="wisdom" required>

        <label for="charisma">Charisma:</label>
        <input type="number" name="charisma" required>

        <label for="level">Level:</label>
        <input type="number" name="level">
        
        <button type="submit">Create Character</button>
    </form>
@endsection
