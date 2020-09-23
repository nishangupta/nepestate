{{-- extending from app layouts  --}}
@extends('layouts.app')
@section('layout-holder')
    @include('inc.navbar')
    <main>
        <div class="account-view">
        {{-- Account Navigation Sidebar here --}}
        @include('inc.account-nav')
        @yield('content')
        </div>
    </main>
@endsection