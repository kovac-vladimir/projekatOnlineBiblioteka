<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
class PismoController extends Controller
{
    
    public function index(){
        $pisma=DB::table('pismo')->get();
        return view('pismo.index',["pisma"=>$pisma]);
    }

    public function show($id){
        $pismo=DB::table('pismo')->where('Id',$id)->first();
        return view('pismo.show',['pismo'=>$pismo]);
    }

    public function update(Request $request){
        $request->validate([
         'nazivPismoEdit'=>'required'
        ]);
        $pismo=DB::table('pismo')
                  ->where('Id',$request->id)->update([
                  'Naziv'=>$request->nazivPismoEdit
                   ]);
        if($pismo){
          return redirect()->route('pismo.index')->with('success','Pismo je uspješno ažurirano');
           }else{
          return redirect()->route('pismo.index')->with('fail','Pismo nije uspješno ažurirano');
           }  
    }
    public function addPismo(){
      return view('pismo.create');
    }

    public function savePismo(Request $request){
          $request->validate([
           'nazivPismo'=>'required'
          ]);
         $pismo=DB::table('pismo')
                  ->insert([
                   'Naziv'=>$request->input('nazivPismo')  
                  ]);
          if($pismo){
            return redirect()->route('pismo.index')->with('success','Pismo je uspješno dodato');
          }else{
            return redirect()->route('pismo.all')->with('fail','Pismo nije uspješno dodato');
          }
         
    }


    public function destroy($id){
        $pismo=DB::table("pismo")
              ->where("Id",$id)
              ->delete();
              if($pismo){
                return redirect()->route('pismo.index')->with("success","Pismo je uspješno obrisano");
              }else{
                return redirect()->route('pismo.index')->with("fail","Pismo nije uspješno obrisano");
              }
        
    }
}
