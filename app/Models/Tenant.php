<?php
/**
 * Created by PhpStorm.
 * User: Raza Computer
 * Date: 11/15/2024
 * Time: 8:12 PM
 */


namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
    protected $guarded = [];
}