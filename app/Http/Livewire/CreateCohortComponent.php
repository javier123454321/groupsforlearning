<?php

namespace App\Http\Livewire;

use App\Models\Cohort;
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
        if($cohort->save())
        {
            return redirect()->to("/" . $cohort["slug"] . "/week/1");
        } else {
            die();
        };
    }
}
