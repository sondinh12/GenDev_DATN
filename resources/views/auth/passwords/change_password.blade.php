@extends('client.layout.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="my-2">Đổi mật khẩu</h4>
                </div>
                <div class="card-body p-4">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('profile.change_password.update') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label fw-bold">Mật khẩu hiện tại</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Mật khẩu mới</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">Xác nhận mật khẩu mới</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="d-grid text-center">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill ">
                                <i class="fa fa-lock me-2"></i> Đổi mật khẩu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection