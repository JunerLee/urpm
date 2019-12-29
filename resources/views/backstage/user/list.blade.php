@extends('layout.app')
@section('title', '用户列表')
@section('content-title', '用户列表')
@section('content-title-small', '查看')
@section('content')
    <div class="row">
        <div id="user-list"></div>
    </div>
@endsection
@section('js')
    <script type="text/x-kendo-template" id="user-manage-toolbar">
        <button class="btn btn-success btn-sm" onclick=""><i class='fas fa-plus'></i>&nbsp;新增</button>
        <button class="btn btn-info btn-sm" onclick=""><i class='fas fa-redo'></i>&nbsp;刷新状态</button>
    </script>
    <script>
        $(document).ready(function () {
            let dataSource = new kendo.data.DataSource({
                transport: {
                    read:  function (options) {
                        $.ajax({
                            url: "{{ url('/user/list') }}",
                            type: "GET",
                            dataType: "JSON",
                            success:function (result) {
                                console.log(result);
                                options.success(result.data);
                            }
                        });
                    }
                },
                batch: true,
                pageSize: 13,
                schema: {
                    model: {
                        fields: {
                            id: { field:"id" },
                            username: { field:"username"},
                            email: { field:"email"},
                            mobile: { field:"mobile"},
                        }
                    }
                }
            });

            $("#user-list").kendoGrid({
                dataSource: dataSource,
                resizable:      true,
                pageable:       true,
                sortable:       true,
                noRecords:      true,
                columnMenu:     true,
                reorderable:    true,
                // height:         620 ,
                toolbar: kendo.template($("#user-manage-toolbar").html()),
                columns: [
                    { field:"id",    title: "ID", width: 150,},
                    { field:"username",  title: "用户名"    ,width: 200},
                    { field:"email", title: "邮箱"},
                    { field:"mobile", title: "电话"},

                    { title: "操作",
                        template:function (dataItem) {
                            var id = JSON.stringify(dataItem.id);
                            var space = '&nbsp;&nbsp;';
                            var edit = "<button onclick='userEdit("+id+")' class='btn btn-primary btn-sm'>"+
                                "<span class='k-icon k-i-edit'></span>&nbsp;编辑</button>" ;

                            var del = "<button onclick='userDelete("+id+")' class='btn btn-danger btn-sm'>"+
                                "<i class='far fa-trash-alt'></i>&nbsp;删除</button>";

                            return edit + space + del;
                        }

                    }
                ]
            });

        });

        //编辑
        function userEdit(id) {
            window.location.href = "/user/"+id+"/edit";
        }

        //删除
        function userDelete(id) {
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
        }

    </script>
@endsection
