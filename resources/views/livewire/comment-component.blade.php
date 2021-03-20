<div>
    <div class="p-4 mt-4 text-left rounded-lg bg-purple-50" x-data="{editing: false, body: '{{$comment['body']}}'}" >
        <p>{{$comment['body']}}</p>
        <div class="text-sm text-gray-800 font-extralight">
            By: {{isset($comment['user']['name']) ? $comment['user']['name'] : 'unknown'}}
            @if($comment['user'] == Auth::user())
                <button x-on:click="editing = true" class="w-6 h-6 ml-4 text-sm leading-7 text-purple-800 text-opacity-75 cursor-pointer hover:text-opacity-100">
                    edit
                </button>
            @endif
        </div>
    </div>
</div>
