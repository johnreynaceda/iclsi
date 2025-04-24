@section('title', 'Teacher')
<x-admin-layout>
    <div>
        <livewire:admin.teacher.teacher_list />
    </div>
    <x-slot name="sidebar">
        <livewire:sidebar />
    </x-slot>
</x-admin-layout>
