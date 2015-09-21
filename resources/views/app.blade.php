<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cincy.Tech: Let the world see how we have grown!</title>
    @section('meta_keywords')
    @show @section('meta_author')
        <meta name="author" content="Jake Boyles"/>
    @show @section('meta_description')
        <meta name="description"
              content="Let the world see how we have grown!"/>
    @show
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css" />
        <script src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
        <script src="http://jawj.github.io/OverlappingMarkerSpiderfier-Leaflet/bin/oms.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/main.css" />

    @yield('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="nav container-fluid">
<div class="col-md-4 col-xs-6 logo">
<h2>Cincy<span>Tech</span></h2>
</div>

<div class="col-md-4 hidden-xs hidden-sm">
<h3>Made with <i class="fa fa-heart"></i> in Cincinnati</h3>
</div>

<div class="col-md-4 col-xs-6 right">
  <a class="hidden-xs hidden-sm pull-right btn btn-primary" data-toggle="modal" data-target="#myModal" href="#">Add Listing <i class="fa fa-heart"></i></a>
   <a class="visible-xs-12 visible-sm-12 hidden-md hidden-lg hidden-xl pull-right btn btn-primary" data-toggle="modal" data-target="#myModal" href="#">Add <i class="fa fa-heart"></i></a>
   <a href="https://twitter.com/share" class="hidden-xs hidden-sm twitter-share-button" data-text="Help us map #StartupCincy!" data-via="jakeboyles" data-hashtags="StartupCincy">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

</div>
</div>
<div class="container-fluid main-container">
    <div>
        @yield('content')
    </div>
</div>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67761313-1', 'auto');
  ga('send', 'pageview');

</script>

@yield('scripts')

</body>
</html>
