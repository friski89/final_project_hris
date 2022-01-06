<?php

namespace App\Http\Livewire\Hris\DataKedinasan;

use Livewire\Component;
use App\Models\JobTitle;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use App\Models\BandPosition;
use App\Models\ServiceHistory;
use Illuminate\Support\Facades\Validator;

class UpdateDataKedinasan extends Component
{
    public $state = [];

    public $serviceHistory;

    public function mount(ServiceHistory $serviceHistory)
    {
        $this->state = $serviceHistory->toArray();
        $this->serviceHistory = $serviceHistory;
    }

    public function updateForm()
    {
        $validatedData = Validator::make($this->state, [
            'emp_no' => 'required',
            'user_id' => 'required',
            'emoloyee_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'company_host_id' => 'required',
            'company_home_id' => 'required',
            'band_position_id' => 'required',
            'job_title_id' => 'required',
            'type' => 'required',
        ])->validate();

        $this->serviceHistory->update($this->state);

        session()->flash('success', 'update successfully!');
        return redirect()->route('service-histories.index');
    }


    public function render()
    {
        $companyHomes = CompanyHome::pluck('name', 'id');
        $companyHosts = CompanyHost::pluck('name', 'id');
        $bandPositions = BandPosition::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        return view('livewire.hris.data-kedinasan.update-data-kedinasan', compact(
            'companyHomes',
            'companyHosts',
            'bandPositions',
            'jobTitles'
        ));
    }
}
