<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FormatController extends Controller
{
    public function index(){
      $formati=DB::table('format')->get();
      return view('format.index',["formati"=>$formati]);
    }
    public function show($id){
      $format=DB::table('format')
                ->where('Id',$id)
                ->first();
      return view('format.show',['format'=>$format]);
    }
    public function update(Request $request){
          $request->validate([
            'nazivFormatEdit'=>'required'
          ]);
          $format=DB::table('format')
                    ->where('Id',$request->input('id'))
                    ->update([
                    'Naziv'=>$request->input('nazivFormatEdit')
                    ]);
          if($format){
                return redirect()->route('format.index')->with('success','Format je uspješno ažuriran');      
              }else{
                return redirect()->route('format.index')->with('fail','Format je neuspješno ažuriran');
              }
    }
    public function addFormat(){
      return view('format.create');
    }
    public function saveFormat(Request $request){
       $request->validate([
       'nazivFormat'=>'required'
       ]);
       $format=DB::table('format')
         ->insert([
         'Naziv'=>$request->input('nazivFormat')
         ]);
         if($format){
          return redirect()->route('format.index')->with('success','Format je uspješno dodat');
         }else{
           return redirect()->route('format.index')->with('fail','Format nije uspješno dodat');
         }
    }

    public function destroy($id){
      $format=DB::table('format')
              ->where('Id',$id)
              ->delete();
      return redirect()->route('format.index')->with("success","Format je uspješno izbrisan");
    }
}
