<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-t-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-black">Your Dashboard</div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 sm:rounded-b-lg">
                    <h2 class="text-2xl font-black">Your Cohort:</h2>
                    <h3 class="text-xl font-black text-gray-600">{{ (Auth::user()->cohorts->first() ? Auth::user()->cohorts->first()->name : '')}}</h3>
                    @foreach(Auth::user()->cohorts as $key => $cohort)
                        <livewire:view-cohort-members cohort="{{$cohort['id']}}"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
