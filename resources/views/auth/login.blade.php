<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Rapor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin') }}/assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="content">
                        <div class="left">
                            <div class="header">
                                <div class="logo text-center"></div>
                                <p class="lead">LOGIN</p>
                            </div>
                            <form class="form-auth-small" action="/postlogin" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="signin-email" value=""
                                        placeholder="Email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password"
                                        value="" placeholder="Password" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                            <a href="{{url('/daftar_sekolah')}}" style="float: right;">registrasi</a>
                        </div>
                        <div class="right">
                            <div class="overlay"></div>
                            <div class="content text">
                                <div class="logo text-center"><img src="{{ asset('admin') }}/assets/img/sekolah.png"
                                        width="300px" height="300px">
                                    <h1 class="heading">SISTEM ADMINISTRASI SEKOLAH DASAR</h1>
                                    <p>Sadabuan Coding</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
</body>

</html>