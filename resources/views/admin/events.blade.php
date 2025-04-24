@section('title', 'Events')
<x-admin-layout>
    <div>
        <livewire:admin.event-list />
    </div>
    <x-slot name="sidebar">
        <livewire:sidebar />

    </x-slot>
</x-admin-layout>
