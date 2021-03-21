<x-app-layout>
    <section class="py-10">
        <h1 class="text-4xl font-black">{{ $cohortName }}</h1>
        <h2 class="text-2xl font-black text-gray-600"> Week {{ $week }} Summary </h2>
        <livewire:show-weekly-summary cohortslug={{$slug}} week="{{ $week }}" />
    </section>
</x-app-layout>
