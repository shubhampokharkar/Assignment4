<?php

class MenuItem {
    
    private $menuList;

    function __construct(array $menuList) {
        if (sizeof($menuList)>0) {
            $this->menuList = $menuList;
        } else {
            throw new Exception("No menu available");
        }
    }

    public function getMenuList() {
        $menuItemList = [];

        foreach($this->menuList as $menu) {
            $menuItemList[] = array(
                "name"=>$menu['name']
            );
        }

        return json_encode($menuItemList);
    }

    public function getMenuItembyName($name) {
        $response = ["In-Valid name"];
        if($name) {
            foreach($this->menuList as $menu) {
                if ($name == $menu['name']) {
                    $response = $menu;
                    break;
                }
            }
        }
        return json_encode($response);
    }

}
?>