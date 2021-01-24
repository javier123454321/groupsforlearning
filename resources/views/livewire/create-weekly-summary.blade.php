<form wire:submit.prevent="save">
    <h2 class="text-xl font-black">Last Week's Goals</h2>
    <textarea class="w-full text-gray-900 bg-gray-100 border border-gray-300 rounded b-2" wire:model="weekly_summary.last_goal"></textarea>
    <h2 class="text-xl font-black">Last Week's Achievements</h2>
    <textarea class="w-full text-gray-900 bg-gray-100 border border-gray-300 rounded b-2" wire:model="weekly_summary.last_achievement"></textarea>
    <h2 class="text-xl font-black">This Week's Goals</h2>
    <textarea class="w-full text-gray-900 bg-gray-100 border border-gray-300 rounded b-2" wire:model="weekly_summary.this_goal"></textarea>
    <div class="text-right">
        <button x-on:click.prevent="$dispatch('cancel-create-summary')" class="w-24 py-2 mr-4 text-gray-800 bg-gray-200 rounded">Cancel</button>
        <button class="w-24 py-2 text-white bg-purple-800 rounded" type="submit">Save</button>
    </div>
</form>
