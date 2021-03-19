<div x-on:commented="console.log('commented')">
<form wire:submit.prevent="save">
    <textarea class="w-full p-2 bg-gray-100 border-gray-400 rounded-lg" x-model="reply" placeholder="Reply..." wire:model="body"></textarea>
    <button class="w-24 px-4 py-2 bg-gray-200 rounded" x-on:click="showreply = false">Cancel</button>
    <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50" type="submit" {{ strlen($body) == 0 ? 'disabled':''}}>Send</button>
</form>
<h3 class="text-left text-gray-600">Recent Comments</h3>
@foreach($allComments as $key => $postComment)
    <div class="p-4 mt-4 text-left rounded-lg bg-purple-50" wire:key="{{$key}}" x-data="{editing: false}" >
        <div x-show="!editing">
        <p>{{$postComment['body']}}</p>
        <div class="text-sm text-gray-800 font-extralight">
            By: {{isset($postComment['user']['name']) ? $postComment['user']['name'] : 'unknown'}}
            @if($postComment['user'] == Auth::user())
                <button x-on:click="editing = true" class="w-6 h-6 ml-4 text-sm leading-7 text-purple-800 text-opacity-75 cursor-pointer hover:text-opacity-100">
                    edit
                </button>
            @endif
        </div>
        </div>
            <form x-show="editing">
                <textarea class="w-full p-2 bg-gray-100 border border-purple-300 rounded-lg" :value="'{{$postComment['body']}}'" placeholder="Reply..."></textarea>
                <button class="w-24 px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50" type="submit" {{ strlen($body) == 0 ? 'disabled':''}}>Send</button>
            </form>
    </div>
@endforeach
</div>
