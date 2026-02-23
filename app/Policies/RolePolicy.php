<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Utilasateures;

class RolePolicy
{
    public function create(Utilasateures $user)
    {
        return $user->can('create-role');
    }

    public function update(Utilasateures $user)
    {
        return $user->can('edit-role');
    }

    public function delete(Utilasateures $user)
    {
        return $user->can('delete-role');
    }

    public function managePermissions(Utilasateures $user)
    {
        return $user->can('manage-permissions');
    }

    public function assignRoles(Utilasateures $user)
    {
        return $user->can('assign-roles');
    }
}
