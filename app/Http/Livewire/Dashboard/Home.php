<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use App\Models\Direktorat;
use App\Models\Departement;
use App\Models\Edu;
use App\Models\WorkLocation;
use App\Models\StatusEmployee;
use Illuminate\Support\Facades\DB;

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
    //untuk grafik

    // public $grafik_direktorat = [];
    // public $grafik_statusEmployee = [];
    // public $grafik_age = [];
    // public $grafik_lenght_work = [];
    // public $grafik_edus = [];


    public function render()
    {
        $employees = DB::select("select (SELECT count(id) FROM users WHERE deleted_at is null) as total_karyawan, (SELECT count(id) FROM users WHERE status_employee_id = 2) as kartap,(SELECT count(id) FROM users WHERE status_employee_id = 1) as telkom, (SELECT count(id) FROM users WHERE status_employee_id in (3,4)) as kontrak from users group by total_karyawan, kartap, telkom, kontrak ");

        $directorats = Direktorat::get();
        $divisions = Division::get();
        $departements = Departement::get();
        $units = Unit::get();
        $locations = WorkLocation::get();
        $status_employee = StatusEmployee::get();
        $ages = DB::select("SELECT (SELECT count(id) FROM users WHERE TIMESTAMPDIFF(YEAR,`date_of_birth`,NOW()) < 30) as under_30, (SELECT count(id) FROM users WHERE TIMESTAMPDIFF(YEAR,`date_of_birth`,NOW()) BETWEEN 30 AND 40) as between_30_40, (SELECT count(id) FROM users WHERE TIMESTAMPDIFF(YEAR,`date_of_birth`,NOW()) > 40) as more_than_40 FROM users group by under_30, between_30_40, more_than_40");

        $query = "SELECT (SELECT count(id) FROM users WHERE TIMESTAMPDIFF(YEAR,`date_in`,NOW()) < 5) as under_5, (SELECT count(id) FROM users WHERE TIMESTAMPDIFF(YEAR,`date_in`,NOW()) BETWEEN 6 AND 10) as between_6_10, (SELECT count(id) FROM users WHERE TIMESTAMPDIFF(YEAR,`date_in`,NOW()) BETWEEN 11 AND 15) as between_11_15, (SELECT count(id) FROM users WHERE TIMESTAMPDIFF(YEAR,`date_in`,NOW()) > 15) as more_than_15 FROM users group by under_5, between_6_10, between_11_15, more_than_15";

        $edus = Edu::get();

        $lama_kerja = DB::select($query);

        $jakarta = $locations[0]->users->count();
        $solo = $locations[1]->users->count();
        $klaten = $locations[2]->users->count();

        $grafik_work = array(
            "JAKARTA" => $jakarta,
            "SOLO" => $solo,
            "KLATEN" => $klaten,

        );

        $grafik_direktorat = array(
            "BUSINESS SUPPORT" => $directorats[0]->users->count(),
            "CORPORATE" => $directorats[1]->users->count(),
            "MARKETING & BUSINESS" => $directorats[2]->users->count(),
            "OPERATION" => $directorats[3]->users->count()
        );
        // [

        //     ["BUSINESS SUPPORT" => $directorats[0]->users->count()],
        //     ["CORPORATE" => $directorats[1]->users->count()],
        //     ["MARKETING & BUSINESS" => $directorats[2]->users->count()],
        //     ["OPERATION" => $directorats[3]->users->count()]

        // ];

        $grafik_statusEmployee = array(
            "TELKOM SUPPORT" => $directorats[0]->users->count(),
            "KARTAP" => $directorats[1]->users->count(),
            "PKWT ADMEDIKA" => $directorats[2]->users->count(),
            "OUTSOURCE" => $directorats[3]->users->count()
        );

        // $grafik_statusEmployee =
        //     [
        //         ["TELKOM" => $status_employee[0]->users->count()],
        //         ["KARTAP" => $status_employee[1]->users->count()],
        //         ["PKWT ADMEDIKA" => $status_employee[2]->users->count()],
        //         ["OUTSOURCE" => $status_employee[3]->users->count()]

        //     ];

        // $grafik_age =
        //     [
        //         ["< 30 Years" => $ages[0]->under_30],
        //         ["30 - 40 Years" => $ages[0]->between_30_40],
        //         ["> 40 Years" => $ages[0]->more_than_40]

        //     ];

        $grafik_age = array(
            "< 30 Years" => $ages[0]->under_30,
            "30 - 40 Years" => $ages[0]->between_30_40,
            "> 40 Years" => $ages[0]->more_than_40,
        );

        // $grafik_lenght_work =
        //     [
        //         ["< 5 Years" => $lama_kerja[0]->under_5],
        //         ["6 - 10 Years" => $lama_kerja[0]->between_6_10],
        //         ["11 - 15 Years" => $lama_kerja[0]->between_11_15],
        //         ["> 15 Years" => $lama_kerja[0]->more_than_15]

        //     ];

        $grafik_lenght_work = array(
            "< 5 Years" => $lama_kerja[0]->under_5,
            "6 - 10 Years" => $lama_kerja[0]->between_6_10,
            "11 - 15 Years" => $lama_kerja[0]->between_11_15,
            "> 15 Years" => $lama_kerja[0]->more_than_15
        );

        $grafik_edus = array(
            "S2" => $edus[1]->users->count(),
            "S1" => $edus[2]->users->count() + $edus[10]->users->count(),
            "D1 - D4" => $edus[3]->users->count() + $edus[4]->users->count() + $edus[5]->users->count() + $edus[8]->users->count() + $edus[9]->users->count(),
            "SMA / SMU" => $edus[6]->users->count() + $edus[7]->users->count()
        );


        // $grafik_edus =
        //     [
        //         ["S2" => $edus[1]->users->count()],
        //         ["S1" => $edus[2]->users->count() + $edus[10]->users->count()],
        //         ["D1 - D4" => $edus[3]->users->count() + $edus[4]->users->count() + $edus[5]->users->count() + $edus[8]->users->count() + $edus[9]->users->count()],
        //         ["S1" => $edus[6]->users->count() + $edus[7]->users->count()]

        //     ];


        $this->totalKaryawan = $employees[0]->total_karyawan;
        $this->karyawanTelkom = $employees[0]->telkom;
        $this->karyawanTetap = $employees[0]->kartap;
        $this->karyawanKontrak = $employees[0]->kontrak;
        $this->directorat = $directorats->count();
        $this->division = $divisions->count();
        $this->departement = $departements->count();
        $this->unit = $units->count();

        //Grafik
        // $this->$grafik_work = $grafik_work;
        // $this->$grafik_direktorat = $grafik_direktorat;
        // $this->$grafik_statusEmployee = $grafik_statusEmployee;
        // $this->$grafik_age = $grafik_age;


        return view('livewire.dashboard.home', compact('grafik_work', 'grafik_direktorat', 'grafik_statusEmployee', 'grafik_age', 'grafik_lenght_work', 'grafik_edus'));
    }
}
