<?php

namespace App\Http\Livewire\Hris\Employee;

use App\Models\Edu;
use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use App\Models\JobGrade;
use App\Models\JobTitle;
use App\Models\JobFamily;
use App\Models\SubStatus;
use App\Models\Direktorat;
use App\Models\CityRecuite;
use App\Models\CompanyHome;
use App\Models\CompanyHost;
use App\Models\Departement;
use App\Models\JobFunction;
use App\Models\BandPosition;
use App\Models\WorkLocation;
use Livewire\WithFileUploads;
use App\Models\StatusEmployee;
use Illuminate\Support\Facades\Validator;

class UpdateEmployee extends Component
{
    use WithFileUploads;
    public $state = [];
    public $user;
    public $avatar;

    public function mount(User $user)
    {
        $this->state = $user->toArray();
        $this->user = $user;
    }

    public function updateForm()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'nullable',
            'nik_telkom' => 'nullable|numeric|unique:users,nik_telkom,' . $this->user->id,
            'nik_company' => 'required|numeric|unique:users,nik_company,' . $this->user->id,
            'date_in' => 'required',
            'band_position_id' => 'required',
            'job_grade_id' => 'nullable',
            'job_family_id' => 'nullable',
            'job_function_id' => 'nullable',
            'city_recuite_id' => 'required',
            'status_employee_id' => 'required',
            'company_home_id' => 'required',
            'date_sk' => 'nullable',
            'company_host_id' => 'required',
            'sub_status_id' => 'nullable',
            'unit_id' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'work_location_id' => 'required',
            'age' => 'required',
            'job_title_id' => 'nullable',
            'edu_id' => 'required',
            'direktorat_id' => 'required',
            'departement_id' => 'required',
            'division_id' => 'required',
            'jabatan' => 'nullable',
            'tanggal_kartap' => 'nullable',
            'no_sk_kartap ' => 'nullable',
        ])->validate();

        if ($this->avatar) {
            $validatedData['avatar'] = $this->avatar->store('/', 'avatars');
        }

        $this->user->update($this->state);

        session()->flash('success', 'update successfully!');
        return redirect()->route('users.index');
    }
    public function render()
    {
        $bandPositions = BandPosition::pluck('name', 'id');
        $jobGrades = JobGrade::pluck('name', 'id');
        $jobFamilies = JobFamily::pluck('name', 'id');
        $jobFunctions = JobFunction::pluck('name', 'id');
        $jobTitles = JobTitle::pluck('name', 'id');
        $cityRecuites = CityRecuite::pluck('name', 'id');
        $statusEmployee = StatusEmployee::pluck('name', 'id');
        $subStatus = SubStatus::pluck('name', 'id');
        $companyHosts = CompanyHost::pluck('name', 'id');
        $companyHomes = CompanyHome::pluck('name', 'id');
        $direktorats = Direktorat::pluck('name', 'id');
        $workLocations = WorkLocation::pluck('name', 'id');
        $edus = Edu::pluck('name', 'id');

        if (!empty($this->state['direktorat_id'])) {
            $this->divisions = Division::where('direktorat_id', $this->state['direktorat_id'])->get();
        }
        if (!empty($this->state['division_id'])) {
            $this->departements = Departement::where('division_id', $this->state['division_id'])->get();
        }
        if (!empty($this->state['departement_id'])) {
            $this->units = Unit::where('departement_id', $this->state['departement_id'])->get();
        }

        return view('livewire.hris.employee.update-employee', compact('bandPositions', 'jobGrades', 'jobFamilies', 'jobFunctions', 'jobTitles', 'cityRecuites', 'statusEmployee', 'subStatus', 'companyHosts', 'companyHomes', 'direktorats', 'direktorats', 'workLocations', 'edus'));
    }
}
