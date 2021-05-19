<div class="flex items-center">
  <form wire:submit.prevent="search">
  <input 
    type="text" 
    wire:model.debounce="searchTerm"
    class="transition duration-300 rounded md:mr-4 focus:ring-4 focus:ring-purple-600 focus:ring-opacity-20 border border-gray-400">
  </form>
</div>
