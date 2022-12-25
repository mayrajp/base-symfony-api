<?php

namespace App\Constants;

class UserConstants
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_USER = 'ROLE_USER';

    public const ROLES = [
        'ADMIN' => self::ROLE_ADMIN,
        'USUÁRIO' => self::ROLE_USER,
    ];
}