@extends('layout.app')
@section('title', '编辑菜单')
@section('content-title', '菜单')
@section('content-title-small', '编辑')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    编辑
                </div>
                <div class="card-body table-responsive">
                    <form id="editUserForm" class="form-horizontal" accept-charset="UTF-8">
                        <div class="box-body">
                            <div class="row form-group">
                                <label for="username" class="col-1 control-label">用户名</label>
                                <div class="col-11">
                                    <input type="text" class="form-control" name="username" value="" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-1 control-label">邮箱</label>
                                <div class="col-11">
                                    <input type="text" class="form-control" name="email" value="" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="role" class="col-1 control-label">角色</label>
                                <div class="col-11">
                                    <select class="form-control" name="roles[]" title="role" multiple="multiple" id="role-select">

                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="mobile" class="col-1 control-label">手机号码</label>
                                <div class="col-11">
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="sex" class="col-1 control-label">性别</label>
                                <div class="col-11">
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="1" checked>男
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="2">女
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="password" class="col-1 control-label">密码</label>
                                <div class="col-11">
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="password_confirmation" class="col-1 control-label">确认密码</label>
                                <div class="col-11">
                                    <input type="password" class="form-control" name="password_confirmation" value="">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-md-1 col-sm-2 float-right">
                                        <button type="submit" class="btn btn-success float-right">提交</button>
                                    </div>
                                    <div class="col-md-1 col-sm-2 float-right">
                                        <button type="button" class="btn btn-info float-right" onclick="location='{{ url("/user") }}';">返回</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function(){


        });
    </script>
@endsection
