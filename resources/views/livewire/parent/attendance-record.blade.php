<div>
    @php
        $student = \App\Models\Student::where('id', auth()->user()->parent->student_id)->first();

    @endphp
    <h1 class="text-xl font-bold text-gray-700">Grade Level: {{ $student->gradeLevel->name }}</h1>
    <h1 class="text-xl font-bold text-gray-700">Teacher:
        {{ $student->gradeLevel->teacher->firstname . ' ' . $student->gradeLevel->teacher->lastname }}</h1>
    <div class="mt-5">
        {{ $this->table }}
    </div>
</div>
