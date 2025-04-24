<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendances') }}
        </h2>
    </x-slot>
    <div>
        <livewire:parent.attendance-record />
    </div>
</x-app-layout>
