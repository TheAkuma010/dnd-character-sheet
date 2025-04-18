@extends('layouts.app')

@section('title', 'Suas Fichas')
@section('description', 'Lista de fichas de personagens do usuário.')

@section('content')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Suas Fichas</h2>
        </x-slot>

        <x-page-container>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            @foreach ($characters as $char)
                                <div class="mb-4">
                                    <a href="{{ route('characters.show', $char) }}"
                                        class="text-lg text-blue-600 hover:underline">
                                        {{ $char->name }} — Nível {{ $char->level }} {{ $char->class }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </x-page-container>
@endsection
