<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $data['permissions'] = Permission::get();
        return view('backend.permissions.index',$data);
    }
    public function create()
    {
		$data['list'] = Permission::get();
        return view('backend.permissions.create',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    
        $input = $request->all();
        
        Permission::create($input);
        
        return redirect()->back()->with(['success'=>'User created successfully']);
    }

    public function edit($id)
    {
        $data['permission'] = Permission::find($id);
        return view('backend.permissions.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    
        $input = $request->all();
       
    
        $user = Permission::find($id);
        $user->update($input);
        
        return redirect()->route('permission.index')
                        ->with('success','Permission updated successfully');
    }
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permission.index')
                        ->with('success','Permission deleted successfully');
    }
}
