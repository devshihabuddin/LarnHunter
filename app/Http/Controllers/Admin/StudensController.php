<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->join('classes','students.class_id','classes.id')->get();
       // dd($students);
        return view('Student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = DB::table('classes')->get();
        return view('Student.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated      =$request->validate([
            'name'      => 'required',
            'class_id'  => 'required',
            'phone'     => 'required',
            'email'     => 'required|email'
        ]);

        $data = array(
            'name' =>$request->name,
            'class_id'=> $request->class_id,
            'phone'  => $request->phone,
            'email'  => $request->email
        );
        $status = DB::table('students')->insert($data);
        return redirect()->route('students.index');
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
        $classes = DB::table('classes')->get();
        $student = DB::table('students')->where('id',$id)->first();
        return view('Student.edit',compact('classes','student'));
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
        $validated = $request->validate([
            'name'      => 'required',
            'class_id'  => 'required',
            'phone'     => 'required',
            'email'     => 'required|email'
        ]);

        $data = array(
            'name'      => $request->name,
            'class_id'  => $request->class_id,
            'phone'     => $request->phone,
            'email'     => $request->email
        );
        $status = DB::table('students')->where('id',$id)->update($data);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','successfully deleted');
    }
}
