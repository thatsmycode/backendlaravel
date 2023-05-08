<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    const JUGADOR = 'jugador';
    const EDITOR = 'editor';
    const ADMIN  = 'admin';
}
