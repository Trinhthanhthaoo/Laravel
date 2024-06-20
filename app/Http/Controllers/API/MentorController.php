<?php

namespace App\Http\Controllers\API;
use App\Helpers\RestPagination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Illuminate\Support\Facades\Validator;
class MentorController extends Controller
{
    public function index(Request $request) //search
    {
        $this->paginateValidate(); //phân trang

        $query = Mentor::query()->orderBy(Mentor::CREATED_AT, 'ASC');

        $keyword = $request->get('keyword');
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('ChuyenMon', 'like', "%{$keyword}%")
                    ->orWhere('ToChuc', 'like', "%{$keyword}%")
                    ->orWhere('Khoa', 'like', "%{$keyword}%")
                     ->orWhere('Nganh', 'like', "%{$keyword}%")
                      ->orWhere('Mon', 'like', "%{$keyword}%");
            });
        }

        return RestPagination::parse( // Phân trang kết quả truy vấn và trả về dạng JSON.
            $query->paginate(
                $request->get('limit', 10),
                ['*'],
                'page',
                $request->get('page', 1)
            )
        );
    }
    public function store(Request $request): Mentor  //create new table from request
    {
        $this->validatorCheck(
            Validator::make(
                $request->all(),
                [
                    'IDNguoiDung' => 'required|integer|exists:NguoiDung,id',
                    'ChuyenMon' => 'nullable|string',
                    'ToChuc' => 'nullable|string',
                    'BietVkuMentorQua' => 'nullable|string',
                    'CauHoiGopY' => 'nullable|string',
                    'ThanhTuu' => 'nullable|string',
                    'Khoa' => 'nullable|string',
                    'Nganh' => 'nullable|string',
                    'Mon' => 'nullable|string',
                ],
            )
        );
    
        $createdRecord = Mentor::create($request->all());
    
        return $createdRecord;
    }
    /**
     * Get Mentor by id.
     *
     * @param  int  $id
     */
    public function show($id): Mentor
    {
        return Mentor::where('id', $id)->firstOrFail();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id): Mentor
    {
        $found = $this->show($id);
    
        $this->validatorCheck(
            Validator::make(
                $request->all(),
                [
                    'IDNguoiDung' => 'nullable|integer|exists:NguoiDung,id',
                    'ChuyenMon' => 'nullable|string|unique:mentor,ChuyenMon,' . $found->id,
                    'ToChuc' => 'nullable|string|unique:mentor,ToChuc,' . $found->id,
                    'BietVkuMentorQua' => 'nullable|string|unique:mentor,BietVkuMentorQua,' . $found->id,
                    'CauHoiGopY' => 'nullable|string|unique:mentor,CauHoiGopY,' . $found->id,
                    'ThanhTuu' => 'nullable|string|unique:mentor,ThanhTuu,' . $found->id,
                    'Khoa' => 'nullable|string|unique:mentor,Khoa,' . $found->id,
                    'Nganh' => 'nullable|string|unique:mentor,Nganh,' . $found->id,
                    'Mon' => 'nullable|string|unique:mentor,Mon,' . $found->id,
                ],
            )
        );
    
        if ($request->has('IDNguoiDung')) {
            $found->IDNguoiDung = $request->IDNguoiDung;
        }
    
        if ($request->has('ChuyenMon')) {
            $found->ChuyenMon = $request->ChuyenMon;
        }
    
        if ($request->has('ToChuc')) {
            $found->ToChuc = $request->ToChuc;
        }
    
        if ($request->has('BietVkuMentorQua')) {
            $found->BietVkuMentorQua = $request->BietVkuMentorQua;
        }
    
        if ($request->has('CauHoiGopY')) {
            $found->CauHoiGopY = $request->CauHoiGopY;
        }
    
        if ($request->has('ThanhTuu')) {
            $found->ThanhTuu = $request->ThanhTuu;
        }
    
        if ($request->has('Khoa')) {
            $found->Khoa = $request->Khoa;
        }
    
        if ($request->has('Nganh')) {
            $found->Nganh = $request->Nganh;
        }
    
        if ($request->has('Mon')) {
            $found->Mon = $request->Mon;
        }
    // Lưu bản ghi nếu có thay đổi
        if ($found->isDirty()) {
            $found->save();
        }
    
        return $found;
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $found = $this->show($id);
        $found->delete();
    }
}
