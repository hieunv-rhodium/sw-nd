@extends('backend.layouts.master')

@section('title')

    <title>Profiles</title>

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profiles
        <small>Control panel</small>
      </h1>

        <ol class='breadcrumb'>
            <li><a href='/admin'><i class="fa fa-dashboard"></i>Home</a></li>
            <li class='active'>Profiles</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        
    @if($profiles->count() > 0)
        
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">

                        <table class="table table-hover table-bordered table-striped">

                            <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Job</th>
                            <th>Birthdate</th>
                            </thead>

                            <tbody>

                            @foreach($profiles as $profile)

                                <tr>
                                    <td>{{ $profile->id }}</td>
                                    <td><a href="/profile/{{ $profile->id }}">{{ $profile->fullName() }}</a></td>
                                    <td>{{ $profile->showGender($profile->gender) }}</td>
                                    <td>{{ $profile->job }}</td>
                                    <td>{{ $profile->birthdate->format('m-d-Y') }}</td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                        @else

                            <div>Sorry, no profiles</div>

                        @endif

                        {{ $profiles->links() }}

                    </div>
                </section>
            </div>
        </div>

    </section>

@endsection