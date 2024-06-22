<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class NguoiDungController extends Controller
{
    public function index()
    {
        $nguoiDungs = NguoiDung::all();
        return response()->json($nguoiDungs);
    }

    public function create()
    {
        return view('nguoiDungs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|unique:NguoiDung|max:50',
            'MatKhau' => 'required',
            'Email' => 'required|email|unique:NguoiDung|max:100',
        ]);

        $nguoiDung = new NguoiDung([
            'TenDangNhap' => $request->get('TenDangNhap'),
            'MatKhau' => $request->get('MatKhau'),
            'Email' => $request->get('Email'),
        ]);
        $nguoiDung->save();

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function show(NguoiDung $nguoiDung)
    {
        return response()->json($nguoiDung);
    }

    public function edit(NguoiDung $nguoiDung)
    {
        return view('nguoiDungs.edit', compact('nguoiDung'));
    }

    public function update(Request $request, NguoiDung $nguoiDung)
    {
        $request->validate([
            'TenDangNhap' => 'required|max:50|unique:NguoiDung,TenDangNhap,'.$nguoiDung->id,
            'MatKhau' => 'required',
            'Email' => 'required|email|max:100|unique:NguoiDung,Email,'.$nguoiDung->id,
        ]);

        $nguoiDung->TenDangNhap = $request->get('TenDangNhap');
        if ($request->get('MatKhau')) {
            $nguoiDung->MatKhau = bcrypt($request->get('MatKhau'));
        }
        $nguoiDung->Email = $request->get('Email');
        $nguoiDung->save();

        return response()->json(['message' => 'User updated successfully'], 200);
    }

    public function destroy(NguoiDung $nguoiDung)
    {
        $nguoiDung->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

   public function login(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|string',
            'MatKhau' => 'required|string',
        ]);

        $count = DB::table("nguoidung")->where([
            ["TenDangNhap", $request["TenDangNhap"]],
            ["MatKhau", $request["MatKhau"]],
        ])->count();

        return response()->json($count == 1 ? true : false);

        //$credentials = $request->only('name', 'password');

        // if (Auth::attempt($credentials)) {
        //     // Authentication passed
        //     return response()->json(['message' => 'Đăng nhập thành công'], 200);
        // } else {
        //     return response()->json(['message' => 'Đăng nhập không thành công'], 200);
        //     // Authentication failed
        //     // throw ValidationException::withMessages([
        //     //     'message' => ['Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin.'],
        //     // ]);
        // }
    }

}
