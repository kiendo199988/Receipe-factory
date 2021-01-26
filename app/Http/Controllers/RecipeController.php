<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index(){
     $recipe = Recipe::all();
     return view('recipes.index', compact('recipe'));
    }
    public function create(){
        return view('recipes.create');

    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required|string|max:255',
            'body'=>'required',
            'image' => 'image'
          ]);
          $image = $request->file('image');
          $new_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('images'), $new_name);
          
          $recipe = Recipe::create([
            'title'     => $request->input('title'),
            'body'      => $request->input('body'),
            'image'    => $new_name,
            
            'user_id'   => auth()->user()->id
        ]);
        $recipe->save(); 
        return redirect()->route('recipes.index')->with('success','recipe created success');
    }


    public function show($id){
        $recipe = Recipe::find($id);
        return view('Recipes.show',compact('recipe'));
    }


    public function edit($id){
        $recipe = Recipe::find($id);
        return view('recipes.edit',compact('recipe'));
    }



    public function update(Request $request, $id){
        // $recipe = Recipe::find($id);
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($image != ''){
        
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image'=> 'image'
          ]);
          $image_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('images'), $image_name);
        }
        else{
            $request->validate([
                'title' => 'required',
                'body' => 'required'
              ]);
        }
        //   Recipe::find($id)->update($request->all());
        $input_data = array(
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=> $image_name
        );
  
        Recipe::whereId($id)->update($input_data);
        return redirect()->route('recipes.index')->with('success','recipe updated success');
    }



    public function destroy($id){
        Recipe::find($id)->delete();
        return redirect()->route('recipes.index')->with('success','Recipe deleted success');
    }

}
