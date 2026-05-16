@extends('admin.layouts.main')

@section('content')

<style>
    .box{
        border-radius: 10px;
        overflow: hidden;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .form-control{
        border-radius: 8px;
        height: 42px;
    }

    .btn{
        border-radius: 8px;
    }

    .avatar-preview{
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #eee;
        margin-top: 15px;
    }

    .checkbox label{
        font-weight: 600;
    }

    .text-note{
        color: #999;
        font-size: 12px;
        margin-top: 5px;
    }
</style>

<section class="content-header">

    <h1>
        Sửa Thông Tin Người Dùng

        <a href="{{ route('admin.user.index') }}"
           class="btn btn-success pull-right">

            <i class="fa fa-list"></i>
            Danh Sách User

        </a>
    </h1>

</section>

<section class="content">

    <div class="row">

        <div class="col-md-7">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title">
                        Thông tin người dùng
                    </h3>

                </div>

                <!-- FORM -->
                <form action="{{ route('admin.user.update', ['user' => $user->id]) }}"
                      method="post"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="box-body">

                        <!-- ROLE -->
                        <div class="form-group">

                            <label>
                                Chọn Quyền
                            </label>

                            <select class="form-control"
                                    name="role_id">

                                <option value="1"
                                    {{ ($user->role_id == 1) ? 'selected' : '' }}>

                                    Admin

                                </option>

                                <option value="2"
                                    {{ ($user->role_id == 2) ? 'selected' : '' }}>

                                    Khách hàng

                                </option>

                            </select>

                        </div>

                        <!-- NAME -->
                        <div class="form-group">

                            <label>
                                Họ Tên
                            </label>

                            <input value="{{ $user->name }}"
                                   type="text"
                                   class="form-control"
                                   name="name"
                                   placeholder="Nhập họ & tên">

                        </div>

                        <!-- EMAIL -->
                        <div class="form-group">

                            <label>
                                Email
                            </label>

                            <input value="{{ $user->email }}"
                                   type="email"
                                   class="form-control"
                                   name="email"
                                   placeholder="Nhập Email">

                        </div>

                        <!-- PASSWORD -->
                        <div class="form-group">

                            <label style="color:#d9534f;">
                                Mật khẩu mới
                            </label>

                            <input type="password"
                                   class="form-control"
                                   name="new_password"
                                   placeholder="Nhập mật khẩu mới">

                            <p class="text-note">
                                Để trống nếu không muốn thay đổi mật khẩu
                            </p>

                        </div>

                        <!-- AVATAR -->
                        <div class="form-group">

                            <label style="color:#d9534f;">
                                Thay đổi ảnh đại diện
                            </label>

                            <input type="file"
                                   id="new_avatar"
                                   name="new_avatar"
                                   accept="image/*">

                            <br>

                            @if($user->avatar)

                                <img src="{{ asset($user->avatar) }}"
                                     id="preview-avatar"
                                     class="avatar-preview">

                            @else

                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                                     id="preview-avatar"
                                     class="avatar-preview">

                            @endif

                        </div>

                        <!-- STATUS -->
                        <div class="checkbox">

                            <label>

                                <input type="checkbox"
                                       value="1"
                                       name="is_active"
                                       {{ ($user->is_active == 1) ? 'checked' : '' }}>

                                Kích hoạt tài khoản

                            </label>

                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="box-footer">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Cập nhật

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

<script>
    document.getElementById('new_avatar').addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){

            const reader = new FileReader();

            reader.onload = function(event){

                document.getElementById('preview-avatar').src = event.target.result;

            }

            reader.readAsDataURL(file);
        }

    });
</script>

@endsection