<?php

declare(strict_types=1);

namespace App\Enums;

enum UserType: string
{
    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case USER = 'user';

    public static function values(): array
    {
        return array_map(
            fn (UserType $userType): string => $userType->value,
            self::cases()
        );
    }
}
