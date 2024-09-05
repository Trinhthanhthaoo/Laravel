@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::check())
        <!-- Người dùng đã đăng nhập, hiển thị icon hình tròn -->
        <div class="icon">
            <img src="{{ asset('./avartar.png') }}" alt="User Icon">
        </div>
    @else
        <!-- Người dùng chưa đăng nhập, hiển thị nút bắt đầu -->
        <a href="{{ route('login') }}">Bắt đầu</a>
    @endif
</div>
@endsection
