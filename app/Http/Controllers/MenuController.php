<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getMenu()
    {
    }
    public function addMenu(Request $request)
    {
        $slug = Str::slug($request->link);
        $exist = Menu::where('slug', $slug)->get();
        if(count($exist)>0)
        {
            $status = [
                'type' => 'danger',
                'message' => 'Menu already exist! Please use edit'
            ];
            return back()->withStatus($status);
            die;
        }
        $input = $request->all();

        $data = [
            'name' => $input['name'],
            'parent_menu' => $input['parent_menu'],
            'slug' => $slug,
            'type' => $input['type'],
            'icon' => $input['icon'],
            'link' => $input['link'] ?? 'javascript: void(0);',
            'bootclass' => $input['bootclass'],
            'menu_order' => $input['menu_order'],
            'access' => $input['access'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $menu = new Menu($data);
        $menu->save();
        $status = [
            'type' => 'success',
            'message' => 'Menu succesfully added!'
        ];
        return back()->withStatus($status);
    }
    public function removeMenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
    }
    public function editMenu($id, $input)
    {
        $menu = Menu::find($id);
        foreach ($input as $key => $attr) {
            $menu->$key = $attr;
        }
        $menu->save();
    }
    public function changeAccessMenu()
    {
    }
    public static function menuRole()
    {
        $user_role = auth()->user()->role;
        $roles = ['all'];
        if ($user_role == 'admin')
        {
            array_push($roles,$user_role,'supervisor','staff','user');
        }
        elseif($user_role == 'supervisor')
        {
            array_push($roles,$user_role,'staff','user');
        }
        elseif($user_role == 'staff')
        {
            array_push($roles,$user_role,'user');
        }
        elseif($user_role == 'user')
        {
            array_push($roles,$user_role);
        }
        return $roles;
    }
    public static function getMenuTitle()
    {
        $menus = Menu::where('type', 'menu-title')
            ->whereIn('access', MenuController::menuRole())
            ->orderBy('menu_order')
            ->get();

        return $menus;
    }
    public static function getMenuItem($title)
    {
        $user_role = auth()->user()->role;
        $menus = Menu::where('type', 'menu-item')
            ->where('parent_menu', $title)
            ->whereIn('access', MenuController::menuRole())
            ->orderBy('menu_order')
            ->get();
        return $menus;
    }
    public static function getMenuChildren($item)
    {
        $user_role = auth()->user()->role;
        $menus = Menu::where('type', 'menu-child')
            ->where('parent_menu', $item)
            ->whereIn('access', MenuController::menuRole())
            ->orderBy('menu_order')
            ->get();
        return $menus;
    }
    public static function getDashboard()
    {
        $user_role = auth()->user()->role;
        $menus = Menu::where('slug', 'dashboard')->get();
        $menus = $menus[0];
        return $menus;
    }
}
