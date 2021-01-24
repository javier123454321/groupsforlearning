<form wire:submit.prevent="save">
    <textarea wire:model="weekly_summary.last_goal"></textarea>
    <textarea wire:model="weekly_summary.last_achievement"></textarea>
    <textarea wire:model="weekly_summary.this_goal"></textarea>
    <button type="submit">Save</button>
</form>
