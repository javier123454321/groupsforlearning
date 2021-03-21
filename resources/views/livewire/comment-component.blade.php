<div>
    <div class="p-4 mt-2 text-left rounded-lg bg-purple-50" x-data="{editing: false, body: '{{ $comment['body'] }}'}" x-on:comment-edited.window="editing = false">
        <p x-show.transition="!editing">{{ $comment['body'] }}</p>
        <div x-show.transition="editing">
            <textarea class="w-full px-2 bg-gray-100 border border-purple-300 rounded-lg" :value="'{{$comment['body']}}'"
                placeholder="Reply..." wire:model.defer="comment.body"></textarea>
        </div>
        <div class="flex justify-between text-sm text-gray-800 font-extralight">
            <div>
            By: {{ isset($comment['user']['name']) ? $comment['user']['name'] : 'unknown' }}
            @if ($comment['user'] == Auth::user())
                <button x-on:click="editing = true" x-show.transition="!editing"
                    class="w-6 h-6 ml-4 text-sm leading-7 text-purple-800 text-opacity-75 cursor-pointer hover:text-opacity-100">
                    edit
                </button>
            @endif
            </div>
            <div x-show.transition="editing">
                <button class="w-24 px-4 py-2 mr-2 bg-gray-200 rounded" x-on:click="editing = false">Cancel</button>
                <button
                    class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50"
                    wire:click="update()"
                    type="submit">Save</button>
            </div>
        </div>
        <div class="border-l-2">
            @foreach ($children as $key => $child)
                <livewire:comment-component :comment="$child" :key="time().$child->id">
            @endforeach
        </div>
    </div>
</div>
