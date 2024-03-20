<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Branch;
use App\Models\User;
use Auth;

class AnnouncmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['announcements'] = Announcement::with('branches')->get();
        return view('backend.announcement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = Auth::id();
        $data['branches'] = Branch::get();
        return view('backend.announcement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request){
            $validator = Validator::make($request->all(), [
                    
                     'branch_id' => 'required',
                     'start_time' => 'required',
                     'end_time' => 'required',
                     'start_date' => 'required',
                     'end_date' => 'required',
                     'message' => 'required',
                 ]);
    
                 if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
               
                Announcement::create([
                    'user_id' => Auth::id(),
                    'branch_id' => request()->input('branch_id'),
                    'start_time' => request()->input('start_time'),
                    'end_time' => request()->input('end_time'),
                    'start_date' => request()->input('start_date'),
                    'end_date' => request()->input('end_date'),
                    'message' => request()->input('message'),
                ]);
    
                return redirect()->route('announcement.index')
                ->with('success','Announcement Created Successfully');
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request){
        
        $data['announcement'] = Announcement::find($id);
        $data['branches'] = Branch::get();
        return view('backend/announcement/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
   
     public function update($id, Request $request){

        $validator = Validator::make($request->all(), [
          
            'branch_id' => 'required',
            'start_time' =>  'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }

       $announcement = Announcement::find($id);
   
       $announcement->update([
        'user_id' => Auth::id(),
        'branch_id' => request()->input('branch_id'),
        'start_time' => request()->input('start_time'),
        'end_time' => request()->input('end_time'),
        'start_date' => request()->input('start_date'),
        'end_date' => request()->input('end_date'),
        'message' => request()->input('message'),
    ]);

    return redirect()->route('announcement.index')
    ->with('success','Announcement updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $announcement = Announcement::find($id);
        $announcement->delete();
        return redirect()->back()->with('success','Announcement Deleted successfully');
    }
}
