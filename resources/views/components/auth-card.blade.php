<div class="flex flex-col items-center min-h-screen pt-6 bg-gradient-to-br from-blue-100 to-purple-300 sm:justify-center sm:pt-0">
    <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
        {{$logo}}
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
