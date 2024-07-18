<?php

namespace App\Http\Controllers;

use App\Models\Listing;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view("listings.index", ['listings'=> Listing::latest()->filter(request(['tag', 'search']))->paginate(10)]);
    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show', ['listing' => $listing]);
    }

    public function create(){
        return view('listings.create');
    }

    // store
    public function store(Request $request){
        $form = $request->validate([
            'title'=> 'required',
            'company'=> ['required', Rule::unique("listings", "company")],
            'location'=> 'required',
            'website'=> 'required',
            'email'=> ['required', 'email'],
            'tags'=> 'required',
            'description'=> 'required'
        ]);

        Listing::create($form);

        return redirect('/listings/create')->with('message', 'Listing added successfully');
    }

    // edit
    public function edit(Listing $listing){}

    // update
    public function update(Request $request, Listing $listing){}

    // destroy
    public function destroy(Listing $listing){}

    // destroy
    public function restore(Request $request, Listing $listing){}
}
