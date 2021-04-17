<div class="grid grid-cols-4">
  @foreach($cohorts as $cohort)
   <div class="flex flex-col justify-between font-black p-4 rounded r-l bg-gray-100 min-w-24 mr-2 mb-4 shadow-lg"> 
    <p>
      {{$cohort->display_name}}
    </p>
    <span class="text-gray-600 text-sm font-normal">members: {{$cohort->users->count()}}</span>
   </div>
  @endforeach
</div>
