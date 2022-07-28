<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LeadCollection;

class LeadGeneration extends Controller
{
    public function index(){

      $read = LeadCollection::all();
       
      return  view('index', ['data' => $read]);
    }


    public function create(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'picture' => 'required|mimes:png,jpg'
        ]);

      $data = new LeadCollection();

      $data->name = $request->name;
      $data->phone = $request->phone;
      $data->email = $request->email;

    if($request->hasFile('picture')){

      $file = $request->picture;
      if (file_exists(public_path('uploads/'.$file->getClientOriginalName())))
      {
          $fn = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
          $ex = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

          $file_name = $fn.Str::random(5).$ex;

          $file->move(public_path('uploads/'), $file_name);
      }else{

            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $file_name);
      }

      $data->picture = $file_name;
    }
      $data->save();

      return redirect()->back()->with('success', 'Data has been saved successfully!');

    }


    public function edit($id){

        $read = LeadCollection::findOrFail(decrypt($id));

      return view('edit', ['data' => $read]);


    }


    public function update(Request $request,$id){

        $data = LeadCollection::findOrFail(decrypt($id));

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
  
      if($request->hasFile('picture')){
  
        $file = $request->picture;
        if (file_exists(public_path('uploads/'.$file->getClientOriginalName())))
        {
            $fn = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ex = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
  
            $file_name = $fn.Str::random(5).$ex;
  
            $file->move(public_path('uploads/'), $file_name);
        }else{
  
              $file_name = $file->getClientOriginalName();
              $file->move(public_path('uploads/'), $file_name);
        }
  
        $data->picture = $file_name;
      }
        $data->save();
  
        return redirect()->back()->with('success', 'Data has been Updated successfully!');
  

    }


    public function delete($id){

        LeadCollection::destroy(decrypt($id));

        return redirect()->back()->with('success', "Data has been Deleted!");

    }
}
