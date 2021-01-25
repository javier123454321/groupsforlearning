<x-app-layout>
<section class="py-10">
    <h1 class="text-4xl font-black">Week {{$week}} Summary</h1>
    <livewire:show-weekly-summary cohort={{$cohort}} week="{{ $week }}"/>
</section>

</x-app-layout>
