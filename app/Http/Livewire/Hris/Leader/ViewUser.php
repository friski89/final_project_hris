<?php

namespace App\Http\Livewire\Hris\Leader;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ViewUser extends Component
{
    public $user;
    public $linkID = "my profile";


    public function mount($id)
    {
        $this->user = User::where('nik_company', $id)->first();
    }

    public function profileLink($linkID)
    {
        $this->linkID = $linkID;
    }

    public function my_team_mates()
    {
        $username = $this->user->nik_company;

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

        $username = $this->user->nik_company;


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
        $username = $this->user->nik_company;


        $data_leaders = DB::table('leaders')
            ->select('leaders.nik', 'leaders.atasan1', 'leaders.nik_atasan1', 'leaders.jabatan1', 'leaders.atasan2', 'leaders.nik_atasan2', 'leaders.jabatan2', 'leaders.atasan3', 'leaders.nik_atasan3', 'leaders.jabatan3', 'users.avatar', 'users.jabatan', 'units.name as unit_name')
            ->leftJoin('users', 'leaders.nik', '=', 'users.username')
            ->leftJoin('units', 'users.unit_id', '=', 'units.id')
            ->where('leaders.nik', '=', $username)
            ->get();
        return $data_leaders;
    }

    protected $listeners = ['profileLink' => '$refresh'];

    public function render()
    {
        $linkID = $this->linkID;
        $user = $this->user;
        return view('livewire.hris.leader.view-user', compact('linkID', 'user'));
    }
}
