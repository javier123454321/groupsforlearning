<div>
    <div class="flex flex-wrap justify-between">
        @foreach($members as $member)
            <div class="flex flex-col items-center w-40">
                <div class="w-20 h-20 my-2 overflow-hidden rounded-full br-full">
                    <img src="{{$member['avatar'] ? $member['avatar'] : 'assets/profile-placeholder.jpg' }}">
                </div>
                {{$member['name']}}
            </div>
        @endforeach
    </div>
</div>
