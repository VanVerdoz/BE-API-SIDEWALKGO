<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // Untuk API, jangan redirect — langsung 401
        if ($request->expectsJson()) {
            return null;
        }

        // Non-API biasanya redirect, tapi kita ubah jadi 401 juga
        abort(401, 'Unauthenticated.');
    }
}
