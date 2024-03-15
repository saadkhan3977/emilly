<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Member;
use File;

class MemberController extends Controller
{
    public function index(){
        $data['members'] = Member::get();
        return view('backend/member/index', $data);
    }

    public function create(){
        $data['members'] = Member::get();
        return view('backend/member/create', $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
                 'member_name' => 'required',
                 'sex' => 'required',
                 'age' => 'required',
                 'member_photo' => 'required|mimes:png,jpg,jpeg',
                 'marital_status' => 'required',
                 'date_of_birth' => 'required',
                 'country' => 'required',
                 'district' => 'required',
                 'street_details' => 'required',
                 'email' => 'required',
                 'phone' => 'required',
             ]);

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            $memberphoto = null;
        
            if ($request->hasFile('member_photo')) {
                $memberphoto = time().'.'.$request->member_photo->extension();
                $request->member_photo->move(public_path('/upload/member'), $memberphoto);
            }

            Member::create([
                'member_name' => request()->input('member_name'),
                'sex' => request()->input('sex'),
                'age' => request()->input('age'),
                'member_photo' => $memberphoto,
                'marital_status' => request()->input('marital_status'),
                'date_of_birth' => request()->input('date_of_birth'),
                'country' => request()->input('country'),
                'district' => request()->input('district'),
                'street_details' => request()->input('street_details'),
                'email' => request()->input('email'),
                'phone' => request()->input('phone'),
            ]);

            return redirect()->route('members.index')
            ->with('success','Member Created Successfully');
    }

    public function edit($id, Request $request){
        $data['members'] = Member::find($id);
        return view('backend/member/edit', $data);
    }

    public function update($id, Request $request){

        $validator = Validator::make($request->all(), [
            'member_name' => 'required',
            'sex' => 'required',
            'age' => 'required',
            'member_photo' => 'mimes:png,jpg,jpeg',
            'marital_status' => 'required',
            'date_of_birth' => 'required',
            'country' => 'required',
            'district' => 'required',
            'street_details' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }
   
       if ($request->hasFile('member_photo')) {
           $memberphoto = time().'.'.$request->member_photo->extension();
           $request->member_photo->move(public_path('/upload/memberPhoto'), $memberphoto);
       }

       $member = Member::find($id);
   
       $memberphoto = $member->member_photo;
   
       if ($request->hasFile('member_photo')) {
           $memberphoto = time().'.'.$request->member_photo->extension();
           $request->member_photo->move(public_path('/upload/member/'), $memberphoto);
       }

       $member->update([
        'member_name' => request()->input('member_name'),
        'sex' => request()->input('sex'),
        'age' => request()->input('age'),
        'member_photo' => $memberphoto,
        'marital_status' => request()->input('marital_status'),
        'date_of_birth' => request()->input('date_of_birth'),
        'country' => request()->input('country'),
        'district' => request()->input('district'),
        'street_details' => request()->input('street_details'),
        'email' => request()->input('email'),
        'phone' => request()->input('phone'),
    ]);

    return redirect()->route('members.index')
    ->with('success','Member updated successfully');
    
    }

    public function destroy($id){
        $member = Member::find($id);
        File::delete(public_path('/upload/member/').$member->member_photo);
        $member->delete();
        return redirect()->back()->with('success','Member Deleted successfully');
    }

  
}
