<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllPermission()
    {
        $permissions = Permission::all();
       return view('backend.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddPermission()
    {
        return view('backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function StorePermission(Request $request)
    {
        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Доступ успешно добавлен',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function EditPermission($id)
    {
       $permission = Permission::findOrFail($id);

       return view('backend.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdatePermission(Request $request, Role $role)
    {
        $permission_id = $request->id;

        $role = Permission::findorFail($permission_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);


        $notification = array(
            'message' => 'Доступ успешно обновлен',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Доступ успешно удален',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);


    }
}
