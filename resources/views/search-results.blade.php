<x-app-layout>
    <h1 class="text-center my-8 mx-auto text-3xl font-black text-gray-900">
        Results for "{{$query}}"
    </h1>
    <livewire:show-cohorts-component :cohorts="$cohortResults"/>
</x-app-layout>