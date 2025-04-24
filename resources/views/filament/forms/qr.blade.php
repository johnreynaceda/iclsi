<div x-data>
    <div class="flex items-center justify-center">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $getRecord()->student_identification }}"
            class="h-40 w-40" alt="">
        <div class="hidden ">
            <div class="w-1/2" x-ref="printContainer">
                <div>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $getRecord()->student_identification }}"
                        class="h-8w-80 w-80" alt="">
                </div>
                <div class="text-left  text-xl font-semibold uppercase mt-2">
                    {{ $getRecord()->firstname . ' ' . $getRecord()->lastname }}
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 text-center">
        <x-button label="Print" outline slate squared class="font-semibold uppercase"
            @click="printOut($refs.printContainer.outerHTML);" />
    </div>
</div>
