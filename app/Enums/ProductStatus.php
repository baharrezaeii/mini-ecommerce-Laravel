<?php

namespace App\Enums;

enum ProductStatus: int
{
    case DISABLE = 0;
    case DRAFT = 1;
    case PUBLISHED = 2;
}
