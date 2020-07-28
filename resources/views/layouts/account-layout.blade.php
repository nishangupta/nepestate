{{-- extending from app layouts  --}}
@extends('layouts.app')
@section('layout-holder')
    @include('inc.navbar')
    @yield('content')
@endsection