<?php

namespace App\View\Components\profile;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class myProfile extends Component
{
  
    public $data_sub_ordinates;
    public $data_team_mates;
    public $data_leaders;

  

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar && Storage::disk('avatars')->exists($this->avatar)) {
            return Storage::disk('avatars')->url($this->avatar);
        }

        return asset('assets/images/dashboard/1.png');
    }

    public function my_team_mates() {
        $band_position = Auth::user()->band_position_id;
        $band_position = Auth::user()->band_position_id;
        $direktorat_id = Auth::user()->direktorat_id;
        $division_id = Auth::user()->division_id;
        $departement_id = Auth::user()->departement_id;
        $unit_id = Auth::user()->unit_id;

        if($band_position == 1 ) {
            $this->data_team_mates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->where('users.band_position_id', $band_position)
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->get();
        } else if($band_position == 2) {
            $this->data_team_mates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->where('users.band_position_id', $band_position)
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->where('users.division_id',$division_id)
                                        ->get();

        } else if($band_position == 3) {
            $this->data_team_mates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->where('users.band_position_id', $band_position)
                                        ->where('users.direktorat_id',$direktorat_id)
                                       ->where('users.division_id',$division_id)
                                        //->where('users.departement_id',$departement_id)
                                        ->get();

        } else if($band_position == 4) {
            $this->data_team_mates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->where('users.band_position_id', $band_position)
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->where('users.division_id',$division_id)
                                        ->get();
            // $this->data_team_mates = DB::table('users')
            //                             ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
            //                             ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
            //                             ->leftJoin('divisions', 'users.division_id','=','divisions.id')
            //                             ->leftJoin('departements', 'users.departement_id','=','departements.id')
            //                             ->lefTJoin('units', 'users.unit_id','=','units.id')
            //                             ->where('users.band_position_id', $band_position)
            //                             ->where('users.direktorat_id',$direktorat_id)
            //                             ->where('users.division_id',$division_id)
            //                             ->where('users.departement_id',$departement_id)
            //                             ->where('users.unit_id',$unit_id)
            //                             ->get();

            // if($this->data_team_mates->count() == 1 || $this->data_team_mates->count() == 0) {
            //     $this->data_team_mates = DB::table('users')
            //                             ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
            //                             ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
            //                             ->leftJoin('divisions', 'users.division_id','=','divisions.id')
            //                             ->leftJoin('departements', 'users.departement_id','=','departements.id')
            //                             ->lefTJoin('units', 'users.unit_id','=','units.id')
            //                             ->where('users.band_position_id', $band_position)
            //                             ->where('users.direktorat_id',$direktorat_id)
            //                             ->where('users.division_id',$division_id)
            //                             ->get();
            // }

        } else if($band_position >= 5) {
            $this->data_team_mates = DB::table('users')
                                        ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                        ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                        ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                        ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                        ->lefTJoin('units', 'users.unit_id','=','units.id')
                                        ->where('users.band_position_id', '>', '5')
                                        ->where('users.direktorat_id',$direktorat_id)
                                        ->where('users.division_id',$division_id)
                                        ->where('users.departement_id',$departement_id)
                                        ->where('users.unit_id',$unit_id)
                                        ->get();
        }
        // dd($this->data_sub_ordinates);
        return $this->data_team_mates;
        // dd($this->band_position);
    }

    public function my_subordinates() {

        $band_position = Auth::user()->band_position_id;
        $direktorat_id = Auth::user()->direktorat_id;
        $division_id = Auth::user()->division_id;
        $departement_id = Auth::user()->departement_id;
        $unit_id = Auth::user()->unit_id;

        if($band_position == 1 ) {

            $this->data_sub_ordinates = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 2)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->get();
        } else if($band_position == 2) {
            $this->data_sub_ordinates = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 3)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                            ->get();

        } else if($band_position == 3) {
            $this->data_sub_ordinates = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 4)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                            ->get();

        } else if($band_position == 4) {
            $this->data_sub_ordinates = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', '>=', 5)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                           // ->where('users.departement_id',$departement_id)
                                            ->get();
            // $this->data_sub_ordinates = DB::table('users')
            //                                 ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
            //                                 ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
            //                                 ->leftJoin('divisions', 'users.division_id','=','divisions.id')
            //                                 ->leftJoin('departements', 'users.departement_id','=','departements.id')
            //                                 ->lefTJoin('units', 'users.unit_id','=','units.id')
            //                                 ->where('users.band_position_id', '>=', 5)
            //                                 ->where('users.direktorat_id',$direktorat_id)
            //                                 ->where('users.division_id',$division_id)
            //                                 ->where('users.departement_id',$departement_id)
            //                                 ->where('users.unit_id',$unit_id)
            //                                 ->get();
            // if($this->data_sub_ordinates->count() == 0) {
            //     $this->data_sub_ordinates = DB::table('users')
            //                                 ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
            //                                 ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
            //                                 ->leftJoin('divisions', 'users.division_id','=','divisions.id')
            //                                 ->leftJoin('departements', 'users.departement_id','=','departements.id')
            //                                 ->lefTJoin('units', 'users.unit_id','=','units.id')
            //                                 ->where('users.band_position_id', '>=', 5)
            //                                 ->where('users.direktorat_id',$direktorat_id)
            //                                 ->where('users.division_id',$division_id)
            //                                 ->where('users.departement_id',$departement_id)
            //                                 ->get();
            // }
        } else if($band_position >= 5) {
            $this->data_sub_ordinates = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', '>=', 5)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                            ->where('users.departement_id',$departement_id)
                                            ->where('users.unit_id',$unit_id)
                                            ->get();
        }

        return $this->data_sub_ordinates;
    }

    public function my_leader() {

        $band_position = Auth::user()->band_position_id;
        $direktorat_id = Auth::user()->direktorat_id;
        $division_id = Auth::user()->division_id;
        $departement_id = Auth::user()->departement_id;
        $unit_id = Auth::user()->unit_id;

        
        if($band_position == 2) {
            $this->data_leaders = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 1)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->get();

        } else if($band_position == 3) {
            $this->data_leaders = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 2)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                            ->get();
        } else if($band_position == 4) {
            $this->data_leaders = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 3)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                            //->where('users.departement_id',$departement_id)
                                            ->get();

            if($this->data_leaders->count() == 0) {
                $this->data_leaders = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 2)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                            ->get();
            }
        } else if($band_position >= 5) {
            $this->data_leaders = DB::table('users')
                                            ->select('users.name as name', 'direktorats.name as direktorat_name', 'users.direktorat_id as direktorat_id', 'divisions.name as division_name', 'users.division_id as division_id' , 'departements.name as departemen_name', 'users.departement_id as department_id', 'units.name as unit_name', 'users.unit_id as unit_id', 'users.avatar as avatar')
                                            ->leftJoin('direktorats', 'users.direktorat_id','=','direktorats.id')
                                            ->leftJoin('divisions', 'users.division_id','=','divisions.id')
                                            ->leftJoin('departements', 'users.departement_id','=','departements.id')
                                            ->lefTJoin('units', 'users.unit_id','=','units.id')
                                            ->where('users.band_position_id', 4)
                                            ->where('users.direktorat_id',$direktorat_id)
                                            ->where('users.division_id',$division_id)
                                            ->where('users.departement_id',$departement_id)
                                            ->where('users.unit_id',$unit_id)
                                            ->get();
                                            // dd('test');
        }

        return $this->data_leaders;
    }

  
    public function render()
    {
        
        $my_teams = $this->my_team_mates();
        dd($my_teams);
        $sub_ordinates = $this->my_subordinates();
        $my_leaders = $this->my_leader();
        return view('components.profile.my-profile', compact('my_teams','sub_ordinates', 'my_leaders'));
    }
}
