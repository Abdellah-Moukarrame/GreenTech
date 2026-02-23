<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Utilasateures;

class ProductPolicy
{
    public function create(Utilasateures $user)
    {
        return $user->can('create-product');
    }

    public function update(Utilasateures $user)
    {
        return $user->can('edit-product');
    }

    public function delete(Utilasateures $user)
    {
        return $user->can('delete-product');
    }

    public function manageStock(Utilasateures $user)
    {
        return $user->can('manage-stock');
    }

    public function export(Utilasateures $user)
    {
        return $user->can('export-data');
    }
}
