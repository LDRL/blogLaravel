<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // protected $table = 'menus';

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'menus_roles', 'menus_id', 'roles_id');
    }
    private function getParents($front)
    {
        if ($front) {
            return $this->whereHas('roles', function ($query) {
                $query->where('rol_id', session('rol_id'))->orderby('menus_id');
            })->orderby('menus_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('menus_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        }
    }

    private function getChildren($parents, $line)
    {
        $children = [];
        foreach ($parents as $line2) {
            if ($line['id'] == $line2['menus_id']) {
                $children = array_merge($children, [array_merge($line2, ['submenu' => $this->getChildren($parents,$line2)])]);
            }

        }
    }

    public static function getMenu($front = false)
    {
        $menus = new Menu();
        $parents = $menus->getParents($front);
        $menuAll = [];
        foreach ($parents as $line) {
            if ($line['menus_id'] !== null)
                break;
            $item = [array_merge($line, ['submenu' => $menus->getChildren($parents, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }
}