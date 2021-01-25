<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-black">Your Dashboard</div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-black">Your Cohort:</h2>
                    @foreach(Auth::user()->cohorts as $key => $cohort)
                        <livewire:view-cohort-members cohort="{{$cohort['id']}}"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
