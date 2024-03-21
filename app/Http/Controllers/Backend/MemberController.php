<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;
use File;

class MemberController extends Controller
{
    public function index(){
        $data['users'] = User::get();
        return view('backend/member/index', $data);
    }

    public function create(){
        $data['users'] = User::get();
        return view('backend/member/create', $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
                 'name' => 'required',
                 'email' => 'required',
                 'password' => 'required',
                 'phone' => 'required',
                 'image' => 'required|mimes:png,jpg,jpeg',
                 'age' => 'required',
                 'marital_status' => 'required',
                 'date_of_birth' => 'required',
                 'country' => 'required',
                 'district' => 'required',
                 'street_details' => 'required',
                 'sex' => 'required',
                ]);

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            $memberphoto = null;
        
            if ($request->hasFile('image')) {
                $memberphoto = time().'.'.$request->image->extension();
                $request->image->move(public_path('/upload/member'), $memberphoto);
            }

            User::create([
                'name' => request()->input('name'),
                'email' => request()->input('email'),
                'password' => $request->password,
                'phone' => request()->input('phone'),
                'image' => $memberphoto,
                'age' => request()->input('age'),
                'marital_status' => request()->input('marital_status'),
                'date_of_birth' => request()->input('date_of_birth'),
                'country' => request()->input('country'),
                'district' => request()->input('district'),
                'street_details' => request()->input('street_details'),
                'sex' => request()->input('sex'),
            ]);

            return redirect()->route('users.index')
            ->with('success','Member Created Successfully');
    }

    public function edit($id, Request $request){
        $data['users'] = user::find($id);
        return view('backend/member/edit', $data);
    }

    public function update($id, Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
           
            'phone' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'age' => 'required',
            'marital_status' => 'required',
            'date_of_birth' => 'required',
            'country' => 'required',
            'district' => 'required',
            'street_details' => 'required',
            'sex' => 'required',
        ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }
   

       $user = User::find($id);
   
       $memberphoto = $user->image;
   
       if ($request->hasFile('image')) {
        $memberphoto = time().'.'.$request->image->extension();
        $request->image->move(public_path('/upload/member'), $memberphoto);
    }

       $user->update([
        'name' => request()->input('name'),
   
        'phone' => request()->input('phone'),
        'image' => $memberphoto,
        'age' => request()->input('age'),
        'marital_status' => request()->input('marital_status'),
        'date_of_birth' => request()->input('date_of_birth'),
        'country' => request()->input('country'),
        'district' => request()->input('district'),
        'street_details' => request()->input('street_details'),
        'sex' => request()->input('sex'),
    ]);

    return redirect()->route('users.index')
    ->with('success','Member updated successfully');
    
    }

    public function destroy($id){
        $user = User::find($id);
        File::delete(public_path('/upload/member/').$user->image);
        $user->delete();
        return redirect()->back()->with('success','User Deleted successfully');
    }

  
}
