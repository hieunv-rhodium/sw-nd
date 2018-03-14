@extends('backend.layouts.master')

@section('title')

    <title>Edit Your User Settings</title>

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Setting
            <small>Control panel</small>
        </h1>

        <ol class='breadcrumb'>
            <li><a href='/admin'><i class="fa fa-dashboard"></i>Home</a></li>
            <li>Settings</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="pull-right">

            <a href="{{ url('/password/reset') }}">

                <button type="button" class="btn btn-primary">

                    Reset Password

                </button>

            </a>

        </div>


         <!-- image name no input -->
        <div>

            <div class="control-label">
               Image Name:
            </div>

            <h4>{{$user->avatar}}</h4>

        </div>

        <div class="control-label">Thumbnail:</div>
        <!-- image thumbnail -->
        <div class="margin-bott-20">

            <img width="100" src="/imgs/avatar/{{ $user->avatar }}">

        </div>


        <div class="form-group">

            <form class="form" role="form" method="POST" action="{{ url('/user/'. $user->id .'/delete-file') }}">
                <input type="hidden" name="_method" value="post">
                {{ csrf_field() }}

                <input class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" type="submit" value="X">

            </form>

        </div>


        <form class="form" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/settings') }}">

        {{ csrf_field() }}

        <!-- name Form Input -->

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <label class="control-label">User Name</label>

                <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                @if ($errors->has('name'))

                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>

                @endif

            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>

                <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- is_subscribed Form Input -->

            <div class="form-group{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                <label class="control-label">Is Subscribed?</label>


                <select class="form-control" id="is_subscribed" name="is_subscribed">
                    <option value="{{ $user->is_subscribed }}">{{ $user->is_subscribed == 1 ? 'Yes' : 'No' }}</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>


                @if ($errors->has('is_subscribed'))

                <span class="help-block">
                <strong>{{ $errors->first('is_subscribed') }}</strong>
                </span>

                @endif

            </div>

            <div class="form-group">

                <label class="control-label">Avatar</label>

                <input type="file" class="form-control" name="avatar" value="{{ $user->avatar }}" />

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-primary btn-lg">

                    Update

                </button>

            </div>

        </form>

    </section>

@endsection