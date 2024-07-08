@extends('layouts.admin-master')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header">
            <h2>Thêm Đánh Giá Combo Mới</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.danh-gia-combo.xu-ly-them-moi') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="khach_hang_id" class="form-label">Khách Hàng</label>
                    <select class="form-control" name="khach_hang_id">
                        @foreach ($dskhachHang as $khachHang)
                            <option value="{{ $khachHang->id }}">{{ $khachHang->ten_dang_nhap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="combo_id" class="form-label">Combo</label>
                    <select class="form-control" name="combo_id">
                        @foreach ($combos as $combo)
                            <option value="{{ $combo->id }}">{{ $combo->ten_combo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="danh_gia" class="form-label">Đánh Giá</label>
                    <input type="number" class="form-control" name="danh_gia" min="1" max="5" value="{{ old('danh_gia') }}">
                </div>
                <div class="mb-3">
                    <label for="noi_dung" class="form-label">Nội Dung</label>
                    <textarea class="form-control" name="noi_dung" rows="3">{{ old('noi_dung') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Thêm Đánh Giá</button>
            </form>
        </div>
    </div>
</div>
@endsection