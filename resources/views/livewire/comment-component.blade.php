<div x-on:commented="console.log('commented')">
<form wire:submit.prevent="save">
    <textarea class="w-full p-2 bg-gray-100 border-gray-400 rounded-lg" x-model="reply" placeholder="Reply..." wire:model="body"></textarea>
    <button class="w-24 px-4 py-2 bg-gray-200 rounded" x-on:click="showreply = false">Cancel</button>
    <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50" type="submit" {{ strlen($body) == 0 ? 'disabled':''}}>Send</button>
</form>
@foreach($allComments as $key => $postComment)
    <div class="p-4 mt-4 text-left rounded-lg bg-purple-50" wire:key="{{$key}}">
        <div class="">{{$postComment['body']}}</div>
        <div class="text-sm text-gray-800 font-extralight">By: {{isset($postComment['user']['name']) ? $postComment['user']['name'] : 'unknown'}}</div>
    </div>
@endforeach
</div>
