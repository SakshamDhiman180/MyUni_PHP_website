<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    public $modelClass;

    public function __construct()
    {
        $this->middleware(
            'permission:' . Str::snake(class_basename($this->modelClass)) . '-' . Permission::LIST,
            ['only' => ['index', 'show']]
        );
        $this->middleware(
            'permission:' . Str::snake(class_basename($this->modelClass)) . '-' . Permission::CREATE,
            ['only' => ['create', 'store']]
        );
        $this->middleware(
            'permission:' . Str::snake(class_basename($this->modelClass)) . '-' . Permission::EDIT,
            ['only' => ['edit', 'update']]
        );
        $this->middleware(
            'permission:' . Str::snake(class_basename($this->modelClass)) . '-' . Permission::DELETE,
            ['only' => ['destroy']]
        );
    }
}
