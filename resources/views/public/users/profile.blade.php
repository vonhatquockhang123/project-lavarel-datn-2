@extends('layouts.user-master')

@section('content')
    <div class="container">
        <h4 class="my-4 p-3 bg-light">Hồ sơ cá nhân</h4>

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-body my-3 d-flex flex-row">
                    <div class="user-avatar mr-3">
                        <img src="{{ Auth::user()->image ? Auth::user()->image_url : Auth::user()->default_img }}" width="100" alt="">
                    </div>

                    <div class="user-info">
                        <h5 class="my-3">{{ Auth::user()->name }}</h5>
                        <p><i class="fas fa-envelope mr-2"></i> {{ Auth::user()->email }}</p>
                        <p><i class="fas fa-map-marker-alt mr-2"></i> {{ Auth::user()->address }}</p>
                        <!-- <p><i class="fas fa-clock mr-2"></i> {{ Auth::user()->created_at ? Auth::user()->created_at->diffForHumans() : '' }} </p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-body my-3">
                    <h6>Hoạt động</h6>
                    <p><a href="{{ route('user.don-hang') }}" class="mr-2"><i class="fas fa-shopping-basket mr-1"></i> Đơn đặt hàng</a> {{ Auth::user()->donHang ? Auth::user()->donHang->count() : 'Chưa có đơn đặt hàng nào' }}</p>
                    <p><a href="{{ route('user.danh-gia-cua-toi') }}" class="mr-2"><i class="fas fa-comments mr-1"></i> Đánh giá</a> {{ Auth::user()->danhGiaSach ? Auth::user()->danhGiaSach->count() : 'Bạn chưa để lại đánh giá nào' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection