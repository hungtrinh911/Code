<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Validate
{
    //
    public static function rule_create_role($slug)
    {
        return Role::getRoleBySlug(slug);
    }
}
