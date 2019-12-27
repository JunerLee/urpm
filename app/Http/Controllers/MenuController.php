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
        $this->menuService->getMenuTree();
        return view('menu.list');
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
