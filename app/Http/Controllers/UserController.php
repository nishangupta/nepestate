<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware();
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function accountLogin()
    {
        return view('real-estate.login');
    }
    public function accountIndex()
    {
        return view('real-estate.account-index');
    }
    public function accountRentalResume()
    {
        return view('real-estate.account-rental-resume');
    }
    public function savedHomes()
    {
        return view('real-estate.saved-homes');
    }
}
