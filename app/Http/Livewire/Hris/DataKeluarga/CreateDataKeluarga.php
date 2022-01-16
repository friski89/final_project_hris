<?php

namespace App\Http\Livewire\Hris\DataKeluarga;

use App\Models\User;
use App\Models\Edu;
use App\Models\Family;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreateDataKeluarga extends Component
{
    public $state = [];
    public $emp_no;
    public $alive = false;
    public $isHealth = false;
    
    public function searchEmploye()
    {
        Validator::make($this->state, [
            'emp_no' => 'required'
        ])->validate();

        $nik = $this->state['emp_no'];

        $data = User::where('nik_company', $nik)->firstOrFail();
        $this->state['user_id'] = $data->id;
        $this->state['employee_name'] = $data->name;
    }

    public function createForm() {
        $this->state['alive'] === true ? 1 : 0;
        $this->state['health_status'] === true ? 1 : 0;
        
        if($this->state['relationship'] == "Suami") {
            $this->state['urutan'] = 0;
            $this->state['dependent_status'] = 0;
        } else if($this->state['relationship'] == "Istri") {
            $this->state['urutan'] = 1;
            $this->state['dependent_status'] = 1;
        } else if($this->state['relationship'] == "Anak") {
            $start_urutan;
            $data = Family::where(['emp_no' => $this->state['emp_no'], 'relationship' => 'Anak']);
            if($data->count() == 0) {
                $start_urutan = 2;
            } else {
                $start_urutan = $data->count() + 1;
            }
            $this->state['urutan'] = $start_urutan;

            $this->state['dependent_status'] = $start_urutan;
                            
        }


       
        // dd($this->state['urutan']);
        $validatedData = Validator::make($this->state, [
            'emp_no' => 'required',
            'user_id' => 'required',
            'employee_name' => 'required',
            'marital_status' => 'required',
            'no_kk' => 'nullable',
            'family_name' => 'required',
            'nik_id' => 'nullable',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'date_marital' => 'nullable',
            'citizenship' => 'required',
            'work' => 'nullable',
            'health_status' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'blood_rhesus' => 'nullable',
            'house_number' => 'nullable',
            'handphone_number' => 'required',
            'emergency_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'relationship' => 'required',
            'dependent_status' => 'nullable',
            'alive' => 'required',
            'urutan' => 'required',
            'edu_id' => 'nullable'
        ])->validate();
        // dd($validatedData);
        Family::create($validatedData);

        session()->flash('success', 'created successfully!');
        return redirect()->route('families.index');
    }

    public function render()
    {

        $edus = Edu::pluck('name', 'id');
        return view('livewire.hris.data-keluarga.create-data-keluarga', compact('edus'));
    }
}
