<?php


namespace App\Services;


use App\Models\Menu;

class MenuService
{

    public function getMenuTree()
    {
        $menu_list = Menu::all()->toArray();
        $menu_tree = $this->getTree($menu_list,0);
        return $menu_tree;
    }

    public function getTree($data, $pId)
    {
        $tree = array();
        foreach($data as $key => $value)
        {
            if($value['parent_id'] == $pId)
            {
                $nodes = $this->getTree($data, $value['id']);
                if (!empty($nodes)) {
                    $value['nodes'] = $nodes;
                }
                $value['text'] = $value['title'];
                $tree[] = $value;
                //unset($data[$k]);
            }
        }
        return $tree;
    }


    public function add($data)
    {


    }

}
