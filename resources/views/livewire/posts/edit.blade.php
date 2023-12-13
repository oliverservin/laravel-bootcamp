<?php

use function Livewire\Volt\mount;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state(['post', 'message']);

rules(['message' => 'required|string|max:255']);

mount(fn () => $this->message = $this->post->message);

$update = function () {
    $this->authorize('update', $this->post);

    $validated = $this->validate();

    $this->post->update($validated);

    $this->dispatch('post-updated');
};

$cancel = fn () => $this->dispatch('post-edit-cancelled');

?>

<div>
    <form wire:submit="update">
        <textarea
            wire:model="message"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <div class="mt-4 flex items-center gap-4">
            <x-primary-button>Guardar</x-primary-button>
            <button wire:click.prevent="cancel">Cancelar</button>
        </div>
    </form>
</div>
