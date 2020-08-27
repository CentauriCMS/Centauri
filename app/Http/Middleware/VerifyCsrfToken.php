<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
// use Centauri\Extension\Cookie\Helper\CookiesHelper;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * Determine if the cookie should be added to the response.
     *
     * @return bool
     */
    // public function shouldAddXsrfTokenCookie()
    // {
    //     return ($this->addHttpCookie == CookiesHelper::getConsentState());
    // }
}
