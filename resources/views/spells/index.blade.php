@extends('layouts.app')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista de Magias</h2>
    </x-slot>

    <x-page-container>
        <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" class="mb-6 flex gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Classe</label>
                    <select name="class" class="border rounded px-2 py-1">
                        <option value="">Todas</option>
                        @foreach (['Wizard', 'Cleric', 'Druid', 'Sorcerer', 'Paladin', 'Bard'] as $classe)
                            <option value="{{ $classe }}" @selected(request('class') === $classe)>{{ $classe }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nível</label>
                    <select name="level" class="border rounded px-2 py-1">
                        <option value="">Todos</option>
                        @for ($i = 0; $i <= 9; $i++)
                            <option value="{{ $i }}" @selected(request('level') == $i)>{{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="bg-blue-500 text-white px-4 py-1 rounded">Filtrar</button>
                </div>
            </form>

            <div class="bg-white shadow sm:rounded-lg p-4">
                @forelse ($spells as $spell)
                <x-card>
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-indigo-700">{{ $spell->name }} (Nível
                            {{ $spell->level }})</h3>
                        <p class="text-gray-700">{{ Str::limit($spell->description, 200) }}</p>
                    </div>
                </x-card>
                @empty
                    <p>Nenhuma magia encontrada.</p>
                @endforelse

                <div class="mt-4">
                    {{ $spells->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </x-page-container>
</x-app-layout>
