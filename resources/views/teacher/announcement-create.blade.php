@section('title', 'Create Announcements')
<x-teacher-layout>
    <div>
        <div class="mt-5">
            <livewire:teacher.create-announcement />
        </div>
    </div>
    <x-slot name="sidebar">
        <livewire:sidebar />
    </x-slot>
</x-teacher-layout>
