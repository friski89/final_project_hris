<?php

namespace App\Http\Livewire\Hris\DataRiwayatPendidikan;

use App\Models\EducationalBackground;
use Livewire\Component;
use App\Models\Edu;
use Illuminate\Support\Facades\Validator;

class UpdateDataRiwayatPendidikan extends Component
{
    public $state = [];

    public $educational_background;

    public function mount(EducationalBackground $educational_background) {
        $this->state = $educational_background->toArray();
        // dd($this->state);
        $this->educational_background = $educational_background;
    }

    public function updateForm() {
        try {
            $this->state['default'] = "-";
            $validatedData = Validator::make($this->state, [
                'emp_no' => 'required',
                'employee_name' => 'required',
                'institution_name' => 'required',
                'faculty' => 'required', 
                'major' => 'required',
                'graduate_date' => 'required',
                'cost_category' => 'required',
                'scholarship_institution' => 'nullable', 
                'gpa' => 'required',
                'gpa_scale' => 'required',
                'start_year' => 'required',
                'city' => 'required',
                'default' => 'nullable',
                'state' => 'required',
                'country' => 'required',
                'user_id' => ['required', 'exists:users,id'],
                'edu_id' => ['required', 'exists:edus,id'],
            ])->validate();

                
            $this->educational_background->update($this->state);
            
            session()->flash('success', 'created successfully!');
            return redirect()->route('home');
        } catch(QueryException $e) {
            dsession()->flash('error', $e->getMessage());
            return redirect()->route('home');
        }
    }

    public function render()
    {
        $edus = Edu::pluck('name', 'id');
        return view('livewire.hris.riwayat_pendidikan.update-data-riwayat-pendidikan',compact('edus'));
    }
}
