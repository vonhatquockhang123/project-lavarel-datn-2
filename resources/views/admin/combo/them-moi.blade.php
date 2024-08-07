@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">THÊM MỚI COMBO</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm Combo</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.combo.xu-ly-them-moi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputID" class="form-label">ID</label>
                                <input type="text" class="form-control @error('id') is-invalid @enderror" id="inputID" name="id" value="{{ old('id') }}">
                                @error('id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputTenCombo" class="form-label">Tên combo</label>
                                <input type="text" class="form-control @error('ten_combo') is-invalid @enderror" id="inputTenCombo" name="ten_combo" value="{{ old('ten_combo') }}">
                                @error('ten_combo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nha_xuat_ban_id">Nhà Xuất Bản</label>
                            <select class="form-control" id="nha_xuat_ban_id" name="nha_xuat_ban_id" required>
                                <option value="">Chọn nhà xuất bản</option>
                                @foreach($nhaXuatBans as $nhaXuatBan)
                                    <option value="{{ $nhaXuatBan->id }}">{{ $nhaXuatBan->ten_nha_xuat_ban }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputGia" class="form-label">Giá</label>
                                <input type="text" class="form-control @error('gia') is-invalid @enderror" id="inputGia" name="gia" value="{{ old('gia') }}">
                                @error('gia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputSoLuong" class="form-label">Số lượng</label>
                                <input type="text" class="form-control @error('so_luong') is-invalid @enderror" id="inputSoLuong" name="so_luong" value="{{ old('so_luong') }}">
                                @error('so_luong')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputHinhAnh" class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control @error('hinh_anh') is-invalid @enderror" id="inputHinhAnh" name="hinh_anh">
                                @error('hinh_anh')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputMoTa" class="form-label">Mô tả</label>
                                <input type="text" class="form-control @error('mo_ta') is-invalid @enderror" id="inputMoTa" name="mo_ta" value="{{ old('mo_ta') }}">
                                @error('mo_ta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </form>
                <!-- Thêm dòng báo lỗi tổng quát dưới form -->
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tenCombo = document.getElementById('inputTenCombo');
            const slug = document.getElementById('slug');

            tenCombo.addEventListener('input', function () {
                slug.value = slugify(tenCombo.value);
            });

            function slugify(text) {
                // Chuyển đổi các ký tự tiếng Việt có dấu thành không dấu
                const from = "áàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴĐ";
                const to   = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydAAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYD";
                const regex = new RegExp(from.split('').join('|'), 'g');

                text = text.replace(regex, function (c) {
                    return to.charAt(from.indexOf(c));
                });

                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // Thay thế khoảng trắng bằng dấu gạch ngang
                    .replace(/[^\w\-]+/g, '')       // Loại bỏ tất cả các ký tự không phải từ hoặc dấu gạch ngang
                    .replace(/\-\-+/g, '-')         // Thay thế nhiều dấu gạch ngang liên tiếp bằng một dấu gạch ngang
                    .replace(/^-+/, '')             // Xóa các dấu gạch ngang ở đầu chuỗi
                    .replace(/-+$/, '');            // Xóa các dấu gạch ngang ở cuối chuỗi
            }
        });
    </script>
@endsection