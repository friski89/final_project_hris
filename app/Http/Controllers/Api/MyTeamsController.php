<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyTeamsController extends Controller
{
    public function get_team(Request $request) {

        try {
            $band_position_id = Auth::user()->band_position_id;
        

            return response()->json([
                'data' => [
                    'team_mates' => $this->my_team_mates(),
                    'sub_ordinates' => $band_position_id < 5 ? $this->my_subordinates() : [],
                    'leaders' => $band_position_id > 1 ? $this->my_leader() : []
                ]
            ]);
        } catch(Exception $ex) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
        
    }

    public function my_team_mates() {
        $band_position = Auth::user()->band_position_id;
        $direktorat_id = Auth::user()->direktorat_id;
        $division_id = Auth::user()->division_id;
        $departement_id = Auth::user()->departement_id;
        $unit_id = Auth::user()->unit_id;

        if($band_position == 1 ) {
            $data_team_mates = DB::table('users')
                                    ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                    ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                    ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                    ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                    ->lefTJoin('units', 'users.unit_id','=','units.id')
                                    ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                    ->where('users.band_position_id', $band_position)
                                    ->where('users.direktorat_id',$direktorat_id)
                                    ->get();
        } else if($band_position == 2) {
            $data_team_mates = DB::table('users')
                                    ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                    ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                    ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                    ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                    ->lefTJoin('units', 'users.unit_id','=','units.id')
                                    ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                    ->where('users.band_position_id', $band_position)
                                    ->where('users.direktorat_id',$direktorat_id)
                                    ->where('users.division_id',$division_id)
                                    ->get();

        } else if($band_position == 3) {
            $data_team_mates = DB::table('users')
                                    ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                    ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                    ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                    ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                    ->lefTJoin('units', 'users.unit_id','=','units.id')
                                    ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                    ->where('users.band_position_id', $band_position)
                                    ->where('users.direktorat_id',$direktorat_id)
                                    ->where('users.division_id',$division_id)
                                    ->get();

        } else if($band_position == 4) {
            $data_team_mates = DB::table('users')
                                    ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                    ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                    ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                    ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                    ->lefTJoin('units', 'users.unit_id','=','units.id')
                                    ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                    ->where('users.band_position_id', $band_position)
                                    ->where('users.direktorat_id',$direktorat_id)
                                    ->where('users.division_id',$division_id)
                                    ->get();

        } else if($band_position >= 5) {
            $data_team_mates = DB::table('users')
                                    ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                    ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                    ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                    ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                    ->lefTJoin('units', 'users.unit_id','=','units.id')
                                    ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                    ->where('users.band_position_id', '>', '5')
                                    ->where('users.direktorat_id',$direktorat_id)
                                    ->where('users.division_id',$division_id)
                                    ->where('users.departement_id',$departement_id)
                                    ->where('users.unit_id',$unit_id)
                                    ->get();
        }
     
        return $data_team_mates;
    }

    public function my_subordinates() {

        $band_position = Auth::user()->band_position_id;
        $direktorat_id = Auth::user()->direktorat_id;
        $division_id = Auth::user()->division_id;
        $departement_id = Auth::user()->departement_id;
        $unit_id = Auth::user()->unit_id;

        if($band_position == 1 ) {

            $data_sub_ordinates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                        ->where('users.band_position_id', 2)
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->get();
        } else if($band_position == 2) {
            $data_sub_ordinates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                        ->where('users.band_position_id', 3)
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->where('users.division_id',$division_id)
                                        ->get();

        } else if($band_position == 3) {
            $data_sub_ordinates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                        ->where('users.band_position_id', 4)
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->where('users.division_id',$division_id)
                                        ->get();

        } else if($band_position == 4) {
            $data_sub_ordinates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                        ->where('users.band_position_id', '>=', 5)
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->where('users.division_id',$division_id)
                                        ->where('users.unit_id',$unit_id)
                                        ->get();
        } else if($band_position >= 5) {
            $data_sub_ordinates = DB::table('users')
                                    ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                    ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                    ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                    ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                    ->lefTJoin('units', 'users.unit_id','=','units.id')
                                    ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                    ->where('users.band_position_id', '>=', 5)
                                    ->where('users.direktorat_id',$direktorat_id)
                                    ->where('users.division_id',$division_id)
                                    ->where('users.departement_id',$departement_id)
                                    ->where('users.unit_id',$unit_id)
                                    ->get();
        }

        return $data_sub_ordinates;
    }

    public function my_leader() {

        $band_position = Auth::user()->band_position_id;
        $direktorat_id = Auth::user()->direktorat_id;
        $division_id = Auth::user()->division_id;
        $departement_id = Auth::user()->departement_id;
        $unit_id = Auth::user()->unit_id;

        
        if($band_position == 2) {
            $data_leaders = DB::table('users')
                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                            ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                            ->where('users.band_position_id', 1)
                            ->where('users.direktorat_id',$direktorat_id)
                            ->get();

        } else if($band_position == 3) {
            $data_leaders = DB::table('users')
                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                            ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                            ->where('users.band_position_id', 2)
                            ->where('users.direktorat_id',$direktorat_id)
                            ->where('users.division_id',$division_id)
                            ->get();
        } else if($band_position == 4) {
            $data_leaders = DB::table('users')
                                ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                ->lefTJoin('units', 'users.unit_id','=','units.id')
                                ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                ->where('users.band_position_id', 3)
                                ->where('users.direktorat_id',$direktorat_id)
                                ->where('users.division_id',$division_id)
                                ->get();

            if($data_leaders->count() == 0) {
                $data_leaders = DB::table('users')
                                ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                ->lefTJoin('units', 'users.unit_id','=','units.id')
                                ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                ->where('users.band_position_id', 2)
                                ->where('users.direktorat_id',$direktorat_id)
                                ->where('users.division_id',$division_id)
                                ->get();
            }
        } else if($band_position >= 5) {
            $data_leaders = DB::table('users')
                                ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                                ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                ->lefTJoin('units', 'users.unit_id','=','units.id')
                                ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                                ->where('users.band_position_id', 4)
                                ->where('users.direktorat_id',$direktorat_id)
                                ->where('users.division_id',$division_id)
                                ->where('users.departement_id',$departement_id)
                                ->where('users.unit_id',$unit_id)
                                ->get();

            

            
            if($data_leaders->count() == 0) {
                $data_leaders = DB::table('users')
                    ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar', 'job_titles.name as job_title_name')
                    ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                    ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                    ->leftJoin('departements', 'users.departement_id','=','departements.id')
                    ->lefTJoin('units', 'users.unit_id','=','units.id')
                    ->leftJoin('job_titles', 'users.job_title_id', '=', 'job_titles.id')
                    ->where('users.band_position_id', 4)
                    ->where('users.direktorat_id',$direktorat_id)
                    ->where('users.division_id',$division_id)
                    ->where('users.departement_id',$departement_id)
                    ->get();
            }

            

        }

        return $data_leaders;
    }
}
