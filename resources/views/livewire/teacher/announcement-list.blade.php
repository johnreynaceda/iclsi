<div x-data="{ modalOpen: @entangle('modalOpen') }" @keydown.escape.window="modalOpen = false">
    <div class="flex justify-start">
        <x-button green class="font-semibold" icon="plus" label="Create Announcement"
            href="{{ route('teacher.announcement-create') }}" />
    </div>
    <div class="grid 2xl:grid-cols-4 grid-cols-2 gap-5 mt-5">
        @forelse ($announcements as $item)
            <div class="group relative border rounded-lg rounded-t-lg p-2 bg-gray-400  cursor-pointer">

                <div class="relative overflow-hidden ">
                    <img src="{{ Storage::url($item->image_path) }}" alt="Front of men's Basic Tee in black."
                        class="aspect-square w-full rounded-md bg-gray-200 object-cover transition-all duration-500 group-hover:opacity-75 group-hover:scale-125 lg:aspect-auto h-72">
                    <div
                        class="absolute inset-0 bg-gray-200 bg-opacity-70 rounded-t-lg grid place-content-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="flex space-x-3 items-center">
                            <button
                                class="w-12 h-12 rounded-full border border-green-500 text-green-500 bg-white grid place-content-center hover:text-white hover:bg-green-700 transition-colors red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen">
                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path
                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                </svg>
                            </button>
                            <button
                                class="w-12 mt-2 h-12 rounded-full border border-red-500 text-red-500 bg-white grid place-content-center hover:text-white hover:bg-red-700 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eraser">
                                    <path
                                        d="m7 21-4.3-4.3c-1-1-1-2.5 0-3.4l9.6-9.6c1-1 2.5-1 3.4 0l5.6 5.6c1 1 1 2.5 0 3.4L13 21" />
                                    <path d="M22 21H7" />
                                    <path d="m5 11 9 9" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        @empty
            <div class="flex justify-center items-center text-gray-500 text-2xl">No announcements found.</div>
        @endforelse
    </div>

</div>
