<div>
  @if(!$cohort->users->contains( auth()->user()->id ))
    <button>Join</button>
  @else
    You are a member
  @endif

</div>
