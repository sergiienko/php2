<?php

namespace App\Models;

interface HasEmail
{
    /**
     * Returns email address.
     *
     * @deprecated
     * @return string Email address
     */
    public function getEmail();
}
