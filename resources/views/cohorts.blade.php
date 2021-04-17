<x-app-layout>
  <div>
    <h2 class="my-4 text-2xl font-black">Your Cohorts</h2>
    <livewire:show-cohorts-component :cohorts="$userCohorts"/>
    <h2 class="my-4 text-2xl font-black">Join A Cohort</h2>
    <livewire:show-cohorts-component :cohorts="$recommendedCohorts"/>
  </div>
</x-app-layout>
