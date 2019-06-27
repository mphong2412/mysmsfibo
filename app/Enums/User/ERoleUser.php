<?php
namespace App\Enums\User;

abstract class ERoleUser
{
    const ADMIN = 1;
    const ROOT = 2;
    const USER = 3;

    public static function getRoleString($status)
    {
        switch ($status) {
            case EStatus::ADMIN:
                return 'Admin';
            case EStatus::ROOT:
                return 'Root';
            case EStatus::USER:
                return 'User';
        }
        return null;
    }
}
