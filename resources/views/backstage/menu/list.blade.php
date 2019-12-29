@extends('layout.app')
@section('title', '菜单列表')
@section('content-title', '菜单列表')
@section('content-title-small', '查看')
@section('css')
    <link rel="stylesheet" href="{{ asset('nestable/nestable.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-iconpicker/css/bootstrap-iconpicker.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-treeview/css/bootstrap-treeview.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card box-info">
                <div class="card-header with-border">
                    <h3 class="card-title">新增</h3>
                </div>
                <div class="card-body">
                    <form id="addMenuForm" class="form-horizontal" accept-charset="UTF-8">
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="parent" class="col-sm-3">上级菜单</label>
                                <div class="col-sm-8">
                                    <input id="parent_id" type="hidden" name="parent_id" value="">
                                    <input id="parent"  name="parent" type="text" autocomplete="off" class="form-control"  tabindex="2">
                                    <div id="menuTree" style="display: none; background-color:white; "></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="title" class="col-sm-3 control-label">菜单名</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="title" name="title" value="" class="form-control" placeholder="输入菜单名">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="icon" class="col-sm-3 control-label">图标</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <a href="#" class="btn btn-default"><i class="fa fa-bars" id="menu-icon"></i></a>
                                        <input type="hidden" name="icon" value="fa-bars">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="icon" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div id="iconpicker"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="uri" class="col-sm-3 control-label">链接</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="uri" name="uri" value="" class="form-control" placeholder="输入链接">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="uri" class="col-sm-3 control-label">路由</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select class="selectpicker form-control" name="route_key" data-style="btn-info">
                                            <option value="url">URL</option>
                                            <option value="controller">Controller</option>
                                        </select>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" name="route_value" value="" class="form-control" placeholder="输入规则">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="roles" class="col-sm-3 control-label">权限</label>
                                <div class="col-sm-8">
                                    <select multiple class="selectpicker form-control" id="roles" name="roles[]" title="请选择权限" data-style="btn-success">
                                        <option value="0">A权限</option>
                                        <option value="1">B权限</option>
                                        <option value="2">C权限</option>
                                        <option value="3">D权限</option>
                                    </select>
                                    <input type="hidden" name="roles[]">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                                <div class="btn-group pull-left">
                                    <button class="btn btn-warning pull-right">重置</button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="btn-group pull-right">
                                    <button type="button" id="submit" class="btn btn-info pull-right">保存</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">

                <div class="card-header">

                    <div class="btn-group">
                        <a class="btn btn-primary menu-tools" data-action="expand-all"><i class="far fa-plus-square"></i>&nbsp;
                            展开
                        </a>
                        <a class="btn btn-primary menu-tools" data-action="collapse-all"><i class="far fa-minus-square"></i>
                            折叠
                        </a>
                    </div>

                    <div class="btn-group">
                        <a class="btn btn-info menu-tree-save"><i class="fa fa-save"></i>
                            保存
                        </a>
                    </div>

                    <div class="btn-group">
                        <a class="btn btn-warning menu-tree-refresh"><i class="fas fa-redo-alt"></i>
                            刷新
                        </a>
                    </div>
                    <div class="btn-group pull-right">
                        <span class="btn btn-info disabled">辅助显示的权限名</span>
                        <span class="btn btn-primary disabled">可视菜单的角色名</span>
                    </div>

                </div>
                <div class="card-body table-responsive no-padding">
                    <div class="dd" id="menu-tree">
                        <ol class="dd-list">
                            @foreach ($menu_list as $menu)
                                @include('backstage.menu.menu', $menu)
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('adminlte/plugins/bootstrap-iconpicker/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap-treeview/js/bootstrap-treeview.min.js')}}"></script>
    <script src="{{ asset('/nestable/jquery.nestable.js')}}"></script>
    <script>
        $(document).ready(function(){

            $('.fa-trash').click(function (e) {
                console.log(e.target.id);
                layui.use('layer', function(){
                    var layer = layui.layer;
                    // layer.tips('Hi，我是tips', '#'+e.target.id,{btn: ['重要','奇葩']});

                    layer.confirm('确定删除？', {
                        title: "提示",
                        btn: ['确定','取消'] //按钮
                    }, function(){
                        location.reload();
                        layer.msg('已删除');
                    });
                });
            });

            $('#menu-tree').nestable({maxDepth:3});
            $('.menu-tools').on('click', function(e){
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('.menu-tree-refresh').click(function () {
                location.reload();
            });

            //从后台加载菜单数据
            $.ajax({
                type: "GET",
                url: "{{ route('getMenuTree') }}",
                dataType: "json",
                success: function (result) {
                    $('#menuTree').treeview({
                        data: result,         // 数据源
                        highlightSelected: true,    //是否高亮选中
                        expandIcon : "fa fa-plus",
                        collapseIcon : "fa fa-minus",
                        onNodeSelected : function(event, data) {
                            $("#parent").val(data.text);
                            $("#parent_id").val(data.id);
                            $("#menuTree").hide();//选中树节点后隐藏树
                        }
                    });
                    console.log(result);
                },
                error: function () {
                    alert("树形结构加载失败！")
                }
            });


            //选择上级菜单时弹出菜单树
            $('#parent').click(function () {
                $('#menuTree').show();
            });

            //iconpicker图标选择
            var width = $('#iconpicker').parent().parent().width();
            var cols = Math.floor(width / 39);
            $("#iconpicker").iconpicker({
                rows: 8,
                cols: cols,
                searchText:'搜索图标',
                labelHeader: '{0} / {1} 页',
                labelFooter: '{0} - {1} / {2} 个图标',
            });

            //选择图标时更新图标显示
            $('#iconpicker').iconpicker().on('change', function(e) {
                var icon = e.icon;
                $('#menu-icon').attr('class', '').addClass(icon);
                $("input[name='icon']").val(icon);
            });

            //左侧菜单树
            $("#parent").click(function() {

                $('#menuTree').show();

            });

            //提交新增菜单表单
            $("#submit").click(function () {
                var options = {
                    url:"{{route('addMenu')}}",
                    type:"POST",
                    dataType:"json",
                    data:{
                        _token:"{{ csrf_token() }}"
                    },
                    success:function (data) {

                    }
                };
                $("#addMenuForm").ajaxSubmit(options);
            });

        });
    </script>
@endsection
