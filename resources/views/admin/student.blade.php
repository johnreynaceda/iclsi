@section('title', 'Students')
<x-admin-layout>
    <div>
        <livewire:admin.student-info />
    </div>
    <x-slot name="sidebar">
        <livewire:sidebar />

    </x-slot>
</x-admin-layout>
