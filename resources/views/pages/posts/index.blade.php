<?php

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

name('posts');

middleware(['auth', 'verified']);

?>

<x-app-layout>
    <div class="max-w-xl mx-auto p-4 sm:p-6 lg:p-8">
        <livewire:posts.create />

        <livewire:posts.list />
    </div>
</x-app-layout>
