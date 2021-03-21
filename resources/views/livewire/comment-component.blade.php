<div>
    <div class="p-4 mt-2 text-left rounded-lg bg-purple-50"
        x-data="{editing: false, replying:false, body: '{{ $comment['body'] }}'}"
        x-on:comment-edited.window="editing = false">
        <p x-show.transition="!editing">{{ $comment['body'] }}</p>
        <div x-show.transition="editing">
            <textarea class="w-full px-2 bg-gray-100 border border-purple-300 rounded-lg"
                :value="'{{ $comment['body'] }}'" placeholder="Reply..." wire:model.defer="comment.body"></textarea>
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
                <button x-on:click="replying = !replying"
                    class="w-6 h-6 ml-4 text-sm leading-7 text-purple-800 text-opacity-75 cursor-pointer hover:text-opacity-100">
                    reply
                </button>
            </div>
            <div x-show.transition="editing">
                <button class="w-24 px-4 py-2 mr-2 bg-gray-200 rounded" x-on:click="editing = false">Cancel</button>
                <button
                    class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50"
                    wire:click="update()" type="submit">Save</button>
            </div>
        </div>
        <div x-show.transition="replying" x-on:replied-to-comment.window="replying = false">
            <textarea class="w-full px-2 mt-2 bg-gray-100 border border-purple-300 rounded-lg"
                placeholder="Reply..." wire:model.defer="reply"></textarea>
            <button class="w-24 px-4 py-2 mr-2 bg-gray-200 rounded" x-on:click="replying = false">Cancel</button>
            <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded disabled:opacity-50 disabled:text-gray-50"
                wire:click="reply()" type="submit">Save</button>
        </div>
        <div class="border-l-2">
            @if(count($children) > 0)
            @foreach ($children as $key => $child)
                <livewire:comment-component :comment="$child" :key="'comment-' . $child->id">
            @endforeach
            @endif
        </div>
    </div>
</div>
