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


var addToMap = function(result)
{

  result.forEach(function(point){

          var loc = new L.LatLng(point.lat,point.long);

          if(point.category.type=='company')
          {
          var marker = new L.Marker(loc, {icon: companyIcon});
          }
          else if(point.category.type=='VC')
          {
          var marker = new L.Marker(loc, {icon: vcIcon});
          }
          else if(point.category.type=='Accelerator')
          {
          var marker = new L.Marker(loc, {icon: acceleratorIcon});
          }
          else if(point.category.type=='University')
          {
          var marker = new L.Marker(loc, {icon: universityIcon});
          }
          else if(point.category.type=='Coworking Space')
          {
          var marker = new L.Marker(loc, {icon: coworkIcon});
          }
          else
          {
          var marker = new L.Marker(loc, {icon: companyIcon});
          }


          if(point.category.type=='company')
          {
            var jobsList = "<div class='allJobs'><h2>Jobs</h2>";
            var jobs = point.jobs;

            if(jobs.length>0)
            {
              jobs.forEach(function(job){
                jobsList += '<div class="singleJob"><h4>'+job.name+'</h4><a target="_blank" href="'+job.url+'">View Listing</a></div>';
              });

              jobsList += "</div>";
            }
            else
            {
              jobsList += '<p>No Jobs Listed</p></div>';
            }
          }
          else
          {
            jobsList = "";
          }

          marker.desc = "<b>"+point.name+"</b><p class='content'>"+point.description+"</br><a target='_blank' href='"+point.url+"'>"+point.url+"</a></p>"+jobsList;
          markers.addLayer(marker);
          oms.addMarker(marker); 

        })

        map.addLayer(markers);

}


var oms = new OverlappingMarkerSpiderfier(map, options);


var companyIcon = L.icon({
    iconUrl: 'images/icon.png',

    iconSize:     [45, 55], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -86] // point from which the popup should open relative to the iconAnchor
});


var vcIcon = L.icon({
    iconUrl: 'images/money.png',

    iconSize:     [45, 55], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -86] // point from which the popup should open relative to the iconAnchor
});


var acceleratorIcon = L.icon({
    iconUrl: 'images/accIcon.png',

    iconSize:     [45, 55], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -86] // point from which the popup should open relative to the iconAnchor
});

var universityIcon = L.icon({
    iconUrl: 'images/school.png',

    iconSize:     [45, 55], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -86] // point from which the popup should open relative to the iconAnchor
});


var coworkIcon = L.icon({
    iconUrl: 'images/coworking.png',

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


var markers = new L.FeatureGroup();


$(".filter").click(function(){
  if(!$(this).hasClass('open'))
  {
    $('.wholeSide').css("right",'0px');
    $(this).addClass('open')
  }
  else
  {
    $('.wholeSide').css("right",'-200px');
    $(this).removeClass('open')
  }
})


$(".search").click(function(){

  var search = $(".searchBox").val();

  search = encodeURIComponent(search);

   map.removeLayer(markers);
   markers = [];
   markers = new L.FeatureGroup();

  $.ajax({url: "/search/"+search, success: function(result){

    addToMap(result);
    
  }});

return false;

});


$(".filterAction").on("click",function(){
       map.removeLayer(markers);
       markers = [];
       markers = new L.FeatureGroup();

       $.ajax({url: "/companies/type/"+$(this).data('category'), success: function(result){
          
          addToMap(result);

      }});

})


$.ajax({url: "/companies", success: function(result){
    addToMap(result);
}});

});