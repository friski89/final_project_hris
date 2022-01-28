<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Family;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        if (!auth()->attempt($request->only('username', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $data = [];
        $dataProfile = [];
        $listFams = [];
        $user = User::where('username',$request->username)->firstOrFail();
        $fams = Family::where('user_id',$user->id)->get();

        //list data utama
        $data['id'] = $user->id;
        $data['name'] = $user->name;
        $data['username'] = $user->username;
        $data['avatar'] = $user->avatar;
        $data['nik_telkom'] = $user->nik_telkom;
        $data['nik_company'] = $user->nik_company;
        $data['date_in'] = $user->date_in;
        $data['date_sk'] = $user->date_sk;
        $data['place_of_birth'] = $user->place_of_birth;
        $data['date_of_birth'] = $user->date_of_birth;
        $data['age'] = $user->age;
        $data['jabatan'] = $user->jabatan;
        $data['tanggal_kartap'] = $user->tanggal_kartap;
        $data['no_sk_kartap'] = $user->no_sk_kartap;
        $data['band_position'] = $user->BandPosition->name;
        $data['job_grade'] = $user->JobGrade->name;
        $data['job_family'] = $user->JobFamily->name;
        $data['job_function'] = $user->JobFunction->name;
        $data['city_recuite'] = $user->CityRecuite->name;
        $data['status_employee'] = $user->StatusEmployee->name;
        $data['company_home'] = $user->CompanyHome->name;
        $data['company_host'] = $user->CompanyHost->name;
        $data['sub_status'] = $user->SubStatus->name;
        $data['unit'] = $user->Unit->name;
        $data['departement'] = $user->Departement->name;
        $data['division'] = $user->Division->name;
        $data['work_location'] = $user->WorkLocation->name;
        $data['edu'] = $user->Edu->name;
        $data['direktorat'] = $user->Direktorat->name;
        $data['job_title'] = $user->JobTitle->name;
        $data['gender'] = $user->Profile->gender;
        $data['religion'] = $user->Profile->Religion->name;
        $data['email'] = $user->email;
        $data['phone_number'] = $user->Profile->phone_number;
        //end here

        //list data family
        foreach($fams as $family) {
            $dataFamily = [];
            $dataFamily['family_name'] = $family->family_name;
            $dataFamily['user_id'] = $family->user_id;
            $dataFamily['place_of_birth'] = $family->place_of_birth;
            $dataFamily['data_of_birth'] = $family->date_of_birth;
            $dataFamily['gender'] = $family->gender;
            $dataFamily['date_marital'] = $family->date_marital;
            $dataFamily['citizenship'] = $family->citizenship;
            $dataFamily['blood_group'] = $family->blood_group;
            $dataFamily['health_status'] = $family->health_status;
            $dataFamily['handphone_number'] = $family->handphone_number;
            $dataFamily['address'] = $family->address;
            $dataFamily['city'] = $family->city;
            $dataFamily['province'] = $family->province;
            $dataFamily['postal_code'] = $family->postal_code;
            $dataFamily['relationship'] = $family->relationship;
            $dataFamily['alive'] = $family->alive;
            $dataFamily['vaccine1'] = $family->vaccine1;
            $dataFamily['vaccine2'] = $family->vaccine2;
            $dataFamily['not_vaccine'] = $family->not_vaccine;
            $dataFamily['remarks_not_vaccine'] = $family->remarks_not_vaccine;
            $dataFamily['edu'] = isset($family->edu_id) ? $family->Edu->name : $family->edu_id;
            $dataFamily['urutan'] = $family->urutan;
            $listFams[] = $dataFamily;
        }
        

        $data['family'] = $listFams;

        //end here


        //list data profile 
        $dataProfile['id'] = $user->Profile->id;
        $dataProfile['religion'] = $user->Profile->Religion->name;
        $dataProfile['user_id'] = $user->Profile->user_id;
        $dataProfile['blood_group'] = $user->Profile->blood_group;
        $dataProfile['no_ktp'] = $user->Profile->no_ktp;
        $dataProfile['no_npwp'] = $user->Profile->no_npwp;
        $dataProfile['address_ktp'] = $user->Profile->address_ktp;
        $dataProfile['address_domisili'] = $user->Profile->address_domisili;
        $dataProfile['status_domisili'] = $user->Profile->status_domisili;
        $dataProfile['address_npwp'] = $user->Profile->address_npwp;
        $dataProfile['nama_ibu'] = $user->Profile->nama_ibu;
        $dataProfile['vaccine1'] = $user->Profile->vaccine1;
        $dataProfile['vaccine2'] = $user->Profile->vaccine2;
        $dataProfile['not_vaccine'] = $user->Profile->not_vaccine;
        $dataProfile['remarks_not_vaccine'] = $user->Profile->remarks_not_vaccine;
        $data['profile'] = $dataProfile;

        //end here
       
       
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'data' => $data,'access_token' => $token, 'token_type' => 'Bearer', 
        ]);
    }
}
