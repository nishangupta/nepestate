<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyApplication;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'telephone' => 'required|min:10',
            'message' => 'required|min:6'
        ]);

        $propertyApplication = new PropertyApplication;
        $propertyApplication->property_id = $request->property_id;
        $propertyApplication->name = $request->name;
        $propertyApplication->email = $request->email;
        $propertyApplication->telephone = $request->telephone;
        $propertyApplication->message = $request->message;
        if ($propertyApplication->save()) {
            Alert::toast('Your application has been sent!', 'success');
        } else {
            Alert::toast('Failed to send your appication!', 'warning');
        }
        return redirect()->back();
    }
}
