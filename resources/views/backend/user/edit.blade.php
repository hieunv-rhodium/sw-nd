@extends('backend.layouts.master')

@section('title')

    <title>Edit a User</title>

@endsection

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Control panel</small>
      </h1>

    @if(Auth::user()->isAdmin())

      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href='/user'>Users</a></li>
        <li><a href='/user/{{ $user->id }}'>{{ $user->name }}</a></li>
      </ol>

    @else

        <ol class='breadcrumb'>
            <li><a href='/'><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href='/user/{{ $user->id }}'>{{ $user->name }}</a></li>
        </ol>

    @endif

    </section>

    <!-- Main content -->
    <section class="content">
        
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


        <form class="form" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/user/'. $user->id) }}">

            <input type="hidden" name="_method" value="patch">

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

                <label class="control-label">Email</label>

                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />

                @if ($errors->has('email'))

                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>

                @endif
            </div>


            <!-- is_admin Form Input -->

            <div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">

                <label class="control-label">Is Admin?</label>


                <select class="form-control" id="is_admin" name="is_admin">
                    <option value="{{ $user->is_admin }}">{{ $user->showAdminStatusOf($user) }}</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>


                @if ($errors->has('is_admin'))

                    <span class="help-block">
                        <strong>{{ $errors->first('is_admin') }}</strong>
                    </span>

                @endif

            </div>

            <div class="form-group{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                <label class="control-label">Is subscribed?</label>

                <select class="form-control" id="is_subscribed" name="is_subscribed">
                    <option value="{{ $user->is_subscribed }}">{{ $user->showNewsletterStatusOf($user) }}</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                @if ($errors->has('is_subscribed'))

                    <span class="help-block">
                        <strong>{{ $errors->first('is_subscribed') }}</strong>
                    </span>

                @endif
            </div>

            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">

                <label class="control-label">Status ID (7 or 10)</label>

                <input type="text" class="form-control" name="status_id" value="{{ $user->status_id }}" />

                @if ($errors->has('status_id'))

                    <span class="help-block">
                        <strong>{{ $errors->first('status_id') }}</strong>
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

@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x){
            
                return true;
                
            } else {
           
                return false;
                
            }
        }
    </script>
@endsection