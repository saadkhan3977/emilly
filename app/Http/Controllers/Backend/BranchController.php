<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index(){
        $data['branches'] = Branch::get();
        return view('backend.branch.index', $data);
    }

    public function create(){
        $data['branches'] = Branch::get();
        return view('backend.branch.create', $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'state' => 'required',
            'city' => 'required',
            'status' => 'required',
            'country' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }

       Branch::create([
        'name' => request()->input('name'),
        'state' => request()->input('state'),
        'city' => request()->input('city'),
        'status' => request()->input('status'),
        'country' => request()->input('country'),
        'location' => request()->input('location'),
    ]);

    return redirect()->route('branches.index')
    ->with('success','Branch Created Successfully');
    }


    public function edit($id, Request $request){
        $data['branches'] = Branch::find($id);
        return view('backend/branch/edit', $data);
    }

    public function update($id, Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'state' => 'required',
            'city' =>  'required',
            'status' => 'required',
            'country' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }

       $branches = Branch::find($id);
   

       $branches->update([
        'name' => request()->input('name'),
        'state' => request()->input('state'),
        'city' => request()->input('city'),
        'status' => request()->input('status'),
        'country' => request()->input('country'),
        'location' => request()->input('location'),
    ]);

    return redirect()->route('branches.index')
    ->with('success','Branch updated successfully');
    
    }

    public function destroy($id){
        $branches = Branch::find($id);
        $branches->delete();
        return redirect()->back()->with('success','Branch Deleted successfully');
    }
}
