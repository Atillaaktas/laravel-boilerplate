<?php

namespace App\Http\Controllers;


use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use DataTables;


class TagController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:tag-list|tag-create|tag-edit|tag-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tag-create', ['only' => ['create','store']]);
         $this->middleware('permission:tag-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tag-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tag::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = "<a href='/tags/$row->id' class='edit btn btn-info btn-sm'>Göster</a>";
                           $btn = $btn."<a href='/tags/$row->id/edit' class='edit btn btn-info btn-sm'>Edit</a>";
                           $btn = $btn." <form action='{{ route('tag.destroy',$row->id) }}' method='POST'>
                           @csrf
                           @method('DELETE')
                           @can('tag-delete')
                           <button type='submit' class='btn btn-danger'>Sil</button>
                           @endcan
                       </form>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
        tag::create($request->all());
     
        return redirect()->route('tags.index')
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
        $tag = tag::find($id);
        return view('tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
        
        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,tag $tag)
    {
        
        
        
        $request->validate([
            'name' => 'required'
        ]);
  
        $input = $request->all();
          
        $tag->update($input);
    
        return redirect()->route('tags.index')
                        ->with('success','tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tag::find($id)->delete();
        return redirect()->route('tags.index')
                        ->with('success','tag deleted successfully');
    }
}
