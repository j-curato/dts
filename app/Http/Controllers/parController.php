<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pars;
use PDF;
use Redirect;
use Yajra\Datatables\Datatables;



class parController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $data = pars::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){

                    

                           return '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit"class="edit btn btn-primary btn-sm editPar">Print CTS</a>';
                       })
                            


                           //  $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-info btn-sm Trello Link">Tre l l o</a>';
                           //   $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm Print">P r i n t</a>';
                           // return $btn;

                    ->addColumn('checkbox', '<input type="checkbox" name="student_checkbox[]" class="student_checkbox" value="{{$id}}" />')
                    
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }


      
        return view('parAjax',compact('pars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        pars::updateOrCreate(['id' => $request->par_id],
                ['log_ref_number' => $request->log_ref_number, 'date_received' => $request->date_received,'type_of_transmittal' => $request->type_of_transmittal,'origin' => $request->origin,'subject' => $request->subject,'rds_instruction' => $request->rds_instruction, 'route_to' => $request->route_to,'date_released' => $request->date_released,'action' => $request->action, 'year' =>$request->year]);        
   
        
        return response()->json(['success'=>'Data saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $par = pars::find($id);
        return response()->json($par);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        pars::find($id)->delete();
         return response()->json(['success'=>'Data deleted successfully.']);
    }
    Public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
