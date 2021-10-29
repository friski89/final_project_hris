<?php

namespace App\Http\Livewire\Hris\RiwayatPrestasi;

use Livewire\Component;
use App\Models\AchievementHistory;
use Illuminate\Support\Facades\Validator;

class UpdateRiwayatPrestasi extends Component
{
    public $state = [];

    public $achievementHistory;

    public function mount(AchievementHistory $achievementHistory)
    {
        $this->state = $achievementHistory->toArray();
        $this->achievementHistory = $achievementHistory;
    }

    public function updateForm()
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

        $this->achievementHistory->update($this->state);

        session()->flash('success', 'update successfully!');
        return redirect()->route('achievement-histories.index');
    }
    public function render()
    {
        return view('livewire.hris.riwayat-prestasi.update-riwayat-prestasi');
    }
}
