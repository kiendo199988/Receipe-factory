<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;


class OverviewController extends Controller
{
    //
    public function index(){
        $recipe = Recipe::all();
        return view('overviews.overview', compact('recipe'));
       }
}
