<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use DataTables;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserPropertyController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    if (request()->ajax()) {
      $data = Property::select(['id', 'name',  'created_at', 'onSale', 'img_url'])
        ->where('user_id', auth()->user()->id)
        ->get();
      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('image', function ($row) {
          return '<img class="datatable-img" src="' . asset($row->img_url) . '" alt="Listings image" />';
        })
        ->addColumn('created_at', function ($row) {
          return date('d/m/Y h:i A', strtotime($row->created_at));
        })
        ->addColumn('actions', function ($row) {
          $btns = '<a class="btn btn-info  btn-sm btn-block btn-sm-block" href="' . $row->path() . '" ><i class="fas fa-eye"></i> View</a>
          <a class="btn btn-primary btn-sm btn-block btn-sm-block" href="/account/property-listings/' . $row->id . '/edit"><i class="fas fa-pen-square"></i> Edit</a>
          <button class="btn btn-danger btn-block btn-sm btn-sm-block" onclick="tableDelete(' . $row->id . ')" ><i class="fas fa-trash-alt"></i> Delete</button>';
          return $btns;
        })
        ->rawColumns(['actions', 'image', 'created_at'])
        ->make(true);
    }
    return view('real-estate.account.property-listings');
  }

  public function create()
  {
    return view('real-estate.account.property-create');
  }

  public function show(Request $request, Property $property)
  {
    return redirect()->route('property.show', ['property' => $property]);
  }

  public function store(Request $request)
  {
    $this->propertyValidate($request);
    $property = new Property;
    if ($this->propertySave($request, $property)) {
      return redirect()->route('user.propertyListings')->with('success', 'Property Added');
    } else {
      return redirect()->route('user.propertyListings')->with('warning', 'Something went wrong');
    }
  }

  public function edit(Property $property)
  {
    return view('real-estate.account.property-edit', compact('property'));
  }

  public function update(Request $request, Property $property)
  {
    $this->propertyValidate($request, ['img' => 'sometimes|image|max:5000']);

    if ($property->user_id === auth()->user()->id) {
      if ($this->propertySave($request, $property)) {
        Alert::toast('Listing successfully updated!', 'success');
      } else {
        Alert::toast('Request aborted!', 'warning');
      }
    } else {
      Alert::toast('Edit aborted!', 'error');
    }

    return redirect()->back();
  }

  public function destroy(Property $property)
  {
    if ($property->user_id == auth()->user()->id) {
      if ($property->delete()) {
        return ['data' => true, 'msg' => 'Record deleted!'];
      } else {
        return ['data' => false, 'msg' => 'Failed! Something went wrong.'];
      }
    } else {
      return ['data' => false, 'msg' => 'Failed! Something went wrong.'];
    }
  }

  protected function propertyValidate($req, $merge = [])
  {
    return $req->validate(array_merge([
      'name' => 'required|min:3',
      'address' => 'required|min:3',
      'price' => 'required|integer',
      'negotiable' => 'boolean|sometimes',
      'bed' => 'required|integer',
      'bath' => 'required|integer',
      'area' => 'required|integer',
      'description' => 'required|min:5',
      'img' => 'required|image|max:5000',
      'agent' => 'required|min:3',
      'telephone' => 'required|min:10',
      'email' => 'required|email',
    ], $merge));
  }
  protected function propertySave($request, $property)
  {
    $property->name = $request->name;
    $property->address = $request->address;
    $property->price = $request->price;
    $property->negotiable = $request->negotiable ? 1 : 0;
    $property->bed = $request->bed;
    $property->bath = $request->bath;
    $property->area = $request->area;
    $property->description = $request->description;
    $property->agent = $request->agent;
    $property->telephone = $request->telephone;
    $property->email = $request->email;
    $property->user_id = auth()->user()->id;

    if ($request->hasFile('img')) {
      $fileName = $request->file('img')->getClientOriginalName();
      $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
      $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
      $fileNameToStore = $actualFileName . time() . '.' . $fileExtension;
      $path = $request->file('img')->storeAs('public/properties', $fileNameToStore);

      if ($property->img_url) {
        Storage::delete('public/properties/' . basename($property->img_url));
      }
      $property->img_url = 'storage/properties/' . $fileNameToStore;
    }
    if ($property->save()) {
      return true;
    } else {
      return false;
    }
  }
}
