<?php
/**
 * Created by PhpStorm.
 * User: Raza Computer
 * Date: 11/16/2024
 * Time: 12:52 PM
 */




namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tenant;

class PreventAccessFromSuperAdmin
{
    /**
     * Set this property if you want to customize the on-fail behavior.
     *
     * @var callable|null
     */
    public static $abortRequest;

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (isset($user->id)) {

            if (!Tenant::query()->where('user_id', $user->id)->first()  ) {
                dd("SDf");
                $abortRequest = static::$abortRequest ?? function () {
                        abort(404);
                    };

                return $abortRequest($request, $next);

            }
        }
        return $next($request);


    }
}
