<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission
{
    public const LIST = 'list'; // used for listing and view page

    public const CREATE = 'create';

    public const EDIT = 'edit';

    public const DELETE = 'delete';

    public static function list()
    {
        return [self::LIST, self::CREATE, self::EDIT, self::DELETE];
    }

    public static function getArranged()
    {
        $permissions = self::get();
        $module_wise_permissions = [];

        foreach ($permissions as $permission) {
            $splitted_name = explode('-', $permission->name);
            if (!array_key_exists($splitted_name[0], $module_wise_permissions)) {
                $module_wise_permissions[$splitted_name[0]] = [
                    'name' => ucwords(str_replace('_', ' ', $splitted_name[0])),
                    'permissions' => [],
                ];
            }
            $module_wise_permissions[$splitted_name[0]]['permissions'][$splitted_name[1]] = $permission->id;
        }

        return $module_wise_permissions;
    }
}
