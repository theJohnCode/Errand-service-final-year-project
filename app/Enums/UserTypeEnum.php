<?php

namespace App\Enums;

enum UserTypeEnum: string
{
    case ERRAND_RUNNER = 'ERR';
    case ERRAND_CLIENT = 'ERC';
    case ADMIN = 'ADM';
}