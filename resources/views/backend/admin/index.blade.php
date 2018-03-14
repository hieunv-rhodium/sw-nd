@extends('backend.layouts.master')

@section('title')

    <title>The Admin Page</title>

    @endsection

@section('content')

    @include('backend.admin.grid')

@endsection