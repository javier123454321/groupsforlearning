<div x-on:commented.window="console.log('commented')">
    <form wire:submit.prevent="save" x-data="{reply: ''}">
        <textarea class="w-full p-2 bg-gray-100 border-gray-400 rounded-lg" x-model="reply" placeholder="Reply..."
            wire:model.defer="body"></textarea>
        <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50"
            type="submit" x-bind:disabled="reply.length == 0">Send</button>
    </form>
    <h3 class="text-left text-gray-600">Recent Comments</h3>
    @foreach ($allComments as $key => $postComment)
        <livewire:comment-component :key="'comment-'.$postComment['id']" :comment="$postComment" />
    @endforeach
</div>
