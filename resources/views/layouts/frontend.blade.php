<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>{{ config('sekolah.title') }}</title>

    <meta name="description" content="Pulseadmin - A clean, responsive HTML template">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/normalize-and-boilerplate.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/flexslider.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />

    <link href='http://fonts.googleapis.com/css?family=Bree+Serif|Pacifico' rel='stylesheet' type='text/css' />

    <script src="{{ asset('frontend') }}/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>

    <!-- start: off canvas area -->
    <aside class="off-canvas">
        <div class="row">
            <div class="columns col-17">
                <nav class="main-nav">
                    <ul>
                        <li><a class="current" href="index.html">Home</a></li>
                        <li><a href="reviews.html">Reviews</a></li>
                        <li><a href="buy-it-now.html">Buy it now</a></li>
                        <li><a href="help-desk.html">Help desk</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="columns col-12">
                <div class="social-links">
                    <a href="#" title="Like us on Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" title="Follow us on Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </aside>
    <!-- end: off canvas area -->

    <!-- start: ON canvas area -->
    <div class="on-canvas">
        <div class="canvas-overlay"></div>

        <header class="header">
            <div class="row max-inner">
                <div class="columns col-3">
                    <a href="#" class="toggle-off-canvas"><i class="fa fa-bars"></i></a>
                    <a href="index.html" class="logo">
                        <span class="highlight-color">Pulse</span>admin
                    </a>
                </div>
                <div class="columns col-7">
                    <nav class="main-nav">
                        <ul>
                            <li><a class="current" href="/">Home</a></li>
                            <li><a href="/register">Daftar</a></li>
                            <li><a href="/login">Login</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="columns col-2">
                    <div class="social-links">
                        <a href="#" title="Like us on Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" title="Follow us on Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>


        @yield('content')

        <footer class="footer">
            <div class="row">
                <div class="max-inner footer-content">
                    <div class="columns col-3">
                        <h3>Contact</h3>
                        <p>
                            Da Edoardo Foxtown Grille<br />
                            2203 Woodward Ave<br />
                            Detroit
                            <br /><br />
                            (43) 463 435 6344<br />
                            <a href="#">office@pulseadmin.com</a>
                        </p>
                    </div>
                    <div class="columns col-3">
                        <h3>Jobs</h3>
                        <ul>
                            <li><a href="#">Web designer</a></li>
                            <li><a href="#">PR specialist</a></li>
                            <li><a href="#">Developer</a></li>
                            <li><a href="#">UI/UX specialist</a></li>
                        </ul>
                    </div>
                    <div class="columns col-3">
                        <h3>Support</h3>
                        <p>
                            Voluptatem doloremque laudantium aperiam eaque.
                            <br /><br />
                            (43) 785 246 542<br />
                            <a href="#">support@pulseadmin.com</a>
                        </p>
                    </div>
                    <div class="columns col-3">
                        <h3>Newsletter</h3>
                        <form>
                            <input placeholder="Email Address..." type="text">
                            <input type="submit" value="Subscribe" class="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row copyright">
                <div class="max-inner">
                    <div class="row">
                        <div class="columns col-12">
                            <p>Copyright &copy; 2014 PulseAdmin. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.js"><\/script>')
    </script>

    <script src="{{ asset('frontend') }}/js/plugins.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src='//www.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>

</html>