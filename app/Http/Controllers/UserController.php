<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    //显示用户列表页面
    public function index()
    {
        return view('backstage.user.list');
    }

    //获取用户列表数据
    public function getList()
    {
        $userList = $this->userService->getList();
        return self::success('获取成功',$userList);
    }

    //显示创建新用户界面
    public function create()
    {

    }

    //创建新用户
    public function store(Request $request)
    {

    }

    //显示指定用户信息
    public function show($id)
    {

    }

    //显示更新用户信息界面
    public function edit($id)
    {
        return view('backstage.user.edit');
    }

    //更新用户信息
    public function update(Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
