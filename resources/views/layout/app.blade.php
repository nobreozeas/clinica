@include('layout.header')



@include('layout.topbar')

<div class="flex">
    @include('layout.sidebar')

    <div class="flex-col h-full w-full">
        <div class="main min-h-screen p-4 bg-gray-200">
            <div class="bg-white min-h-screen p-4 rounded-2xl shadow-md">
                @yield('content')
            </div>

        </div>

        @include('layout.footer')
    </div>
</div>
