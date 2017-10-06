
<a class="btn btn-default mapa">BOTTON MAPA</a>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBhshoCt2Gsxyyg3sFeLBFhlpsIA4Dm1AU&v=3&amp;sensor=false"></script>
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/markerwithlabel.js"></script>
 
 <script type="text/javascript">
 
  $('body').attr('onload', 'initMap()'); 
  coord1 = 24.3103155;
  coord2 = -101.1097159,4;

  $('a.mapa').click(function(event) {
  	coord1 = 50.3103155;
  	coord2 = -101.1097159,4;
  	initialize();

  });
//    function initMap() {
   
   var styleArray = [{"featureType":"all","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"geometry","stylers":[{"color":"#f2d18f"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"weight":"0"},{"color":"#963a1b"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":30},{"saturation":30}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#f1c979"},{"lightness":"55"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"hue":"#ff0000"},{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"},{"hue":"#ff0000"}]},{"featureType":"landscape.natural","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.landcover","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.landcover","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"poi.attraction","elementType":"labels","stylers":[{"visibility":"off"},{"color":"#d9a548"},{"lightness":"-50"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"lightness":20},{"saturation":-20}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"simplified"},{"color":"#d9a548"},{"lightness":"-50"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"lightness":-20}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#f1c979"},{"lightness":"0"}]},{"featureType":"water","elementType":"labels","stylers":[{"color":"#d9a548"}]}];


     
//      var latLng = new google.maps.LatLng(19.363269, -99.214013,17);
//      var homeLatLng = new google.maps.LatLng(19.363269, -99.214013,17);

//      var map = new google.maps.Map(document.getElementById('map_canvas'), {
//        zoom: 16,
//        center: latLng,
//        styles: styleArray,
//        scrollwheel: false,
//        InfoWindowOptions:true,
//        mapTypeId: google.maps.MapTypeId.ROADMAP
//      });
     
//      var pictureLabel = document.createElement("img");
//      //pictureLabel.src = "images/ico_ed-footer.png";

//      var marker = new MarkerWithLabel({
//        position: homeLatLng,
//        map: map,
//        draggable: false,
//        raiseOnDrag: true,
//        //labelContent: pictureLabel,
//        labelAnchor: new google.maps.Point(50, 0),
//        labelClass: "labels", // the CSS class for the label
//        labelStyle: {opacity: 1}
//      });
   
//    marker.setIcon('<?php echo get_template_directory_uri(); ?>/images/icono-maps.png');
   
//      var iw = new google.maps.InfoWindow({
//        content: "<b>Estrategas Digitales</b><br> Cañada 2, Lomas de Tarango,<br> Álvaro Obregón, México D.F.<br> <b>Tel:</b> +52 (55) 5012 9637<br><img src='<?php echo get_template_directory_uri(); ?>/images/logo_ed.png' style='width: 170px; margin-top: 7px;'>"
//      });
//    google.maps.event.addListener(marker, "click", function (e) { iw.open(map, this); });
   
     
//      }

function initialize() {
      var marcadores = [
        ['<b>Monterrey, Nuevo León</b><br>Av. Eugenio Garza Sada 4601,<br>Col. Condesa,<br>C.P. 64880.', 25.6551055, -100.2969245,17],
        ['<b>Chihuahua, Chihuahua</b><br>Calle Valle Escondido 5700,<br>Desarrollo El Saucito,<br>C.P. 31125.', 28.6550893, -106.1389401,17],
        ['<b>Tlalnepantla, Edo. de México</b><br>Calle 5 de Febrero 25,<br>Col. San Lucas Tepetlacalco,<br>C.P. 54055.', 19.5216973, -99.2381149,17],
        ['<b>Zapopan, Jalisco</b><br>Mariano Otero 408,<br>Fracc. Ciudad Del Sol,<br>C.P. 45050.', 20.6448061, -103.4141731,1],
        ['<b>León, Guanajuato.</b><br>Paseo Del Moral 502<br>Edificio Ángeles,<br>Fracc. Jardínes del Moral,<br>C.P. 371160.', 21.1493307, -101.69212,17],
        ['<b>San Luis Potosí, SLP.</b><br>Av. Central 104<br>Parque Industrial,<br>Logístico WTC,<br>La Pila, SLP, México.', 22.04137, -100.89438],
        ['<b>Cd. Juárez Chihuahua.</b><br>Av. Campos Eliseos 9050,<br>Cd Juárez, Chih., México.', 31.70985, -106.39154]
      ];
      var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 5,
        center: new google.maps.LatLng(coord1, coord2),
        styles: styleArray,
        scrollwheel: false,
        // draggable: false,
        // raiseOnDrag: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < marcadores.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map
        });
      
      marker.setIcon('<?php echo get_template_directory_uri(); ?>/images/icono-maps.png');

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(marcadores[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
    }
    google.maps.event.addDomListener(window, 'load', initialize);


    

 </script>
<div class="col-lg-12">
      <div class="row">
        <!-- <iframe style="width:100%; height:300px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.1358675895067!2d-99.21620198467046!3d19.36326878692377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20040de85dbdf%3A0x3d3dbb4c63e048ae!2sEstrategas+Digitales!5e0!3m2!1ses-419!2smx!4v1468351319896" height="450" frameborder="0" style="border:0; color=red" allowfullscreen></iframe> -->
        <div id="mapa" style="width:100%; height:550px"></div>
        <div id="log"></div>

      </div>
      <div><a class="btn btn-default ver-maps" style="position:absolute; top:10px; right: 8px; font-size: 11px; border-radius: 3px;"  href="https://www.google.com.mx/maps/@24.0388618,-107.1074066,6z/data=!4m2!6m1!1s1y9ok-ekrcVkiMZBEnOT6wXY3C_I" target="_blank">Ver en Google Maps</a></div>
    </div>