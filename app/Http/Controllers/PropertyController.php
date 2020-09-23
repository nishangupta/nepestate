<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
  public function index()
  {
    return view('real-estate.index');
  }

  public function search()
  {
    $searchInput = '%' . request()->property . '%';
    $properties = Property::where('name', 'like',  $searchInput)
      ->orWhere('address', 'like', $searchInput)
      ->whereNotNull('onSale')
      ->paginate(10);
    $searchedProperty = true;

    if ($properties->count() == 0) {
      $properties = Property::where('onSale', 1)->latest()->take(40)->paginate(10);
      $searchedProperty = false;
    }
    $paginator = $properties->render()->paginator;
    $elements = $properties->render()->elements[0];

    $bundle = [
      'properties' => $properties,
      'paginator' => $paginator,
      'elements' => $elements,
      'searchedProperty' => $searchedProperty
    ];

    return view('real-estate.property.list')->with($bundle);
  }


  public function priceChanger()
  {
    $keyword = request()->keyword;
    $searchInput = '%' . $keyword . '%';
    $properties = Property::where('name', 'like',  $searchInput)
      ->orWhere('address', 'like', $searchInput)
      ->whereNotNull('onSale');

    $searchedProperty = true;
    $priceChangeVal = request()->priceChangeVal;
    //1 for assending, 2 for descending, 0 for default
    if ($priceChangeVal === 1) {
      $properties = $properties->orderBy('price', 'asc')->paginate(10);
      dd($properties);
    } else if ($priceChangeVal === 2) {
      $properties = $properties->orderBy('price', 'desc')->paginate(10);
    } else {
      return redirect()->route('property.search', ['property' => $keyword]);
    }

    $paginator = $properties->render()->paginator;
    $elements = $properties->render()->elements[0];

    $bundle = [
      'properties' => $properties,
      'paginator' => $paginator,
      'elements' => $elements,
      'searchedProperty' => $searchedProperty
    ];

    return view('real-estate.property.list')->with($bundle);
  }

  public function list()
  {
    $properties = Property::where('onSale', 1)->latest()->take(50)->paginate(12);
    $searchedProperty = false;
    $paginator = $properties->render()->paginator;
    $elements = $properties->render()->elements[0];

    $bundle = [
      'properties' => $properties,
      'paginator' => $paginator,
      'elements' => $elements,
      'searchedProperty' => $searchedProperty
    ];

    return view('real-estate.property.list')->with($bundle);
  }

  public function show(Property $property)
  {
    $userCanLike = Property::where('id', '<>', $property->id)->latest()->take(4)->get();
    $property->userCanLike = $userCanLike;
    return view('real-estate.property.show', compact('property'));
  }

  public function buy()
  {
    return redirect()->route('property.list');
  }
  public function rent()
  {
    return view('real-estate.property.rent');
  }
  public function mortage()
  {
    return view('real-estate.property.mortage');
  }
}
