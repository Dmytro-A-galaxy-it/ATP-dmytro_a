<?php

namespace App\Http\Controllers\Admin;

use Backpack\PermissionManager\app\Http\Controllers\UserCrudController as BaseUserCrudController;

class UserCrudController extends BaseUserCrudController
{
    public function setup()
    {
        parent::setup();

        if(backpack_user()->hasRole('Driver')) {
            $this->crud->query->where('id', backpack_user()->id);
        }
    }
}
