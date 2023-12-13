<?php

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'message' => '',
]);

rules(['message' => 'required|string|max:255']);

$store = function () {
    $validated = $this->validate();

    auth()->user()->posts()->create($validated);

    $this->message = '';

    $this->dispatch('post-created');
};

?>

<div>
    <form wire:submit="store">
        <textarea
            wire:model="message"
            placeholder="¿En qué estás pensando?"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-md"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">Publicar</x-primary-button>
    </form>
</div>
