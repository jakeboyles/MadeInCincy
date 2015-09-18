@extends('app')


@section('styles')
<style>

body {
    font-family: 'Roboto', sans-serif;
}
#map { height: 100%;width:100%;position:fixed;top:0;left:0; }

.leaflet-popup {
    margin-bottom:40px;
}

.btn {
  background-color:#F1301A;
  border:2px solid #F1301A;
}

.alert-success {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #3c763d;
    font-size: 20px !important;
    margin:0px auto;
    margin-top: 50px;
    position: relative;
    z-index: 99999;
    width:70%;
}

.alert-success h2 {
  font-size:18px;
}

.nav {
    height:80px;
    background-color:rgba(0,0,0,.8);
    width:100%;
    position:fixed;
    top:0;
    left:0;
    z-index:99999;
    color:#fff;
    font-weight:300;
}

.nav h2 {
    font-weight:300;
}

.nav .btn {
    margin-top:15px;
    padding:10px 30px;
}

.leaflet-left {
    left: 0;
    top: 90px;
}

.modal {
    z-index:9999999;
}

.nav h2 {
    margin-top:20px;
}

.logo span {
  font-weight:600;
  font-size:33px;
}

.alert-danger {
    background-color: #f2dede;
    border-color: #ebccd1;
    color: #a94442;
    position: relative;
    z-index: 9999;
    margin-top:100px;
}

</style>
@endsection


@section('content')

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>Whoops!</strong> There were some problems with your input.
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
         <h2>{{ Session::get('message') }}</h2>
    </div>

@endif


 <div id="map"></div>

 @foreach($companies as $company)

 <h3>{{$company->name}}</h3>

 @endforeach




 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
 <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"  action="/company/store">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Location</h4>
      </div>
      <div class="modal-body">

     


            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <P>* Locations will not be shown on the map until they have been approved by an admin.</P>

            <div class="form-group">
                <label class="col-md-4 control-label">Name *</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name"
                           value="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Description *</label>

                <div class="col-md-6">
                    <textarea class="form-control" name="description"
                           value=""></textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">Lat * <a target="_blank" href="http://www.latlong.net/convert-address-to-lat-long.html">Try This</a></label>

                <div class="col-md-6">
                <input type="text" class="form-control" name="lat"
                           value="">

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">Long *</label>

                <div class="col-md-6">
                <input type="text" class="form-control" name="long"
                           value="">
                </div>
            </div>


             <div class="form-group">
                <label class="col-md-4 control-label">URL * (http://example.com)</label>

                <div class="col-md-6">
                <input type="text" class="form-control" name="url"
                           value="">
                </div>
            </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default">Add</button>
      </div>
    </div>

    </form>
  </div>
</div>




@endsection



@section('scripts')

<script type="text/javascript">
$( document ).ready(function() {

var map = L.map('map').setView([39.1300, -84.5167], 12);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'jakeboyles.j0ajipap',
    accessToken: 'pk.eyJ1IjoiamFrZWJveWxlcyIsImEiOiJNcGJpWXhJIn0.ONDjoScLnbU4_VVfXmeIAA'
}).addTo(map);


var options = {
    'keepSpiderfied':true
};


var oms = new OverlappingMarkerSpiderfier(map, options);


var greenIcon = L.icon({
    iconUrl: 'images/icon.png',

    iconSize:     [45, 55], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -86] // point from which the popup should open relative to the iconAnchor
});


var popup = new L.Popup();
oms.addListener('click', function(marker) {
  popup.setContent(marker.desc);
  popup.setLatLng(marker.getLatLng());
  map.openPopup(popup);
});


$.ajax({url: "/companies", success: function(result){
    result.forEach(function(point){


          var loc = new L.LatLng(point.lat,point.long);
          var marker = new L.Marker(loc, {icon: greenIcon});

          marker.desc = "<b>"+point.name+"</b><br>"+point.description+"</br><a target='_blank' href='"+point.url+"'>"+point.url+"</a>";
          map.addLayer(marker);
          oms.addMarker(marker); 

    })
}});

});

</script>

@endsection