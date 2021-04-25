<div class="grid grid-cols-4">
  @foreach($cohorts as $cohort)
    <a href="{{ route('cohort.page', ['cohort' => $cohort->slug]) }}"
       class="flex flex-col justify-between font-black p-4 rounded r-l bg-gray-100 min-w-24 mr-2 mb-4 shadow-lg"
    >
      {{$cohort->display_name}}
      <div>
        <span class="text-gray-600 text-sm font-normal">members: {{$cohort->users->count()}}</span>
        @if($cohort->users()->get()->contains(Auth()->user()->id))
          <p class="text-gray-600 text-sm font-normal">You are a member</p>
        @endif
        <div>
          @if($cohort->start_time)
            @if($cohort->start_time > Carbon\Carbon::now())
              Starts in {{Carbon\Carbon::now()->diff($cohort->start_time)->format('%H hours')}}
            @elseif($cohort->start_time <= Carbon\Carbon::now())
              Started {{Carbon\Carbon::parse($cohort->start_time)->diffForHumans()}}
            @endif
          @else
            No start date yet
          @endif
        </div>
      </div>
  </a>
  @endforeach
</div>
