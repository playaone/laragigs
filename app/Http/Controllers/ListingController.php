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

        if($request->hasFile('logo')){
            $form['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($form);

        return redirect('/')->with('message', 'Listing added');
    }

    // update listing
    public function update(Request $request, Listing $listing){
        $form = $request->validate([
            'title'=> 'required',
            'company'=> ['required'],
            'location'=> 'required',
            'website'=> 'required',
            'email'=> ['required', 'email'],
            'tags'=> 'required',
            'description'=> 'required'
        ]);

        if($request->hasFile('logo')){
            $form['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($form);

        return back()->with('message', 'Listing updated');
    }

    // edit
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    // delete listing
    public function delete(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted');
    }

    // restore
    public function restore(Request $request, Listing $listing){}
}
