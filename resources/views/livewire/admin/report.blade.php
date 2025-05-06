<div x-data>
    <div class="w-64">
        <x-native-select label="Filter Report" wire:model.live="filter">
            <option>Select an Option</option>
            <option value="1">Student Attendance</option>
            <option value="2">School Activities</option>
            <option value="3">Late Students</option>
        </x-native-select>
    </div>
    <div class="mt-10 ">
        @if ($filter)
            @switch($filter)
                @case(1)
                    <div class="bg-white p-5">
                        <div class="flex justify-between items-end">
                            <div class="flex space-x-3 items-center">
                                <div class="w-40">
                                    <x-native-select label="Grade Level" wire:model.live="grade_level_id">
                                        <option>Select an Option</option>
                                        @forelse ($gradeLevels as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                        @endforelse

                                    </x-native-select>
                                </div>
                                <div class="w-64">
                                    <x-datetime-picker wire:model.live="date" label="Date"
                                        placeholder="{{ now()->format('m/d/Y') }}" without-timezone without-time />
                                </div>
                            </div>
                            <div>
                                <x-button label="Print" icon="printer" class="font-semibold" slate
                                    @click="printOut($refs.printContainer.outerHTML);" />
                            </div>
                        </div>
                        <div class="mt-5" x-ref="printContainer">
                            @if ($grade_level_id)
                                <h1> {{ \App\Models\GradeLevel::where('id', $grade_level_id)->first()->name }}</h1>
                            @endif
                            <div class="mt-3">
                                <table id="example" style="width:100%">
                                    <thead class="font-normal">
                                        <tr>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                FULLNAME
                                            </th>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                GRADE LEVEL
                                            </th>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                DATE
                                            </th>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                TIME-IN
                                            </th>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                TIME-OUT
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @forelse ($attendances as $item)
                                            <tr>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ $item->student->lastname . ', ' . $item->student->firstname }}
                                                </td>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ $item->student->gradeLevel->name }}
                                                </td>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                                </td>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ \Carbon\Carbon::parse($item->time_in)->format('h:i A') }}
                                                </td>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ \Carbon\Carbon::parse($item->time_out)->format('h:i A') }}
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @break

                @case(2)
                    <div class="bg-white p-5 ">
                        <div class="flex justify-between items-end">
                            <div class="flex space-x-3 items-center">

                            </div>
                            <div>
                                <x-button label="Print" icon="printer" class="font-semibold" slate
                                    @click="printOut($refs.printContainer.outerHTML);" />
                            </div>
                        </div>

                        <div class="mt-5" x-ref="printContainer">
                            <div class="mb-5">
                                <h1 class="text-xl font-bold">SCHOOL ACTIVITIES</h1>
                            </div>
                            <table id="example" style="width:100%">
                                <thead class="font-normal">
                                    <tr>
                                        <th
                                            class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                            NAME OF ACTIVITY
                                        </th>
                                        <th
                                            class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                            DATE
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="">
                                    @forelse ($activities as $item)
                                        <tr>
                                            <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                {{ $item->name }}
                                            </td>
                                            <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                {{ \Carbon\Carbon::parse($item->date_of_event)->format('F d, Y') }}
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                @break

                @case(3)
                    <div class="bg-white p-5">
                        <div class="flex justify-between items-end">

                            <div>
                                <x-button label="Print" icon="printer" class="font-semibold" slate
                                    @click="printOut($refs.printContainer.outerHTML);" />
                            </div>
                        </div>
                        <div class="mt-5" x-ref="printContainer">
                            @if ($grade_level_id)
                                <h1> {{ \App\Models\GradeLevel::where('id', $grade_level_id)->first()->name }}</h1>
                            @endif
                            <div class="mt-3">
                                <table id="example" style="width:100%">
                                    <thead class="font-normal">
                                        <tr>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                FULLNAME
                                            </th>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                GRADE LEVEL
                                            </th>
                                            <th
                                                class="border border-gray-500  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                                                DATE
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @forelse ($lates as $item)
                                            <tr>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ $item->student->lastname . ', ' . $item->student->firstname }}
                                                </td>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ $item->student->gradeLevel->name }}
                                                </td>
                                                <td class="border border-gray-500 text-gray-700  px-3 py-1">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                                </td>

                                            </tr>
                                        @empty
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @break

                @default
            @endswitch
        @else
            <div class="grid
                                place-content-center">
                <x-shared.report class="h-96" />
            </div>
        @endif
    </div>
</div>
