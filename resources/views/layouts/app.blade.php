<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="padding-top:60px;">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest {{--
                        <li><a href="{{ route('login') }}">Login</a></li> --}} {{--
                        <li><a href="{{ route('register') }}">Register</a></li> --}} @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Bagian Content -->
    <div class="container clearfix">
        <div class="row row-offcanvas row-offcanvas-left ">
            <!--Bagian Kanan-->
            <div id="main-content" class="col-xs-12 col-sm-9 main pull-
            right">
                <div class="panel-body">
                    @if (Session::has('error'))
                    <div class="session-flash alert-danger">
                        {!!Session::get('error')!!}
                    </div>
                    @endif @if (Session::has('notice'))
                    <div class="session-flash alert-info">
                        {!!Session::get('notice')!!}
                    </div>
                    @endif
                    <div class="row">
                        <div class="form-group label-floating">
                            <label class="col-lg-2" for="keywords">Search
            Article</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="keywords" placeholder="Type search keywords">
                            </div>
                            <div class="col-lg-2">
                                <button id="search" class="btn btn-info btn-flat" type="button">
            Search
            </button>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <br />
                    <p>Sort articles by : <a id="id">ID &nbsp;<i id="ic-
            direction"></i></a></p>
                    <br />
                    <input id="direction" type="hidden" value="asc" />
                </div>
            </div>
        </div>
    </div>
    
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
    {{-- <script src="/js/material.js"></script>
    <script src="/js/ripples.js"></script> --}}
    {{-- <script src="https://unpkg.com/@material-ui/core/umd/material-ui.production.min.js"
    crossorigin="anonymous"></script> --}}
   
    {{-- <script>
        $.material.init();
        $.material.checkbox();
    </script> --}}

    <!-- Handle ajax link in header menu -->
    <script>
        $('#article_link').click(function(e){
            e.preventDefault();
            $.ajax({
                url:'/articles',
                type:"GET",
                dataType: "json",
                success: function (data){
                    $('#data-content').html(data['view']);
                },
                error: function (xhr, status){
                    console.log(xhr.error);
                }
            });
        });
    </script>

    <!-- This for handle ajax pagination -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(e) {
                get_page($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });
        function get_page(page) {
            $.ajax({
                url : '/articles?page=' + page,
                type : 'GET',
                dataType : 'json',
                data : {
                    'keywords' : $('#keywords').val(),
                    'direction' : $('#direction').val()
                },
                success : function(data) {
                    $('#data-content').html(data['view']);
                    $('#keywords').val(data['keywords']);
                    $('#direction').val(data['direction']);
                },
                error : function(xhr, status, error) {
                    console.log(xhr.error + "\n ERROR STATUS : " + status + "\n"
                    + error);
                },  
                complete : function() {
                    alreadyloading = false;
                }
            });
        }
    </script>
    <!-- This for handle ajax search -->
    <script>
        $('#search').on('keyup', function(){
            $.ajax({
                url : '/articles',
                type : 'GET',
                dataType : 'json',
                data : {
                    'keywords' : $('#keywords').val(),
                    'direction' : $('#direction').val()
                },
                success : function(data) {
                    $('#data-content').html(data['view']);
                    $('#keywords').val(data['keywords']);
                    $('#direction').val(data['direction']);
                },
                error : function(xhr, status) {
                    console.log(xhr.error + " ERROR STATUS : " + status);
                },
                complete : function() {
                    alreadyloading = false;
                }
            });
        });
    </script>

    <!-- this js for handle ajax sorting -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '#id', function(e) {
                sort_articles();
                e.preventDefault();
            });
        });
        function sort_articles() {
            $('#id').on('click', function() {
                $.ajax({
                    url : '/articles',
                    typs : 'GET',
                    dataType : 'json',
                    data : {
                        'keywords' : $('#keywords').val(),
                        'direction' : $('#direction').val()
                    },
                    success : function(data) {
                        $('#data-content').html(data['view']);
                        $('#keywords').val(data['keywords']);
                        $('#direction').val(data['direction']);

                        if(data['direction'] == 'asc') {
                            $('i#ic-direction').attr({class: "fa fa-arrow-up"});    
                        } else {
                            $('i#ic-direction').attr({class: "fa fa-arrow-down"});
                        }
                    },
                    error : function(xhr, status, error) {
                    console.log(xhr.error + "\n ERROR STATUS : " + status +
                    "\n" + error);
                    },
                        complete : function() {
                        alreadyloading = false;
                        }
                        });
            });
            }
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>

</html>