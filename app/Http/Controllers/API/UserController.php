<?php

namespace App\Http\Controllers\API;

use App\Helpers\RestPagination;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $query = User::query()->orderBy(User::CREATED_AT, 'ASC');

        $keyword = $request->get('keyword');
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('TenDangNhap', 'like', "%{$keyword}%")
                    ->orWhere('Email', 'like', "%{$keyword}%");
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
    public function store(Request $request): User
    {
        $this->validatorCheck(
            Validator::make(
                $request->all(),
                [
                    'TenDangNhap' => 'string|unique:' . User::query()->getQuery()->from . ',TenDangNhap',
                    'Email' => 'string|email|unique:' . User::query()->getQuery()->from . ',Email',
                    'MatKhau' => 'required|string|min:6',
                ],
            )
        );

        $requestData = $request->all();
        $requestData['MatKhau'] = bcrypt($request->password);
        $createdRecord = User::create($requestData);

        return $createdRecord;
    }

    /**
     * Get User by id.
     *
     * @param  int  $id
     */
    public function show($id): User
    {
        return User::where('id', $id)->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id): User
    {
        $found = $this->show($id);

        $this->validatorCheck(
            Validator::make(
                $request->all(),
                [
                    'TenDangNhap' => 'nullable|string|unique:' . User::query()->getQuery()->from . ',TenDangNhap,' . $found->id,
                    'Email' => 'nullable|string|email|unique:' . User::query()->getQuery()->from . ',Email,' . $found->id,
                    'MatKhau' => 'nullable|string|min:6',
                ],
            )
        );

        if ($request->has('TenDangNhap')) {
            $found->name = $request->name;
        }

        if ($request->has('Email')) {
            $found->email = $request->email;
        }

        if ($request->has('MatKhau')) {
            $found->password = bcrypt($request->password);
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

    /**
     * Validate pagination parameters.
     */
  
}
