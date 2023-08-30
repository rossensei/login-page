<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BandController extends Controller
{
    public function  index() {
        return inertia('Bands/Index', [
            'bands' => Band::orderBy('name')->get()
        ]);
    }

    public function search($searchKey) {
        return inertia('Bands/Index', [
            'bands' => Band::where('name', 'like', "%$searchKey%")->get()
        ]);
    }

    public function create() {
        return inertia('Bands/Create');
    }

    public function edit(Band $band)
    {
        return inertia('Bands/Edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'date' => 'date|required',
            'address' => 'string|required',
            'email' => 'string',
        ]);

        $band->update($request->all());

        $request->session()->flash('flash.banner', 'Band details updated.');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/bands/'.$band->id);
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'date' => 'date|required',
            'address' => 'string|required',
            'email' => 'string',
        ]);

        $fileName = null;

        //process image
        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/product_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        Band::create($fields);

        return redirect('/bands');
    }

    public function show(Band $band) {

        $user = auth()->user();
        return inertia('Bands/Show',[
            'band' => $band,
            'user' => $user
        ]);
    }

    public function toggle(Band $band) {
        $band->enabled = !$band->enabled;
        $band->save();
        return back();
    }

    public function destroy(Band $band){
        $band->delete();
        return redirect('/bands')->with('Info', 'Item has just been deleted!.');
        }

    public function email(Band $band){
        Mail::send('email.roa', ['band'=>$band], function($message) use ($band) {
            $message->to($band->email);
            $message->subject('Request for Application');

        });
        return back();
    }
}
