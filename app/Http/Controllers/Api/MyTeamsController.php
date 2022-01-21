<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
Use App\Models\Users;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyTeamsController extends Controller
{
    public function get_team(Request $request) {

        try {
            $band_position_id = Auth::user()->band_position_id;
            // dd(Auth::user()->leader); leader
            // dd(Auth::user()->leader->my_team_mates);
        

            return response()->json([
                'data' => [
                    'team_mates' => $this->my_team_mates(),
                    'sub_ordinates' => $this->my_subordinates(),
                    'leaders' => $this->my_leader()
                ]
            ]);
        } catch(Exception $ex) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
        
    }


    public function my_team_mates() {
        $username = Auth::user()->username;

        $atasan = DB::table('leaders')
                ->select('nik_atasan1')
                ->where('nik', '=', $username)
                ->get();

        if($atasan->first()->nik_atasan1 != null) {
            // DB::connection()->enableQueryLog();
            // $data_team_mates = DB::table('leaders')
            //                         ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name','users.name', 'users.username as nik_karyawan', 'users.id', 'band_positions.name as band_position_name','users.nik_telkom', 'direktorats.name as direktorat_name', 'job_functions.name as job_function_name', 'users.email', 'profiles.phone_number', 'users.email', 'departements.name as department_name', 'edus.name as edu_name', 'users.date_in', 'users.date_of_birth', 'status_employees.name as status_employee_name', 'company_homes.name as company_name')
            //                         ->leftJoin('users', 'leaders.nik' , '=', 'users.username')
            //                         ->leftJoin('units', 'users.unit_id', '=', 'units.id')
            //                         ->leftJoin('band_positions', 'users.band_position_id', '=', 'band_positions.id')
            //                         ->leftJoin('direktorats', 'users.direktorat_id', '=', 'direktorats.id')
            //                         ->leftJoin('job_functions', 'users.job_function_id', '=', 'job_functions.id')
            //                         ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            //                         ->leftJoin('departements', 'users.departement_id', '=', 'departements.id')
            //                         ->leftJoin('edus','users.edu_id', '=', 'edus.id')
            //                         ->leftJoin('status_employees', 'users.status_employee_id', '=', 'status_employees.id')
            //                         ->leftJoin('company_homes', 'users.company_home_id', '=', 'company_homes.id')
            //                         ->where('leaders.nik_atasan1', '=', $atasan->first()->nik_atasan1 )
            //                         ->where('leaders.nik' , '!=', $username)
            //                         ->get();
            // dd(DB::getQueryLog());
            $atasan1 = $atasan->first()->nik_atasan1;
            $data_team_mates = DB::select(DB::raw("select leaders.nik, leaders.atasan1, leaders.nik_atasan1, leaders.jabatan1, leaders.atasan2, leaders.nik_atasan2, leaders.jabatan2, leaders.atasan3, 
                                                    leaders.nik_atasan3, leaders.jabatan3, users.avatar, users.jabatan, units.name as unit_name, users.name, users.username as nik_karyawan, users.id, band_positions.name as band_position_name, 
                                                    users.nik_telkom, direktorats.name as direktorat_name, job_functions.name as job_function_name, users.email, profiles.phone_number, users.email, departements.name as department_name, 
                                                    edus.name as edu_name, users.date_in, users.date_of_birth, status_employees.name as status_employee_name, company_homes.name as company_name ,users.avatar,profiles.gender 
                                                    from leaders left join users on leaders.nik = users.username left join units on users.unit_id = units.id left join band_positions on users.band_position_id = band_positions.id 
                                                    left join direktorats on users.direktorat_id = direktorats.id 
                                                    left join job_functions on users.job_function_id = job_functions.id 
                                                    left join profiles on users.id = profiles.user_id 
                                                    left join departements on users.departement_id = departements.id 
                                                    left join edus on users.edu_id = edus.id 
                                                    left join status_employees on users.status_employee_id = status_employees.id 
                                                    left join company_homes on users.company_home_id = company_homes.id where leaders.nik_atasan1 = '$atasan1' and leaders.nik != '$username'"));
        } else {
            $data_team_mates = [];
        }
        
     
        return $data_team_mates;
    }

    public function my_subordinates() {

        $username = Auth::user()->username;

        // DB::connection()->enableQueryLog();
        // $data_sub_ordinates = DB::table('leaders')
        //                         ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name', 'users.name', 'users.username as nik_karyawan', 'users.id', 'band_positions.name as band_position_name','users.nik_telkom', 'direktorats.name as direktorat_name', 'job_functions.name as job_function_name', 'users.email', 'profiles.phone_number', 'users.email', 'departements.name as department_name', 'edus.name as edu_name', 'users.date_in', 'users.date_of_birth', 'status_employees.name as status_employee_name', 'company_homes.name as company_name')
        //                         ->leftJoin('users', 'leaders.nik' , '=', 'users.username')
        //                         ->leftJoin('units', 'users.unit_id', '=', 'units.id')
        //                         ->leftJoin('band_positions', 'users.band_position_id', '=', 'band_positions.id')
        //                         ->leftJoin('direktorats', 'users.direktorat_id', '=', 'direktorats.id')
        //                         ->leftJoin('job_functions', 'users.job_function_id', '=', 'job_functions.id')
        //                         ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
        //                         ->leftJoin('departements', 'users.departement_id', '=', 'departements.id')
        //                         ->leftJoin('edus','users.edu_id', '=', 'edus.id')
        //                         ->leftJoin('status_employees', 'users.status_employee_id', '=', 'status_employees.id')
        //                         ->leftJoin('company_homes', 'users.company_home_id', '=', 'company_homes.id')
        //                         ->where('leaders.nik_atasan1', '=', $username )
        //                         ->where('leaders.nik' , '!=', $username)
        //                         ->get();
        // dd(DB::getQueryLog());
        $data_sub_ordinates = DB::select(DB::raw("select leaders.nik, leaders.atasan1, leaders.nik_atasan1, leaders.jabatan1, leaders.atasan2, leaders.nik_atasan2, leaders.jabatan2, leaders.atasan3, 
        leaders.nik_atasan3, leaders.jabatan3, users.avatar, users.jabatan, units.name as unit_name, users.name, users.username as nik_karyawan, users.id, band_positions.name as band_position_name, 
        users.nik_telkom, direktorats.name as direktorat_name, job_functions.name as job_function_name, users.email, profiles.phone_number, users.email, departements.name as department_name, 
        edus.name as edu_name, users.date_in, users.date_of_birth, status_employees.name as status_employee_name, company_homes.name as company_name , users.avatar,profiles.gender 
        from leaders left join users on leaders.nik = users.username left join units on users.unit_id = units.id left join band_positions on users.band_position_id = band_positions.id 
        left join direktorats on users.direktorat_id = direktorats.id 
        left join job_functions on users.job_function_id = job_functions.id 
        left join profiles on users.id = profiles.user_id 
        left join departements on users.departement_id = departements.id 
        left join edus on users.edu_id = edus.id 
        left join status_employees on users.status_employee_id = status_employees.id 
        left join company_homes on users.company_home_id = company_homes.id where leaders.nik_atasan1 = '$username' and leaders.nik != '$username'"));
        return $data_sub_ordinates;   
    }

    public function my_leader() {
        $username = Auth::user()->username;

        // DB::connection()->enableQueryLog();
       
        // $data_leaders = DB::table('leaders')
        //                     ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name', 'users.username as nik_karyawan', 'users.id', 'band_positions.name as band_position_name','users.nik_telkom', 'direktorats.name as direktorat_name', 'job_functions.name as job_function_name', 'users.email', 'profiles.phone_number', 'users.email', 'departements.name as department_name', 'edus.name as edu_name', 'users.date_in', 'users.date_of_birth', 'status_employees.name as status_employee_name', 'company_homes.name as company_name')
        //                     ->leftJoin('users', 'leaders.nik' , '=', 'users.username')
        //                     ->leftJoin('units', 'users.unit_id', '=', 'units.id')
        //                     ->leftJoin('band_positions', 'users.band_position_id', '=', 'band_positions.id')
        //                     ->leftJoin('direktorats', 'users.direktorat_id', '=', 'direktorats.id')
        //                     ->leftJoin('job_functions', 'users.job_function_id', '=', 'job_functions.id')
        //                     ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
        //                     ->leftJoin('departements', 'users.departement_id', '=', 'departements.id')
        //                     ->leftJoin('edus','users.edu_id', '=', 'edus.id')
        //                     ->leftJoin('status_employees', 'users.status_employee_id', '=', 'status_employees.id')
        //                     ->leftJoin('company_homes', 'users.company_home_id', '=', 'company_homes.id')
        //                     ->where('leaders.nik', '=', $username)
        //                     ->get();

        // dd(DB::getQueryLog());
        $nikAtasan1 = DB::table('leaders')->where('nik', $username)->get('nik_atasan1');
        $myAtasan = $nikAtasan1[0]->nik_atasan1;
        // dd($nikAtasan1[0]->nik_atasan1);

        $data_leaders = DB::select(DB::raw("select leaders.nik, leaders.atasan1, leaders.nik_atasan1, leaders.jabatan1, leaders.atasan2, leaders.nik_atasan2, 
                                            leaders.jabatan2, leaders.atasan3, leaders.nik_atasan3, leaders.jabatan3, users.avatar, users.jabatan, 
                                            units.name as unit_name, users.username as nik_karyawan, users.id, band_positions.name as band_position_name, 
                                            users.nik_telkom, direktorats.name as direktorat_name, job_functions.name as job_function_name, users.email, 
                                            profiles.phone_number, users.email, departements.name as department_name, edus.name as edu_name, users.date_in, 
                                            users.date_of_birth, status_employees.name as status_employee_name, company_homes.name as company_name , profiles.gender ,
                                            users.avatar,
                                            (select users.avatar from users where users.username = leaders.nik_atasan1) as avatar_atasan1,
                                            (select users.avatar from users where users.username = leaders.nik_atasan2) as avatar_atasan2,
                                            (select users.avatar from users where users.username = leaders.nik_atasan3) as avatar_atasan3
                                            from leaders left join users on leaders.nik = users.username 
                                            left join units on users.unit_id = units.id 
                                            left join band_positions on users.band_position_id = band_positions.id 
                                            left join direktorats on users.direktorat_id = direktorats.id 
                                            left join job_functions on users.job_function_id = job_functions.id 
                                            left join profiles on users.id = profiles.user_id 
                                            left join departements on users.departement_id = departements.id 
                                            left join edus on users.edu_id = edus.id 
                                            left join status_employees on users.status_employee_id = status_employees.id 
                                            left join company_homes on users.company_home_id = company_homes.id where leaders.nik = '$myAtasan'"
                                            )
                                    );
        return $data_leaders;
        
    }
}
