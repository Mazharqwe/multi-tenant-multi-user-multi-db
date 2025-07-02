<?php
/**
 * Created by PhpStorm.
 * User: Raza Computer
 * Date: 11/15/2024
 * Time: 8:34 PM
 */

namespace App\Resolvers;

use Stancl\Tenancy\Contracts\TenantResolver as TenantResolverContract;
use Stancl\Tenancy\Database\Models\Tenant;

class UserTenantResolver implements TenantResolverContract
{
    public function resolve($args = null): ?Tenant
    {
        // Assuming you have a way to get the authenticated user
        $user = auth()->user();

        if ($user) {
            // Here, 'user_id' should be the field in your tenant model that maps to users.
            return Tenant::query()->where('user_id', $user->id)->first();
        }

        return null;
    }
}
