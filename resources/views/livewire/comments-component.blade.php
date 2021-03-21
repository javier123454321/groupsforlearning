<div x-on:commented.window="console.log('commented')">
    <form wire:submit.prevent="save">
        <textarea class="w-full p-2 bg-gray-100 border-gray-400 rounded-lg" x-model="reply" placeholder="Reply..."
            wire:model="body"></textarea>
        <button class="w-24 px-4 py-2 bg-gray-200 rounded" x-on:click="showreply = false">Cancel</button>
        <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50"
            type="submit" {{ strlen($body) == 0 ? 'disabled' : '' }}>Send</button>
    </form>
    <h3 class="text-left text-gray-600">Recent Comments</h3>
    @foreach ($allComments as $key => $postComment)
        <livewire:comment-component wire:key="time().$postComment->id" :comment="$postComment" />
    @endforeach
</div>
