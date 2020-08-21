<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use DataTables;


class UserPropertyController extends Controller
{
  public function index()
  {
    if (request()->ajax()) {
      $data = Property::select(['id', 'name',  'created_at', 'onSale', 'address'])
        ->where('user_id', '<>', auth()->user()->id)
        ->get();
      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('actions', function ($row) {
          $btns = '<a class="btn btn-info  btn-sm btn-sm-block" href="/account/property-listings/' . $row->id . '" ><i class="fas fa-eye"></i> View</a>
          <a class="btn btn-primary btn-sm btn-sm-block" href="/account/property-listings/' . $row->id . '/edit"><i class="fas fa-pen-square"></i> Edit</a>
          <button class="btn btn-danger btn-sm btn-sm-block" onclick="tableDelete(' . $row->id . ')" ><i class="fas fa-trash-alt"></i> Delete</button>';
          return $btns;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
    return view('real-estate.account.property-listings');
  }

  public function show(Request $request, Property $property)
  {
    return redirect()->route('property.show', ['property' => $property]);
  }

  public function edit(Property $property)
  {
    return view('real-estate.account.property-edit', compact('property'));
  }

  public function destroy(Property $property)
  {
    if ($property->user_id === auth()->user()->id) {
      $property->delete();
      return ['data' => true, 'msg' => 'Record deleted!'];
    } else {
      return ['data' => false, 'msg' => 'Failed! Something went wrong.'];
    }
  }
}
