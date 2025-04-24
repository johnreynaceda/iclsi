@section('title', 'Students')
<x-teacher-layout>
    <div>
        <div class="bg-white shadow p-5 rounded-xl flex space-x-3 items-center">
            <h1 class="text-xl text-gray-700 font-bold uppercase"> {{ auth()->user()->teacher->gradeLevel->name }}</h1>
            <div class="text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-app-window-mac">
                    <rect width="20" height="16" x="2" y="4" rx="2" />
                    <path d="M6 8h.01" />
                    <path d="M10 8h.01" />
                    <path d="M14 8h.01" />
                </svg>
            </div>
        </div>
        <div class="mt-5">
            <livewire:teacher.student-list />
        </div>
    </div>
    <x-slot name="sidebar">
        <livewire:sidebar />
    </x-slot>
</x-teacher-layout>
