@extends('backend.layouts.master')

@section('title')

    <title>Edit a Profile</title>

@endsection

@section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Control panel</small>
      </h1>
    @if(Auth::user()->isAdmin())

        <ol class='breadcrumb'>
            <li><a href='/admin'><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href='/profile'>Profiles</a></li>
            <li><a href='/profile/{{ $profile->id }}'>{{ $profile->fullName() }}</a></li>
        </ol>

    @else

        <ol class='breadcrumb'>
            <li><a href='/admin'><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href='/profile/{{ $profile->id }}'>{{ $profile->fullName() }}</a></li>
        </ol>

    @endif

    </section>

    <!-- Main content -->
    <section class="content">

    <form class="form" role="form" method="POST" action="{{ url('/profile/'. $profile->id) }}">

        <input type="hidden" name="_method" value="patch">

    {{ csrf_field() }}

    <!-- first_name Form Input -->

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

            <label class="control-label">First Name</label>

            <input type="text" class="form-control" name="first_name" value="{{ $profile->first_name }}">

            @if ($errors->has('first_name'))

                <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- last_name Form Input -->

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

            <label class="control-label">Last Name</label>

            <input type="text" class="form-control" name="last_name" value="{{  $profile->last_name }}">

            @if ($errors->has('last_name'))

                <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- birthdate Form Input -->

        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">

            <label class="control-label">Birthdate</label>

                <div>

                {{  Form::date('birthdate', $profile->birthdate) }}

                </div>


            @if ($errors->has('birthdate'))

                <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
                </span>

            @endif

        </div>

        <!-- Gender Form Input -->

        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

            <label class="control-label">Gender</label>


            <select class="form-control" id="gender" name="gender">
                <option value="{{ $profile->gender }}">{{ $profile->showGender($profile->gender) }}</option>
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>


            @if ($errors->has('gender'))

                <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
                </span>

            @endif

        </div>

        <!-- job Form Input -->

        <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">

            <label class="control-label">Job</label>

            <input type="text" class="form-control" name="job" value="{{  $profile->job }}">

            @if ($errors->has('job'))

                <span class="help-block">
                <strong>{{ $errors->first('job') }}</strong>
                </span>

            @endif

        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Update

            </button>

        </div>

    </form>

    </section>
    
@endsection