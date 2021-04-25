<x-app-layout>
  <div>
    @auth
    <h2 class="my-4 text-2xl font-black">Your Cohorts</h2>
    <livewire:show-cohorts-component :cohorts="$userCohorts"/>
    @endauth
    <h2 class="my-4 text-2xl font-black">Not Yet Started Cohorts</h2>
    <livewire:show-cohorts-component :cohorts="$recommendedCohorts"/>

    <h2 class="my-4 text-2xl font-black">Ongoing</h2>
    <livewire:show-cohorts-component :cohorts="$ongoingCohorts"/>
  </div>
</x-app-layout>
