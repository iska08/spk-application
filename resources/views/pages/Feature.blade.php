@extends('layouts.app')

@section('title')
    Course Featurepage
@endsection

@section('content-1')
@include('components.Feature.hero')
@endsection

{{-- @section('content-2')
@include('components.Home.sponsor')
@endsection --}}

@section('content-2')
@include('components.Feature.tools')
@endsection

{{-- @section('content-4')
@include('components.Home.trusted')
@endsection --}}

{{-- @section('content-5')
@include('components.Home.testimoni')
@endsection

@section('content-6')
@include('components.Home.designed')
@endsection

@section('content-7')
@include('components.Home.ask')
@endsection

@section('content-8')
@include('components.Home.startFree')
@endsection


 --}}
