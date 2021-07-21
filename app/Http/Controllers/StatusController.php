<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:status-list|status-create|status-edit|status-delete', ['only' => ['index','show']]);
         $this->middleware('permission:status-create', ['only' => ['create','store']]);
         $this->middleware('permission:status-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:status-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::all();
        return view('status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],    
        ]);
        Status::create($request->all());
     
        return redirect()->route('status.index')
                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = Status::find($id);
        return view('status.show',compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        
        return view('status.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,status $status)
    {
        
        
        
        $request->validate([
            'name' => 'required'
        ]);
  
        $input = $request->all();
          
        $status->update($input);
    
        return redirect()->route('status.index')
                        ->with('success','Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Status::find($id)->delete();
        return redirect()->route('status.index')
                        ->with('success','Status deleted successfully');
    }
}
