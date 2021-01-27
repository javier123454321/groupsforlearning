<div>
<form wire:submit.prevent="save">
    <textarea class="w-full p-2 bg-gray-100 border-gray-400 rounded-lg" x-model="reply" placeholder="Reply..." wire:model="body"></textarea>
    <button class="w-24 px-4 py-2 bg-gray-200 rounded" x-on:click="showreply = false">Cancel</button>
    <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded"  type="submit">Send</button>
</form>
@foreach($allComments as $key => $postComment)
<div wire:key="{{$key.rand()}}">
    {{$postComment["body"]}}
</div>
@endforeach
</div>
