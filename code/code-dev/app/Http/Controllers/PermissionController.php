<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
#use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
#use DB;

class PermissionController extends Controller
{

    const PERMISSIONS = [
        'show' => 'admin-permission-show',
    ];

    public function index()
    {
        $permissions = Permission::orderBy('name')->paginate();

        return view('permission.index', [
            'rows' => $permissions,
        ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Permission $permission)
    {
        return view('permission.show', [
            'row' => $permission->load('users', 'roles')
        ]);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
