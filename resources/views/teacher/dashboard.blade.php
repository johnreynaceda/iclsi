@section('title', 'Dashboard')
<x-teacher-layout>
    <div>
        <livewire:teacher-dashboard />

    </div>
    <x-slot name="sidebar">
        <livewire:sidebar />

    </x-slot>
</x-teacher-layout>
