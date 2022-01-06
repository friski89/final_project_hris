<?php

namespace App\Http\Livewire\Hris\DataKedinasan;

use App\Models\User;
use Livewire\Component;
use App\Models\JobTitle;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use App\Models\BandPosition;
use App\Models\ServiceHistory;
use Illuminate\Support\Facades\Validator;

class CreateDataKedinasan extends Component
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
        $this->state['emoloyee_name'] = $data->name;
        $this->state['company_host_id'] = $data->company_host_id;
        $this->state['company_home_id'] = $data->company_home_id;
        $this->state['band_position_id'] = $data->band_position_id;
        $this->state['job_title_id'] = $data->job_title_id;
    }

    public function createForm()
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
        ServiceHistory::create($validatedData);

        session()->flash('success', 'created successfully!');
        return redirect()->route('service-histories.index');
    }
    public function render()
    {
        $companyHomes = CompanyHome::pluck('name', 'id');
        $companyHosts = CompanyHost::pluck('name', 'id');
        $bandPositions = BandPosition::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');

        return view('livewire.hris.data-kedinasan.create-data-kedinasan', compact(
            'companyHomes',
            'companyHosts',
            'bandPositions',
            'jobTitles'
        ));
    }
}
