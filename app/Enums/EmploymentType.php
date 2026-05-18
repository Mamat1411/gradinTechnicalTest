<?php

namespace App\Enums;

enum EmploymentType: string
{
    case INTERNAL = 'internal';
    case VENDOR = 'vendor';
    case FREELANCE = 'freelance';
}
