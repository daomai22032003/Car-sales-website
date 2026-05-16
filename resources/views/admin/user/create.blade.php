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

    textarea.form-control{
        height: auto;
    }

    .btn{
        border-radius: 8px;
    }

    .avatar-preview{
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #eee;
        margin-top: 10px;
        display: none;
    }

    .checkbox label{
        font-weight: 600;
    }
</style>

<section class="content-header">

    <h1>
        Thêm Người Dùng

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
                <form action="{{ route('admin.user.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="box-body">

                        <!-- ROLE -->
                        <div class="form-group">

                            <label>
                                Chọn Quyền
                            </label>

                            <select class="form-control"
                                    name="role_id">

                                <option value="1">
                                    Admin
                                </option>

                                <option value="2">
                                    Khách hàng
                                </option>

                            </select>

                        </div>

                        <!-- NAME -->
                        <div class="form-group">

                            <label>
                                Họ Tên
                            </label>

                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   placeholder="Nhập họ & tên">

                        </div>

                        <!-- EMAIL -->
                        <div class="form-group">

                            <label>
                                Email
                            </label>

                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   placeholder="Nhập email">

                        </div>

                        <!-- PASSWORD -->
                        <div class="form-group">

                            <label>
                                Mật khẩu
                            </label>

                            <input type="password"
                                   class="form-control"
                                   name="password"
                                   placeholder="Nhập mật khẩu">

                        </div>

                        <!-- AVATAR -->
                        <div class="form-group">

                            <label>
                                Avatar
                            </label>

                            <input type="file"
                                   id="avatar"
                                   name="avatar"
                                   accept="image/*">

                            <img id="preview-avatar"
                                 class="avatar-preview">

                        </div>

                        <!-- ACTIVE -->
                        <div class="checkbox">

                            <label>

                                <input type="checkbox"
                                       value="1"
                                       name="is_active">

                                Kích hoạt tài khoản

                            </label>

                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="box-footer">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Tạo Người Dùng

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

<script>
    document.getElementById('avatar').addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){

            const reader = new FileReader();

            reader.onload = function(event){

                const preview = document.getElementById('preview-avatar');

                preview.src = event.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }

    });
</script>

@endsection