<x-app-layout>
  <div class="w-full px-8 py-4 my-4 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-black text-purple-900">
        {{$cohort->display_name}}
    </h1>

    <div class="mb-4">
      <livewire:view-cohort-members :cohort="$cohort" />
    </div>

    <div>
      <livewire:join-cohort-component :cohort="$cohort"/>
    </div>
  </div>
  
</x-app-layout>
