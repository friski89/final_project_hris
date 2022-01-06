<?php

namespace App\Http\Livewire\Hris\RiwayatPrestasi;

use App\Models\AchievementHistory;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreateRiwayatPrestasi extends Component
{
    public $state = [];
    public $emp_no;

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

    public function createForm()
    {
        $validatedData = Validator::make($this->state, [
            'emp_no' => 'required',
            'user_id' => 'required',
            'employee_name' => 'required',
            'award_name' => 'required',
            'date' => 'required',
            'institution' => 'required',
            'no_sk' => 'required',
            'office_name' => 'required',
            'position_name' => 'required',
            'remarks' => 'required',
        ])->validate();

        AchievementHistory::create($validatedData);

        session()->flash('success', 'created successfully!');
        return redirect()->route('achievement-histories.index');
    }
    public function render()
    {
        return view('livewire.hris.riwayat-prestasi.create-riwayat-prestasi');
    }
}
