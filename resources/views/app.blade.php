<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>CincyScene.Tech: Let the world see how we have grown!</title>

  @section('meta_keywords')
  @show

  @section('meta_author')
  <meta name="author" content="Jake Boyles"/>
  @show

  @section('meta_description')
  <meta name="description" content="Let the world see how we have grown!"/>
  @show

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css" />

  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />


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
    <div class="col-md-3 col-xs-6 logo">
      <h2>Cincy<span>Scene</span></h2>
    </div>

    <div class="col-md-4 hidden-xs hidden-sm">
      <h3>Made with <i class="fa fa-heart"></i> in Cincinnati</h3>
    </div>




    <div class="dropdown col-md-5 col-xs-6 right">

    <button class="visible-md visible-lg visible-xl pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      Add To Map <i class="fa fa-plus"></i>
    </button>

    <button class="visible-xs visible-sm pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      Add <i class="fa fa-plus"></i>
    </button>


    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
      <li><a data-toggle="modal" data-target="#myModal" href="#">Add Listing <i class="fa fa-heart"></i></a></li>
      <li><a data-toggle="modal" data-target="#addPerson" href="#">Add Person <i class="fa fa-user"></i></a></li>
      <li><a data-toggle="modal" data-target="#addEats" href="#">Add Eatery <i class="fa fa-cutlery"></i></a></li>
    </ul>
  </div>


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

<!-- Start of Woopra Code -->
<script>
(function(){
        var t,i,e,n=window,o=document,a=arguments,s="script",r=["config","track","identify","visit","push","call","trackForm","trackClick"],c=function(){var t,i=this;for(i._e=[],t=0;r.length>t;t++)(function(t){i[t]=function(){return i._e.push([t].concat(Array.prototype.slice.call(arguments,0))),i}})(r[t])};for(n._w=n._w||{},t=0;a.length>t;t++)n._w[a[t]]=n[a[t]]=n[a[t]]||new c;i=o.createElement(s),i.async=1,i.src="//static.woopra.com/js/t/5.js",e=o.getElementsByTagName(s)[0],e.parentNode.insertBefore(i,e)
})("woopra");

woopra.config({
    domain: 'cincy.tech'
});
woopra.track();
</script>
<!-- End of Woopra Code -->


<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67761313-1', 'auto');
  ga('send', 'pageview');
  </script>

  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
  <script src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
  <script src="http://jawj.github.io/OverlappingMarkerSpiderfier-Leaflet/bin/oms.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/cheet.min.js"></script>
  <script src="js/all.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

  @yield('scripts')

</body>
</html>
