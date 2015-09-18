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

          marker.desc = "<b>"+point.name+"</b><p class='content'>"+point.description+"</br><a target='_blank' href='"+point.url+"'>"+point.url+"</a></p>";
          map.addLayer(marker);
          oms.addMarker(marker); 

    })
}});

});