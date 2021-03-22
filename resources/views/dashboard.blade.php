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
                        <a class="px-4 py-2 bg-purple-600 rounded-lg text-gray-50" href="{{ route('createcohort') }}">Create Cohort</a>
                    </div>
                    @foreach(Auth::user()->cohorts as $key => $cohort)
                        <a href="{{ url('/' . $cohort->slug . '/latestsummary') }}">
                            <h3 class="my-4 text-xl font-black text-gray-600">{{$cohort->display_name}}</h3>
                        </a>
                        <livewire:view-cohort-members :cohort="$cohort"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
