@section('title', 'Reports')
<x-admin-layout>
    <div>
        <livewire:admin.report />
    </div>
    <x-slot name="sidebar">
        <livewire:sidebar />
        <script>
            function printOut(data) {
                var mywindow = window.open('', '', 'height=1000,width=1000');
                mywindow.document.head.innerHTML =
                    '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
                mywindow.document.body.innerHTML = '<div>' + data +
                    '</div><script src="{{ Vite::asset('resources/js/app.js') }}"/>';

                mywindow.document.close();
                mywindow.focus(); // necessary for IE >= 10
                setTimeout(() => {
                    mywindow.print();
                    return true;
                }, 1000);
            }
        </script>

    </x-slot>
</x-admin-layout>
