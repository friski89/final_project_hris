<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Departement;
use App\Models\Direktorat;
use App\Models\Division;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{

    public $totalKaryawan;
    public $karyawanTelkom;
    public $karyawanTetap;
    public $karyawanKontrak;
    public $directorat;
    public $division;
    public $departement;
    public $unit;

    public function render()
    {
        $employees = DB::select("select (SELECT count(id) FROM users WHERE deleted_at is null) as total_karyawan, (SELECT count(id) FROM users WHERE status_employee_id = 2) as kartap,(SELECT count(id) FROM users WHERE status_employee_id = 1) as telkom, (SELECT count(id) FROM users WHERE status_employee_id in (3,4)) as kontrak from users group by total_karyawan, kartap, telkom, kontrak ");

        $directorats = Direktorat::get();
        $divisions = Division::get();
        $departements = Departement::get();
        $units = Unit::get();

        $this->totalKaryawan = $employees[0]->total_karyawan;
        $this->karyawanTelkom = $employees[0]->telkom;
        $this->karyawanTetap = $employees[0]->kartap;
        $this->karyawanKontrak = $employees[0]->kontrak;
        $this->directorat = $directorats->count();
        $this->division = $divisions->count();
        $this->departement = $departements->count();
        $this->unit = $units->count();
        // $this->directorat = $directorats[0]->users->count();
        // $this->division = $divisions[0]->users->count();
        // $this->departement = $departements[0]->users->count();
        // $this->unit = $units[0]->users->count();

        return view('livewire.dashboard.home');
    }
}
