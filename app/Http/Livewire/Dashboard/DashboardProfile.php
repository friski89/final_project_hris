<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardProfile extends Component
{
    public $linkID = "my profile";


    public function profileLink($linkID)
    {
        $this->linkID = $linkID;
    }

    public function my_team_mates()
    {
        $username = Auth::user()->username;

        $atasan = DB::table('leaders')
            ->select('nik_atasan1')
            ->where('nik', '=', $username)
            ->get();

        if ($atasan->first()->nik_atasan1 != null) {
            $data_team_mates = DB::table('leaders')
                ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name', 'users.name')
                ->leftJoin('users', 'leaders.nik', '=', 'users.username')
                ->leftJoin('units', 'users.unit_id', '=', 'units.id')
                ->where('leaders.nik_atasan1', '=', $atasan->first()->nik_atasan1)
                ->where('leaders.nik', '!=', $username)
                ->get();
        } else {
            $data_team_mates = [];
        }


        return $data_team_mates;
    }

    public function my_subordinates()
    {

        $username = Auth::user()->username;


        $data_sub_ordinates = DB::table('leaders')
            ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name', 'users.name')
            ->leftJoin('users', 'leaders.nik', '=', 'users.username')
            ->leftJoin('units', 'users.unit_id', '=', 'units.id')
            ->where('leaders.nik_atasan1', '=', $username)
            ->where('leaders.nik', '!=', $username)
            ->get();
        return $data_sub_ordinates;
    }

    public function my_leader()
    {
        $username = Auth::user()->username;


        // $data_leaders = DB::table('leaders')
        //     ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name')
        //     ->leftJoin('users', 'leaders.nik', '=', 'users.username')
        //     ->leftJoin('units', 'users.unit_id', '=', 'units.id')
        //     ->where('leaders.nik', '=', $username)
        //     ->get();

        $data_leaders = DB::select(DB::raw("select leaders.nik, leaders.atasan1, leaders.nik_atasan1, leaders.jabatan1, (select users.avatar from users where users.username = leaders.nik_atasan1) as avatar_atasan1, 
        leaders.atasan2, leaders.nik_atasan2, leaders.jabatan2, (select users.avatar from users where users.username = leaders.nik_atasan2) as avatar_atasan2, 
        leaders.atasan3, leaders.nik_atasan3, leaders.jabatan3, (select users.avatar from users where users.username = leaders.nik_atasan3) as avatar_atasan3, 
        users.avatar, users.jabatan, units.name as unit_name, users.name 
        from users 
        left join leaders on leaders.nik = users.username 
        left join units on units.id = users.unit_id 
        where leaders.nik = '$username'"));
        // $data_leaders = $data_leaders->toArray();
        return $data_leaders;
    }



    protected $listeners = ['profileLink' => '$refresh'];
    public function render()
    {
        $linkID = $this->linkID;
        $user = auth()->user();
        return view('livewire.dashboard.dashboard-profile', compact('linkID', 'user'));
    }
}
