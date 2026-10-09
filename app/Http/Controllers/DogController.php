<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{
    //searches for a dog by chipnumber and returns the dog.search view 
    public function search(Request $request)
    {
        $q = $request['q'];
        $dogs = Dog::where('chip_number', $q)->get();

        return view('dogs.search', compact('dogs', 'q'));
    }
}
