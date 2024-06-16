<?php

namespace App\Http\Controllers\API;

use App\Helpers\RestPagination;
use App\Http\Controllers\Controller;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->paginateValidate();

        /**
         * @var Builder
         */
        $query = LienHe::query()->orderBy(LienHe::CREATED_AT, 'ASC');

        $keyword = $request->get('keyword');
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('TenDangNhap', 'like', "%{$keyword}%")
                    ->orWhere('Email', 'like', "%{$keyword}%")
                    ->orWhere('NoiDung', 'like', "%{$keyword}%");
            });
        }

        return RestPagination::parse(
            $query->paginate(
                $request->get('limit', 10),
                ['*'],
                'page',
                $request->get('page', 1)
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request): LienHe
    {
        $this->validatorCheck(
            Validator::make(
                $request->all(),
                [
                    'TenDangNhap' => 'required|string|unique:' . LienHe::query()->getQuery()->from . ',TenDangNhap',
                    'Email' => 'required|string|unique:' . LienHe::query()->getQuery()->from . ',Email',
                    'NoiDung' => 'required|string',
                ],
            )
        );


        $createdRecord = LienHe::create($request->all());

        return $createdRecord;
    }

    /**
     * Get LienHe by id.
     *
     * @param  int  $id
     */
    public function show($id): LienHe
    {
        return LienHe::where('id', $id)->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id): LienHe
    {
        $found = $this->show($id);

        $this->validatorCheck(
            Validator::make(
                $request->all(),
                [
                    'TenDangNhap' => 'nullable|string|unique:' . LienHe::query()->getQuery()->from . ',TenDangNhap,' . $found->id,
                    'Email' => 'nullable|string|unique:' . LienHe::query()->getQuery()->from . ',Email,' . $found->id,
                    'NoiDung' => 'nullable|string',
                ],
            )
        );

        if ($request->has('TenDangNhap')) {
            $found->TenDangNhap = $request->TenDangNhap;
        }

        if ($request->has('Email')) {
            $found->Email = $request->Email;
        }

        if ($request->has('NoiDung')) {
            $found->NoiDung = $request->NoiDung;
        }

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
