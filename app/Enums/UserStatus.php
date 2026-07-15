<?php

namespace App\Enums;

enum UserStatus : int
{
    case DISABLE = 0;
    case PENDING = 1;
    case ENABLE = 2;

}
