<div class="relative">
  @if(!$cohort->users->contains( auth()->user()->id ))
    <button>Join</button>
  @else
    <div class="bg-gray-300 p-2 rounded placeholder-blue-200 w-40 text-center">
      You are a member
    </div>
  @endif
</div>
