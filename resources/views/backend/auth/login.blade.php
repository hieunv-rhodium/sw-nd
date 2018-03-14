<!DOCTYPE html>
<html lang="en">
<head>

    @include('backend.layouts.meta')

    <link rel="icon" href="../../favicon.ico"/>

    @yield('title')

    @include('backend.layouts.css')

    @yield('css')

</head>

<body role="document" class="bg_login">

    <div class="container theme-showcase" role="main">

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <div class="text-center">
                        <img class="rounded mx-auto d-block" width="120" src="/imgs/login/user.png" />
                    </div>

                    <div class="text-center triangle-top">

                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><h1>Member Login</h1></div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email"
                                                placeholder="Nhập địa chỉ Email"
                                                value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control"
                                          placeholder="Nhập mật khẩu" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-left">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary col-md-12">
                                            Đăng nhập
                                        </button>

                                        <a class="btn btn-link col-md-12" href="{{ url('/password/reset') }}">
                                            Quên mật khẩu?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- /container -->

    @include('backend.layouts.scripts')

    @yield('scripts')

</body>

</html>