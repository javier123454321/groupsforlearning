<?php

namespace App\Http\Livewire;

use App\Models\Cohort;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateCohortComponent extends Component
{
    public $displayName;
    public $course;
    public $courseUrl;
    protected $rules = [
        'displayName' => 'required|text',
        'course' => 'required|text',
    ];

    public function render()
    {
        return view('livewire.create-cohort-component');
    }
    public function save()
    {
        $cohort = new Cohort();
        $cohort["display_name"] = $this->displayName;
        $cohort["course"] = $this->course;
        $cohort["slug"] = str_replace(" ", "-", $this->displayName);
        if( Cohort::where("slug", $cohort["slug"])->count() > 0 )
        {
            $cohort["slug"] = $cohort["slug"] . "-" . time();
        };
        if($cohort->save())
        {
            $cohort->users()->attach(auth()->user()->id);
            return redirect()->to("/cohorts/" . $cohort["slug"] . "/week/1");
        } else {
            $this->addError('did-not-create', 'There was an error creating a cohort');;
        };
    }
}
