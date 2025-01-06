<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesAndPermissionController extends Controller
{
    public function addPemission(Request $request)
    {
        $currentUser = auth()->user();
        $currentUser->assignRole('admin');
    }
}
