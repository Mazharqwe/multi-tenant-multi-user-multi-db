<?php
/**
 * Created by PhpStorm.
 * User: Raza Computer
 * Date: 11/15/2024
 * Time: 8:50 PM
 */
namespace App\Http\Middleware;

use App\Resolvers\UserTenantResolver;
use Closure;
use Stancl\Tenancy\Contracts\TenantResolver;
use App\Models\Tenant;

class InitializeTenancyByUser
{
    public static $abortRequest;
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (isset($user->id)) {

            if (Tenant::query()->where('user_id', $user->id)->first()) {

                tenancy()->initialize(Tenant::query()->where('user_id', $user->id)->first()->id);
                return $next($request);
            }
        }

        $abortRequest = static::$abortRequest ?? function () {
                abort(404);
            };

        return $abortRequest($request, $next);

    }
}