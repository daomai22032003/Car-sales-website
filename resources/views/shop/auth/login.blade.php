@extends('shop.layouts.main')

@section('content')
    <section class="auth-section"
        style="padding: 100px 0; background: #f8fafc; min-height: calc(100vh - 150px); display: flex; align-items: center;">
        <div class="container">
            <div style="display: flex; justify-content: center;">
                <div style="width: 100%; max-width: 480px;">
                    <div class="auth-card"
                        style="background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); padding: 40px; border: 1px solid #f0f0f0;">
                        <div class="auth-header" style="text-align: center; margin-bottom: 40px;">
                            <h2 style="font-weight: 800; color: #1a2a5a; font-size: 28px; margin-bottom: 10px;">Đăng nhập
                            </h2>
                            <p style="color: #666;">Mừng bạn quay trở lại với DailyXe</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="email"
                                    style="display: block; margin-bottom: 8px; font-weight: 600; color: #444; font-size: 14px;">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                    style="width: 100%; height: 54px; border-radius: 12px; border: 1px solid #e0e0e0; padding: 0 20px; font-size: 16px; transition: border-color 0.3s; box-sizing: border-box;"
                                    onfocus="this.style.borderColor='#1e88e5'" onblur="this.style.borderColor='#e0e0e0'">
                                @error('email')
                                    <span
                                        style="color: #d32f2f; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 25px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <label for="password" style="font-weight: 600; color: #444; font-size: 14px;">Mật
                                        khẩu</label>
                                    <a href="#" style="color: #1e88e5; font-size: 13px; text-decoration: none;">Quên mật
                                        khẩu?</a>
                                </div>
                                <input id="password" type="password" name="password" required
                                    style="width: 100%; height: 54px; border-radius: 12px; border: 1px solid #e0e0e0; padding: 0 20px; font-size: 16px; transition: border-color 0.3s; box-sizing: border-box;"
                                    onfocus="this.style.borderColor='#1e88e5'" onblur="this.style.borderColor='#e0e0e0'">
                                @error('password')
                                    <span
                                        style="color: #d32f2f; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 25px;">
                                <label
                                    style="display: flex; align-items: center; cursor: pointer; font-size: 14px; color: #666;">
                                    <input type="checkbox" name="remember"
                                        style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;"> Ghi nhớ
                                    đăng nhập
                                </label>
                            </div>

                            <button type="submit" class="btn-login"
                                style="width: 100%; height: 54px; background: #1e88e5; color: white; border: none; border-radius: 12px; font-size: 17px; font-weight: 700; cursor: pointer; transition: background 0.3s;">
                                Đăng nhập
                            </button>
                        </form>

                        <div
                            style="text-align: center; margin-top: 30px; border-top: 1px solid #f0f0f0; padding-top: 25px; color: #666;">
                            Bạn chưa có tài khoản? <a href="{{ route('register') }}"
                                style="color: #1e88e5; font-weight: 700; text-decoration: none;">Đăng ký ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection