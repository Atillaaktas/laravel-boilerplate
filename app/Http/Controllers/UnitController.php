<?php

namespace App\Http\Controllers;


use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use DataTables;

class UnitController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:unit-list|unit-create|unit-edit|unit-delete', ['only' => ['index','show']]);
         $this->middleware('permission:unit-create', ['only' => ['create','store']]);
         $this->middleware('permission:unit-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:unit-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Unit::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = "<a href='/units/$row->id' class='edit btn btn-info btn-sm'>Göster</a>";
                           $btn = $btn."<a href='/units/$row->id/edit' class='edit btn btn-info btn-sm'>Edit</a>";
                           $btn = $btn." <form action='{{ route('unit.destroy',$row->id) }}' method='POST'>
                           @csrf
                           @method('DELETE')
                           @can('unit-delete')
                           <button type='submit' class='btn btn-danger'>Sil</button>
                           @endcan
                       </form>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('units.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
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
        Unit::create($request->all());
     
        return redirect()->route('units.index')
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
        $unit = Unit::find($id);
        return view('units.show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        
        return view('units.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,unit $unit)
    {
        
        
        
        $request->validate([
            'name' => 'required'
        ]);
  
        $input = $request->all();
          
        $unit->update($input);
    
        return redirect()->route('units.index')
                        ->with('success','Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit::find($id)->delete();
        return redirect()->route('units.index')
                        ->with('success','Unit deleted successfully');
    }
}
