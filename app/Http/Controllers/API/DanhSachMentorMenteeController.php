<?php

namespace App\Http\Controllers\API;
use App\Helpers\RestPagination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DanhSachMentorMentee;

class DanhSachMentorMenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DanhSachMentorMentee::query()->orderBy('created_at', 'ASC');

        $mentorId = $request->get('mentor_id');
        $menteeId = $request->get('mentee_id');
        if ($mentorId) {
            $query->where('IDMentor', $mentorId);
        }
        if ($menteeId) {
            $query->where('IDMentee', $menteeId);
        }

        return response()->json($query->paginate($request->get('limit', 10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'IDMentee' => 'required|integer|exists:Mentee,id',
                'IDMentor' => 'required|integer|exists:Mentor,id',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $danhSachMentorMentee = DanhSachMentorMentee::create($request->all());

        return response()->json($danhSachMentorMentee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $danhSachMentorMentee = DanhSachMentorMentee::findOrFail($id);
        return response()->json($danhSachMentorMentee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'IDMentee' => 'nullable|integer|exists:Mentee,id',
                'IDMentor' => 'nullable|integer|exists:Mentor,id',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $danhSachMentorMentee = DanhSachMentorMentee::findOrFail($id);
        $danhSachMentorMentee->update($request->all());

        return response()->json($danhSachMentorMentee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhSachMentorMentee = DanhSachMentorMentee::findOrFail($id);
        $danhSachMentorMentee->delete();

        return response()->json(null, 204);
    }
}
