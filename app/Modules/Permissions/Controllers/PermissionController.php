<?php

namespace Permissions\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Permissions::';
    }

    public function index()
    {
        hasPermissions('show_permissions');
        $title = transWord('Permissions');
        $pages = [
            [transWord('Permissions'),route('permissions')]
        ];
        $permissions = Permission::latest()->get();
        return view($this->path.'index',compact('permissions','pages','title'));
    }

    public function store(Request $request)
    {
        hasPermissions('create_permissions');
        $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        $permissions = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return redirect()->route('permissions')->with('success','');
    }




    public function edit(Permission $permission)
    {
     hasPermissions('update_permissions');

        $title = transWord('Edit Permission');
        $pages = [
            [transWord('Permission'),route('permissions')]
        ];
        return view($this->path.'.edit',compact('permission','title','pages'));
    }




    public function update(Request  $request, Permission $permission)
    {
        hasPermissions('update_permissions');
       $request->validate([
           'name' => 'required|unique:permissions,name,' . $permission->id
       ]);

       $permission->update($request->all());

       return redirect()->route('permissions')->with('success','');
    }




    public function destroy(Permission $permission){
       hasPermissions('delete_permissions');
        $permission->delete();
        return redirect()->back()->with('success','');
    }




}
