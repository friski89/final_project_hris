<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbsentStoreRequest;
use App\Http\Requests\AbsentUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Absent;

use App\Http\Resources\AbsentCollection;
use App\Http\Resources\AbsentResource;

class AbsentController extends Controller
{
    //
    public function index(Request $request)
    {
        $this->authorize('view-any', AbsentController::class);

        $search = $request->get('search', '');

        $absent = Absent::search($search)
            ->latest()
            ->paginate();

        return new AbsentCollection($absent);
    }

    public function store(AbsentStoreRequest $request)
    {
        
        $this->authorize('create', AbsentController::class);

        

        if($request->type == "in") {
            $validated = $request->validated();
            $absent = Absent::create($validated);

            if($absent->id != "") {
                $response = [
                    'message' => 'Success Absent Check IN',
                    'success' => true,
                    'last_id' => $absent->id
                ];
            } else {
                $response = [
                    'message' => 'Absent failed Check IN',
                    'success' => false
                ];
            }
        } else {
            $ldate = date('Y-m-d');
            $absentRes = Absent::whereRaw("cast(date as date) = date '".$ldate."'")->get();

            if($absentRes == null || $absentRes == "") {
                $response = [
                    'message' => 'Absent failed, because your not check in first !',
                    'success' => false
                ];
            } else {
                // \DB::enableQueryLog();
                $absent = Absent::whereRaw("cast(date as date) = date '".$ldate."'")
                                ->where('user_id',$request->user_id)
                                ->update([
                                    'date' => date('Y-m-d H:i:s', strtotime($request->date)),
                                    'type' => $request->type,
                                    'meta' => $request->meta
                                ]);
                                // dd(\DB::getQueryLog());
                if($absent == true) {
                    $response = [
                        'message' => 'Success Absent Checkout',
                        'success' => true,
                    ];
                } else {
                    $response = [
                        'message' => 'Absent failed Checkout',
                        'success' => false
                    ];
                }
            }
        }

        
        
        
        return new AbsentResource($response);
    }

    public function show(Request $request, Absent $absent)
    {
        $this->authorize('view', $absent);

        return new AbsentResource($absent);
    }

    public function update(AbsentUpdateRequest $request, Absent $absent)
    {
        $this->authorize('update', $absent);

        $validated = $request->validated();

        $absent->date_out = $validated['date_out'];

        $result = $absent->save();

        // $result = $absent->update($validated);

        if($result === false) {
            $response = [
                'message' => 'Checkout Absent Failed',
                'success' => false
            ];
        } else {
            $response = [
                'message' => 'Checkout Absent Success',
                'success' => true
            ];
        }

        return new AbsentResource($response);
    }

    public function destory(Absent $absent)
    {
        $this->authorize('delete', $absent);

        $absent->delete();

        return response()->json(null, 204);
    }

    public function searchbydate(Request $request) {
        
        $request->validate([
            'date_to' => ['required', 'date'],
            'date_from' => ['required', 'date'],
            'user_id' => ['required', 'max:255']
        ]);

        $validated = $request->validated();

        
    }
}
