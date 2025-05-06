<?php

namespace App\Repositories;

enum Role: string
{
    case student = 'student';
    case teacher = 'teacher';
    case admin = 'admin';
}
