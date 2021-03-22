<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl ">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-t-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-black">Your Dashboard</div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 sm:rounded-b-lg">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-black">Your Cohorts:</h2>
                        <a class="px-4 py-2 bg-purple-600 rounded-lg text-gray-50" href="/createcohort">Create Cohort</a>
                    </div>
                    <h3 class="text-xl font-black text-gray-600">{{ (Auth::user()->cohorts->first() ? Auth::user()->cohorts->first()->name : '')}}</h3>
                    @foreach(Auth::user()->cohorts as $key => $cohort)
                        <livewire:view-cohort-members cohort="{{$cohort['id']}}"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
