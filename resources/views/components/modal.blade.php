@props(['wireModel' => false])

<div x-data="{ show: @entangle($wireModel) }" 
     x-show="show"
     x-transition.opacity
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
     x-cloak>
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-4" 
         x-on:click.away="show = false">
        {{ $slot }}
    </div>
</div>