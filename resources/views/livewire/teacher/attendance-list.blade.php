<div>
    <div>
        {{ $this->table }}
    </div>

    <div class="absolute top-[2rem] right-5 w-96 bottom-[2rem] rounded-[2rem] bg-green-600">
        <div class="relative z-50">
            <div class="p-5">
                <!-- QR Code Display -->
                <div class="border rounded-2xl bg-white overflow-hidden">
                    <img src="{{ asset('images/qr.gif') }}" class="h-full w-full object-cover" alt="QR Code">
                </div>

                <!-- QR Input -->
                <div class="mt-2 flex flex-col space-y-3 justify-center">
                    <input type="text" wire:model.live="qr" class="w-full  rounded-xl" autofocus
                        placeholder="Enter QR Code">
                    <div class="flex space-x-3 text-white font-semibold items-center">
                        <span>Time In</span>
                        <x-toggle id="size-xl" wire:model.live="is_time_out" negative name="toggle" xl />
                        <span>Time Out</span>
                    </div>

                </div>

                <!-- Attendance Section -->
                <div class="mt-5">
                    <div class="flex space-x-2 mb-3 items-end text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-qr-code text-white">
                            <rect width="5" height="5" x="3" y="3" rx="1" />
                            <rect width="5" height="5" x="16" y="3" rx="1" />
                            <rect width="5" height="5" x="3" y="16" rx="1" />
                            <path d="M21 16h-3a2 2 0 0 0-2 2v3" />
                            <path d="M21 21v.01" />
                            <path d="M12 7v3a2 2 0 0 1-2 2H7" />
                            <path d="M3 12h.01" />
                            <path d="M12 3h.01" />
                            <path d="M12 16v.01" />
                            <path d="M16 12h1" />
                            <path d="M21 12v.01" />
                            <path d="M12 21v-1" />
                        </svg>
                        <span class="font-semibold">Today's Attendance</span>
                    </div>

                    <!-- Attendance List -->
                    <ul class="space-y-2">
                        <!-- Attendance Item -->
                        @forelse ($todays as $item)
                            <li class="bg-white px-3 py-3 rounded-lg flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <div class="h-10 w-10 rounded-lg bg-green-500 shadow overflow-hidden">
                                        <img src="{{ asset('images/iclsi_logo.png') }}" alt="Logo">
                                    </div>
                                    <div>
                                        <h1 class="font-bold">
                                            {{ $item->student->lastname . ', ' . $item->student->firstname }}</h1>
                                        <h1 class="text-sm leading-3">{{ $item->student->gradeLevel->name }}</h1>
                                    </div>
                                </div>
                                <span
                                    class="text-xs">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                            </li>
                        @empty
                            <li>
                                <div class="text-center text-gray-100">No attendance recorded today.</div>
                            </li>
                        @endforelse



                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- @section('sidebar')
        
    @endsection --}}

</div>
