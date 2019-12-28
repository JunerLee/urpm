<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menu_list = $this->menuService->getMenuTree();
        return view('menu.list',compact('menu_list'));
    }

    public function add(Request $request)
    {
        dd($request->all());
        $this->menuService->add($request->except(['_token']));
    }

    public function getTree()
    {
        return $this->menuService->getMenuTree();
    }
}
