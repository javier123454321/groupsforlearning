@foreach($summaries as $key => $summary)
        <div class="w-full px-8 py-4 my-4 bg-white rounded-lg shadow-lg" x-data="{showreply: false, reply: ''}">
            <h2 class="text-xl font-black">Last Week's Goals</h2>
            <p class="mb-4 text-lg text-gray-800" >
                {{$summary['last_goal']}}
            </p>
            <h2 class="text-xl font-black">Last Week's Achievements</h2>
            <p class="mb-4 text-lg text-gray-800">
                {{$summary['last_achievement']}}
            </p>
            <h2 class="text-xl font-black">This Week's Goals</h2>
            <p class="text-lg text-gray-800">
                {{$summary['this_goal']}}
            </p>
            <div class="flex items-center pt-6">
                <h4 class="text-gray-700 text-md">By: {{ $summary["user"]["name"] }}</h4>
                @if(Auth::user()->id == $summary["user"]["id"])
                <button x-on:click="" class="w-6 h-6 ml-4 text-sm leading-7 text-purple-800 text-opacity-75 cursor-pointer hover:text-opacity-100">
                    edit
                </button>
                @endif
                <button x-on:click="showreply = !showreply" class="w-6 h-6 ml-4 text-sm leading-7 text-purple-800 text-opacity-75 cursor-pointer hover:text-opacity-100">
                    reply
                </button>
            </div>

            <div x-show.transition="showreply" x-cloak class="mt-4 text-right">
                <textarea class="w-full p-2 bg-gray-100 border-gray-400 rounded-lg" x-model="reply" placeholder="Reply..."></textarea>
                <button class="w-24 px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button class="w-24 px-4 py-2 text-white bg-purple-700 rounded" wire:click='saveComment'>Send</button>
            </div>
        </div>
@endforeach
    {{-- <template x-for="summary in {{ $summaries }}">
    </template> --}}
</div>
