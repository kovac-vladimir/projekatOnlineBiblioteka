<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PovezController extends Controller
{
    public function index(){
      $povezi=DB::table('povez')->get();
      return view("povez.index",["povezi"=>$povezi]);
    }

    public function show($id){
      $povez=DB::table('povez')
               ->where('Id',$id)
               ->first();
      return view('povez.show',['po'=>$povez]);

    }
    public function update(Request $request){
         $request->validate([
          'nazivPovezEdit'=>'required'
         ]);
         $povez=DB::table('povez')
                  ->where('Id',$request->input('id'))
                  ->update([
                   'Naziv'=>$request->input('nazivPovezEdit')
                  ]);
        if($povez){
          return redirect()->route('povez.index')->with('success','Povez je uspješno ažuriran');
        }else{
          return redirect()->route('povez.index')->with('fail','Povez nije uspješno ažuriran');
        }
    }
    public function addPovez(){

    return view('povez.create');
        
    }

    public function savePovez(Request $request){
      $request->validate([
        'nazivPovez'=>'required'
      ]);
      $povez=DB::table('povez')
               ->insert([
                 'Naziv'=>$request->input('nazivPovez')
               ]);
               if($povez){
                return redirect()->route('povez.index')->with('success','Povez je uspješno dodat');
               }else{
                 return redirect()->route('povez.index')->with('fail','Povez nije uspješno dodat');
               }
    }

    public function destroy($id){
      $povez=DB::table('povez')
             ->where('Id',$id)
             ->delete();
             if($povez){
      return redirect()->route('povez.index')->with("success","Povez je uspješno izbrisan");
    }else{
      return redirect()->route('povez.index')->with("fail","Povez nije uspješno izbrisan");
    }
  }
}
