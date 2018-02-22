@extends('app')
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Dashboard</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-users fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">26</div>
                          <div>User</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-green">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-wrench fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge value-request">0</div>
                          <div>Request</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-yellow">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-shopping-cart fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">124</div>
                          <div>New Orders!</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-red">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-support fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">13</div>
                          <div>Support Tickets!</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
  </div>
  <div class="row">
    <div id="col-lg-12">
      <div id="data">
      </div>
        <div id="floating-panel">
          <a onclick="currentLocation();" type=button><img src="{{asset('../resources/assets/img/currentlocation.png')}}"></a>
        </div>
        <div id="map" style="height: 500px; width: 900px;"></div>
        <div id="legend"><h3>Legend</h3></div>
    </div>
  </div>

{{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvRi0yWmEZqlX9uYBXLsdI-7dL9wpak04"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
<script type="text/javascript">
  var map;
  var Markers = {};
  var infowindow=new google.maps.InfoWindow();
  var name;
  var address;
  var description;
  var langitude;
  var latitude;
  var po;
  var icons = {
    done: {
      name: 'Request Done',
      icon: "{{asset('../resources/assets/img/iconlocationdone.png')}}"
    },
    request: {
      name: 'Request',
      icon: "{{asset('../resources/assets/img/iconlocation.png')}}"
    },
    current: {
      name: 'You Location',
      icon: "{{asset('../resources/assets/img/current.png')}}"
    }
  };

  function initialize() {
    var origin = new google.maps.LatLng('123123', '123123');

    var mapOptions = {
        zoom: 13,
        center: origin,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: false
      };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    currentLocation();
    var config = {
      apiKey: "AIzaSyAphdDyV5hI0zvFYN4XEifd4aF6fV3JUJ4",
      authDomain: "job-order-request.firebaseapp.com",
      databaseURL: "https://job-order-request.firebaseio.com",
      projectId: "job-order-request",
      storageBucket: "job-order-request.appspot.com",
      messagingSenderId: "337827858907"
    };
    firebase.initializeApp(config);
    var i=0;
    var query = firebase.database().ref().child("request");
    query.on("value", function(snapshot) {
      snapshot.forEach(function(childSnapshot) {
        $('div.value-request').text(childSnapshot.numChildren());
        childSnapshot.forEach(function(grandchildSnapshot) {
          var name=grandchildSnapshot.val().name;
          var location=grandchildSnapshot.val().location;
          var description=grandchildSnapshot.val().description;
          var latitude=grandchildSnapshot.val().latitude;
          var longitude=grandchildSnapshot.val().longitude;
          var status=grandchildSnapshot.val().status;
          lokasi(name,location,description,latitude,longitude,i++,status);
        });
      });
    }, function(error) {
      console.error(error);
    });

    var legend = document.getElementById('legend');
    for (var key in icons) {
      var type = icons[key];
      var name = type.name;
      var icon = type.icon;
      var div = document.createElement('div');
      div.innerHTML = '<img src="' + icon + '"> ' + name;
      legend.appendChild(div);
    }

    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
  }

      function lokasi(name,location,description,latitude,longitude,po,status){
        var position = new google.maps.LatLng(latitude, longitude);
        if(status==0){
          var marker = new google.maps.Marker({
          position: position,
          map: map,
          draggable:false,
          icon: icons['request'].icon
        });
      }else{
        var marker = new google.maps.Marker({
        position: position,
        map: map,
        draggable:false,
        icon: icons['done'].icon
      });
      }

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(
            '<table><thead><th colspan="3">'+name+'</th></thead><tr><td><b>Location</b></td><td> : </td><td>'+location+"</td><tr><td><b>Description</b></td><td> : </td><td>"+description+"</td></tr></table>"
            );
          infowindow.setOptions({maxWidth: 200});
          infowindow.open(map, marker);
        }
      }) (marker, po));
      Markers[po] = marker;
  }

      function currentLocation(){
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };
              var markeryou = new google.maps.Marker({position:pos,map:map,icon: icons['current'].icon,title:"You are here!"});
              map.setCenter(pos);
            }, function() {
              handleLocationError(true, infoWindow, map.getCenter());
            });
          } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }
      }


  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
          infoWindow.setPosition(pos);
          infoWindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script> --}}
@endsection
