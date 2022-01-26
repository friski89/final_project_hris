<?php

namespace App\Http\Livewire\Hris\DataRiwayatPendidikan;

use App\Models\EducationalBackground;
use Livewire\Component;
use App\Models\Edu;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CreateDataRiwayatPendidikan extends Component
{
    public $state = [];

    public function mount($nik)
    {
        $data = User::where('nik_company', $nik)->firstOrFail();
        $this->state['user_id'] = $data->id;
        $this->state['employee_name'] = $data->name;
        $this->state['emp_no'] = $nik;
    }


    public function createForm() {
        try {
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

     
            
            $created = EducationalBackground::create($validatedData);
            
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
        return view('livewire.hris.riwayat_pendidikan.create-data-riwayat-pendidikan', compact('edus'));
    }
}
