@extends('shop.layouts.main')

@section('content')
    <section class="auth-section"
        style="padding: 80px 0; background: #f8fafc; min-height: calc(100vh - 150px); display: flex; align-items: center;">
        <div class="container">
            <div style="display: flex; justify-content: center;">
                <div style="width: 100%; max-width: 520px;">
                    <div class="auth-card"
                        style="background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); padding: 40px; border: 1px solid #f0f0f0;">
                        <div class="auth-header" style="text-align: center; margin-bottom: 40px;">
                            <h2 style="font-weight: 800; color: #1a2a5a; font-size: 28px; margin-bottom: 10px;">Đăng ký tài
                                khoản</h2>
                            <p style="color: #666;">Trở thành thành viên của cộng đồng DailyXe</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="name"
                                    style="display: block; margin-bottom: 8px; font-weight: 600; color: #444; font-size: 14px;">Họ
                                    và tên</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                    style="width: 100%; height: 50px; border-radius: 12px; border: 1px solid #e0e0e0; padding: 0 20px; font-size: 16px; transition: border-color 0.3s; box-sizing: border-box;">
                                @error('name')
                                    <span
                                        style="color: #d32f2f; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="email"
                                    style="display: block; margin-bottom: 8px; font-weight: 600; color: #444; font-size: 14px;">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    style="width: 100%; height: 50px; border-radius: 12px; border: 1px solid #e0e0e0; padding: 0 20px; font-size: 16px; transition: border-color 0.3s; box-sizing: border-box;">
                                @error('email')
                                    <span
                                        style="color: #d32f2f; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="password"
                                    style="display: block; margin-bottom: 8px; font-weight: 600; color: #444; font-size: 14px;">Mật
                                    khẩu</label>
                                <input id="password" type="password" name="password" required
                                    style="width: 100%; height: 50px; border-radius: 12px; border: 1px solid #e0e0e0; padding: 0 20px; font-size: 16px; transition: border-color 0.3s; box-sizing: border-box;">
                                @error('password')
                                    <span
                                        style="color: #d32f2f; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 30px;">
                                <label for="password-confirm"
                                    style="display: block; margin-bottom: 8px; font-weight: 600; color: #444; font-size: 14px;">Xác
                                    nhận mật khẩu</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required
                                    style="width: 100%; height: 50px; border-radius: 12px; border: 1px solid #e0e0e0; padding: 0 20px; font-size: 16px; transition: border-color 0.3s; box-sizing: border-box;">
                            </div>

                            <button type="submit" class="btn-register"
                                style="width: 100%; height: 54px; background: #1e88e5; color: white; border: none; border-radius: 12px; font-size: 17px; font-weight: 700; cursor: pointer; transition: background 0.3s;">
                                Tạo tài khoản
                            </button>
                        </form>

                        <div
                            style="text-align: center; margin-top: 30px; border-top: 1px solid #f0f0f0; padding-top: 25px; color: #666;">
                            Bạn đã có tài khoản? <a href="{{ route('login') }}"
                                style="color: #1e88e5; font-weight: 700; text-decoration: none;">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection