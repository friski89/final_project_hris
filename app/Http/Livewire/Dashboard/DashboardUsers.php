<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\CompanyHome;
use Livewire\Component;
use App\Models\JobTitle;
use App\Models\Direktorat;
use App\Models\StatusEmployee;
use App\Models\WorkLocation;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class DashboardUsers extends Component
{
    public $direktorats = ['BUSINESS SUPPORT', 'CORPORATE', 'MARKETING & BUSINESS', 'OPERATION'];
    public $jobTitle = ['DIREKTUR', 'EGM', 'GM', 'SM', 'MANAGER', 'ASMAN', 'SPV', 'JSPV', 'STAFF'];
    public $statusEmployee = ['KARYAWAN TELKOM', 'KARYAWAN TETAP', 'KONTRAK (PKWT)', 'OUTSOURCING'];
    public $companyHome = ['PT. ADMINISTRASI MEDIKA', 'ISH', 'MEDIA PRIMA'];
    public $workLocation = ['JAKARTA', 'SOLO', 'KLATEN'];
    public $colors = [
        'BUSINESS SUPPORT' => '#f6ad55',
        'CORPORATE' => '#fc8181',
        'MARKETING & BUSINESS' => '#90cdf4',
        'OPERATION' => '#66DA26',
    ];
    public $jobColors = [
        'DIREKTUR' => '#0029FF',
        'GM' => '#F400FF',
        'EGM' => '#8195FD',
        'SM' => '#7D00F1',
        'MANAGER' => '#FF21B1',
        'ASMAN' => '#20FFDC',
        'SPV' => '#08EC34',
        'JSPV' => '#FF1E33',
        'STAFF' => '#33A834'
    ];
    public $statusColors = [
        'KARYAWAN TELKOM' => '#f6ad55',
        'KARYAWAN TETAP' => '#fc8181',
        'KONTRAK (PKWT)' => '#8195FD',
        'OUTSOURCING' => '#7D00F1'
    ];
    public $companyColors = [
        'PT. ADMINISTRASI MEDIKA' => '#0029FF',
        'ISH' => '#F400FF',
        'MEDIA PRIMA' => '#fc8181'
    ];
    public $locationColors = [
        'JAKARTA' => '#0029FF',
        'SOLO' => '#F400FF',
        'KLATEN' => '#fc8181'
    ];
    public $firstRun = true;
    protected $listeners = [
        'onDirektoratClick' => 'handleOnDirektoratClick',
        'onJobClick' => 'handleOnJobClick',
        'onStatusClick' => 'handleOnStatusClick',
        'onCompanyClick' => 'handleOnCompanyClick',
        'onLocationClick' => 'handleOnLocationClick',
    ];
    public function handleOnDirektoratClick($slice)
    {
        $this->direktorats = [$slice['title']];
    }
    public function handleOnJobClick($slice)
    {
        $this->jobTitle = [$slice['title']];
    }
    public function handleOnStatusClick($slice)
    {
        $this->statusEmployee = [$slice['title']];
    }
    public function handleOnCompanyClick($slice)
    {
        $this->companyHome = [$slice['title']];
    }
    public function handleOnLocationClick($slice)
    {
        $this->workLocation = [$slice['title']];
    }

    public function render()
    {
        $employee = DB::table('users')
            ->join('direktorats', 'users.direktorat_id', '=', 'direktorats.id')
            ->join('job_titles', 'users.job_title_id', '=', 'job_titles.id')
            ->join('status_employees', 'users.status_employee_id', '=', 'status_employees.id')
            ->join('company_homes', 'users.company_home_id', '=', 'company_homes.id')
            ->join('work_locations', 'users.work_location_id', '=', 'work_locations.id')
            ->select('users.id as users_id', 'users.name as users_name', 'direktorats.name as direktorat_name', 'direktorats.id as direktorat_id', 'job_titles.name as job_title_name', 'status_employees.name as status_employee_name', 'company_homes.name as company_home_name', 'work_locations.name as work_location_name')
            ->whereIn('direktorats.name', $this->direktorats)
            ->whereIn('job_titles.name', $this->jobTitle)
            ->whereIn('status_employees.name', $this->statusEmployee)
            ->whereIn('company_homes.name', $this->companyHome)
            ->whereIn('work_locations.name', $this->workLocation)
            ->get();


        $dataDirektoratID = [];

        foreach ($employee as $item) {
            $xa = [];
            $xa = $item->direktorat_id;
            $yb[] = $xa;
        }
        $dataDirektoratID = $yb ?? [];

        $division = DB::table('divisions')->whereIn('direktorat_id', $dataDirektoratID)->get();

        $dataDivisionID = [];

        foreach ($division as $item) {
            $x = [];
            $x = $item->id;
            $yx[] = $x;
        }

        $dataDivisionID = $yx ?? [];


        $departement =  DB::table('departements')->whereIn('division_id', $dataDivisionID)->get();
        $dataDepartementID = [];

        foreach ($departement as $item) {
            $aa = [];
            $aa = $item->id;
            $ab[] = $aa;
        }

        $dataDepartementID = $ab ?? [];
        $unit = DB::table('units')->whereIn('departement_id', $dataDepartementID)->get();

        $dataDirektorat = Direktorat::get();
        $dataJobTitle = JobTitle::get();
        $dataStatusEmployee = StatusEmployee::get();
        $dataCompanyHome = CompanyHome::get();
        $dataWorkLocation = WorkLocation::get();

        $direktoratChartModel = $employee->groupBy('direktorat_name')
            ->reduce(
                function (PieChartModel $direktoratChartModel, $data) {
                    $type = $data->first()->direktorat_name;
                    $value = $data->count();
                    return $direktoratChartModel->addSlice($type, $value, $this->colors[$type]);
                },
                (new PieChartModel())
                    ->setTitle('Direktorat')
                    ->withDataLabels()
                    ->setAnimated($this->firstRun)
                    ->withOnSliceClickEvent('onDirektoratClick')
            );
        $jobChartModel = $employee->groupBy('job_title_name')
            ->reduce(
                function (PieChartModel $jobChartModel, $data) {
                    $type = $data->first()->job_title_name;
                    $value = $data->count();
                    return $jobChartModel->addSlice($type, $value, $this->jobColors[$type]);
                },
                (new PieChartModel())
                    ->setTitle('Job Title')
                    ->withDataLabels()
                    ->setAnimated($this->firstRun)
                    ->withOnSliceClickEvent('onJobClick')
            );
        $statusChartModel = $employee->groupBy('status_employee_name')
            ->reduce(
                function (PieChartModel $statusChartModel, $data) {
                    $type = $data->first()->status_employee_name;
                    $value = $data->count();
                    return $statusChartModel->addSlice($type, $value, $this->statusColors[$type]);
                },
                (new PieChartModel())
                    ->setTitle('Employee Status')
                    ->withDataLabels()
                    ->setAnimated($this->firstRun)
                    ->withOnSliceClickEvent('onStatusClick')
            );
        $companyChartModel = $employee->groupBy('company_home_name')
            ->reduce(
                function (PieChartModel $companyChartModel, $data) {
                    $type = $data->first()->company_home_name;
                    $value = $data->count();
                    return $companyChartModel->addSlice($type, $value, $this->companyColors[$type]);
                },
                (new PieChartModel())
                    ->setTitle('Employee Company')
                    ->withDataLabels()
                    ->setAnimated($this->firstRun)
                    ->withOnSliceClickEvent('onCompanyClick')
            );
        $locationChartModel = $employee->groupBy('work_location_name')
            ->reduce(
                function (PieChartModel $locationChartModel, $data) {
                    $type = $data->first()->work_location_name;
                    $value = $data->count();
                    return $locationChartModel->addSlice($type, $value, $this->locationColors[$type]);
                },
                (new PieChartModel())
                    ->setTitle('Employee Work Location')
                    ->withDataLabels()
                    ->setAnimated($this->firstRun)
                    ->withOnSliceClickEvent('onLocationClick')
            );
        $this->firstRun = false;
        return view('livewire.dashboard.dashboard-users', compact('employee', 'division', 'departement', 'unit', 'dataDirektorat', 'dataJobTitle', 'dataStatusEmployee', 'dataCompanyHome', 'dataWorkLocation', 'direktoratChartModel', 'jobChartModel', 'statusChartModel', 'companyChartModel', 'locationChartModel'));
    }
}
