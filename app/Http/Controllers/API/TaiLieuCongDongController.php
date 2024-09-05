<?php

namespace App\Http\Controllers\API;
use App\Helpers\RestPagination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaiLieuCongDong;
use Illuminate\Support\Facades\Validator;
class TaiLieuCongDongController extends Controller
{
    public function index(Request $request)
    {
        $query = TaiLieuCongDong::query()->orderBy('NgayTao', 'DESC');

        $mentorId = $request->get('mentor_id');
        $menteeId = $request->get('mentee_id');
        //search
         $keyword = $request->get('keyword');
    $monHoc = $request->get('mon_hoc');
    //end search
        if ($mentorId) {
            $query->where('IDMentor', $mentorId);
        }

        if ($menteeId) {
            $query->where('IDMentee', $menteeId);
        }
        if ($keyword) {
        $query->where(function($query) use ($keyword) {
            $query->where('TieuDe', 'like', "%{$keyword}%")
                  ->orWhere('NoiDung', 'like', "%{$keyword}%");
        });
    }

    if ($monHoc) {
        $query->where('MonHoc', $monHoc);
    }
    if ($mentorId = $request->get('mentor_id')) {
        $query->where('IDMentor', $mentorId);
    }

    // Filter by Mentee ID
    if ($menteeId = $request->get('mentee_id')) {
        $query->where('IDMentee', $menteeId);
    }
        return $query->paginate($request->get('limit', 20));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'IDMentee' => 'required|integer|exists:mentees,id',
            'IDMentor' => 'required|integer|exists:mentors,id',
            'TieuDe' => 'required|string',
            'NoiDung' => 'required|string',
            'TrangThai' => 'required|in:pending,approved,rejected',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $taiLieuCongDong = TaiLieuCongDong::create($request->all());

        return response()->json($taiLieuCongDong, 201);
    }
 public function show($id)
    {
        return TaiLieuCongDong::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'IDMentee' => 'nullable|integer|exists:mentees,id',
            'IDMentor' => 'nullable|integer|exists:mentors,id',
            'TieuDe' => 'nullable|string',
            'NoiDung' => 'nullable|string',
            'TrangThai' => 'nullable|in:pending,approved,rejected',
        ]);
if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $taiLieuCongDong = TaiLieuCongDong::findOrFail($id);
        $taiLieuCongDong->update($request->all());

        return response()->json($taiLieuCongDong);
    }

    public function destroy($id)
    {
        $taiLieuCongDong = TaiLieuCongDong::findOrFail($id);
        $taiLieuCongDong->delete();

        return response()->json(null, 204);
    }
}
