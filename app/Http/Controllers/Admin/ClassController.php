<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    
    
    public function index()
    {
        
       $classes=DB::table('classes')->get();
      // dd($classes);
       return view('Class.index',compact('classes'));
    }

    public function create()
    {

        return view('Class.create');
    }

    public function store(Request $request){
        $classes = $request->all();
       // dd($classes);
       //$data= DB::table('classes')->insert($classes);
       $data = Classe::create($classes);
       //dd($data);
        return redirect()->route('class.index');
    }

    public function edit($id)
    {
        $data = Classe::find($id);
        //dd($data);
        return view('Class.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $class = Classe::find($id);

        $data = $request->all();
        $datas = $class->fill($data)->save();
         return redirect()->route('class.index');

    }

    public function destroy($id)
    {
        $data = Classe::find($id)->delete();
        return back();

    }
}
