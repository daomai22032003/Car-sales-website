@extends('shop.layouts.main')

@section('content')
    <section class="member-profile-section" style="padding: 60px 0; background: #f8fafc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="member-sidebar"
                        style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
                        <h4
                            style="font-weight: 800; color: #1a2a5a; margin-bottom: 25px; font-size: 18px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                            Tài khoản của tôi</h4>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 15px;">
                                <a href="{{ route('member.order.history') }}"
                                    style="color: #666; text-decoration: none; display: flex; align-items: center;">
                                    <i class="fa fa-history" style="width: 25px; font-size: 18px;"></i> Lịch sử đơn hàng
                                </a>
                            </li>
                            <li style="margin-bottom: 15px;">
                                <a href="{{ route('member.profile') }}"
                                    style="color: #1e88e5; font-weight: 700; text-decoration: none; display: flex; align-items: center;">
                                    <i class="fa fa-user-circle-o" style="width: 25px; font-size: 18px;"></i> Thông tin cá
                                    nhân
                                </a>
                            </li>
                            <li style="margin-bottom: 15px;">
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    style="color: #d32f2f; text-decoration: none; display: flex; align-items: center;">
                                    <i class="fa fa-sign-out" style="width: 25px; font-size: 18px;"></i> Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="profile-content"
                        style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
                        <h2 style="font-weight: 800; color: #1a2a5a; font-size: 24px; margin-bottom: 30px;">Thông tin cá
                            nhân</h2>

                        @if(session('success'))
                            <div class="alert alert-success" style="border-radius: 8px; margin-bottom: 20px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('member.updateProfile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">Họ
                                        tên</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $user->name) }}"
                                        style="border-radius: 10px; padding: 12px; border: 1px solid #ddd;" required>
                                    @error('name')
                                        <span style="color: #f44336; font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label
                                        style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #f9f9f9;"
                                        readonly disabled>
                                    <small style="color: #999;">Email không thể thay đổi.</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">Số
                                        điện thoại</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $user->phone) }}"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #ddd;">
                                    @error('phone')
                                        <span style="color: #f44336; font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label style="font-weight: 600; color: #555; margin-bottom: 8px; display: block;">Địa
                                        chỉ</label>
                                    <textarea name="address" class="form-control" rows="3"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #ddd;">{{ old('address', $user->address) }}</textarea>
                                    @error('address')
                                        <span style="color: #f44336; font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-top: 20px;">
                                <button type="submit" class="btn btn-primary"
                                    style="background: #1e88e5; border: none; padding: 12px 40px; border-radius: 8px; color: white; font-weight: 700;">
                                    Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Logout form referenced in sidebar -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection