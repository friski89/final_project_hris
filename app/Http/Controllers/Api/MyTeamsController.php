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
            $data_team_mates = DB::table('leaders')
                                    ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name','users.name')
                                    ->leftJoin('users', 'leaders.nik' , '=', 'users.username')
                                    ->leftJoin('units', 'users.unit_id', '=', 'units.id')
                                    ->where('leaders.nik_atasan1', '=', $atasan->first()->nik_atasan1 )
                                    ->where('leaders.nik' , '!=', $username)
                                    ->get();
        } else {
            $data_team_mates = [];
        }
        
     
        return $data_team_mates;
    }

    public function my_subordinates() {

        $username = Auth::user()->username;

       
        $data_sub_ordinates = DB::table('leaders')
                                ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name', 'users.name')
                                ->leftJoin('users', 'leaders.nik' , '=', 'users.username')
                                ->leftJoin('units', 'users.unit_id', '=', 'units.id')
                                ->where('leaders.nik_atasan1', '=', $username )
                                ->where('leaders.nik' , '!=', $username)
                                ->get();
        return $data_sub_ordinates;   
    }

    public function my_leader() {
        $username = Auth::user()->username;

       
        $data_leaders = DB::table('leaders')
                            ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name')
                            ->leftJoin('users', 'leaders.nik' , '=', 'users.username')
                            ->leftJoin('units', 'users.unit_id', '=', 'units.id')
                            ->where('leaders.nik', '=', $username)
                            ->get();
        return $data_leaders;
        
    }
}
