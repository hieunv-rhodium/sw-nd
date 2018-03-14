@extends('backend.layouts.master')

@section('title')

    <title>Profile</title>

@endsection

@section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Control panel</small>
      </h1>

    @if(Auth::user()->isAdmin())

        <ol class='breadcrumb'>
            <li><a href='/admin'><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href='/profile'>Profiles</a></li>
            <li><a href='/profile/create'></a>Create</li>
        </ol>

    @else

        <ol class='breadcrumb'>
            <li><a href='/'><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href='/profile/create'></a>Create</li>
        </ol>

    @endif

    </section>

    <!-- Main content -->
    <section class="content">

    <h1>{{ $profile->fullName() }}</h1>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->
        <table class="table table-striped">
        <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Job</th>
                <th>Birthdate</th>
                @if(Auth::user()->adminOrCurrentUserOwns($profile))
                    <th>Edit</th>
                @endif
                <th>Delete</th>

            </tr>
         </thead>

         <tbody>
            <tr>
                <td>{{ $profile->id }} </td>
                <td> <a href="/profile/{{ $profile->id }}/edit">
                        {{ $profile->fullName() }}</a></td>
                <td>{{ $profile->showGender($profile->gender) }}</td>
                <td>{{ $profile->job }} </td>
                <td>{{ $profile->birthdate->format('m-d-Y') }}</td>

                @if(Auth::user()->adminOrCurrentUserOwns($profile))

                <td> <a href="/profile/{{ $profile->id }}/edit">

                     <button type="button" class="btn btn-success">Edit</button></a>
                            
                </td>

                @endif

                <td>
                    <div class="form-group">

                        <form class="form" role="form" method="POST" action="{{ url('/profile/'. $profile->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            
                                   {{ csrf_field() }}

                            <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>
                    </div>
                </td>

            </tr>
            
        </tbody>
        </table>
        
    </div>

    </section>
    
@endsection
@section('scripts')

    <script>
    
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            return x;
        }
        
    </script>
    
@endsection