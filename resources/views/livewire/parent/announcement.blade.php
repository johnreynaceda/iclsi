<div>
    <div class="grid 2xl:grid-cols-4 grid-cols-2 gap-5">
        @foreach ($announs as $item)
            <div class="border h-72 rounded-xl p-2 bg-gray-400 hover:scale-95 cursor-pointer">
                <img src="{{ Storage::url($item->image_path) }}" class="h-full w-full rounded-lg object-cover"
                    alt="">
            </div>
        @endforeach

    </div>
</div>
