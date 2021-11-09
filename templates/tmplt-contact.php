<?php
/* Template Name: Contact */
get_header(); ?>
<div class="template_contact_page_container">
    <h1 class="page_title">Contact</h1>

    <section class="map_section">
        <div class="map_holder">
            <div id="map"></div>
            <!-- <div class="map">
                <img src="<?php echo get_template_directory_uri(); ?>/images/dev/map.png" alt="">
            </div> -->

            <div class="map_info desktop">
                <div class="info">
                    <div class="info_title">Find US</div>
                    <div class="info_desc">
                        8641 Colesville Rd,
                        Silver Spring, MD 20910
                    </div>
                </div>
                <div class="info">
                    <div class="info_title">Office hours</div>
                    <div class="info_desc">
                        Monday-Thursday,<br>
                        9am-3pm
                    </div>
                </div>
            </div>
        </div>

        <div class="map_info mobile">
                <div class="info">
                    <div class="info_title">Find US</div>
                    <div class="info_desc">
                        8641 Colesville Rd,
                        Silver Spring, MD 20910
                    </div>
                </div>
                <div class="info">
                    <div class="info_title">Office hours</div>
                    <div class="info_desc">
                        Monday-Thursday,<br>
                        9am-3pm
                    </div>
                </div>
            </div>
    </section>

    <section class="boxes_section">
        <h2 class="title">To reach Lumina Studio Theatre from downtown Silver Spring/Takoma Park:</h2>

        <div class="boxes">
            <div class="box">
                <div class="box_content">
                    <h2>Walking/Driving</h2>
                    <p>Lumina’s office is located in the lower level of the Silver Spring Black Box Theatre – on Colesville Road, one block North of the intersection of Colesville Road and Georgia Avenue. DROP OFF/PICKUP students in the side alley.</p>
                </div>
            </div>
            <div class="box">
                <div class="box_content">
                    <h2>By Metro</h2>
                    <p>Take the Red Line train to the SILVER SPRING station.  Exit the station and walk NORTH on Colesville Road. The Silver Spring Black Box is 3 blocks NORTH of the Metro Station.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="contact_section">
        <div class="contact">
            <h2 class="contact_title">Email Us</h2>
            <a href="">office@luminastudio.org </a>
        </div>
        <div class="contact">
            <h2 class="contact_title">Call Us</h2>
            <a href="">(301) 565-2281</a>
        </div>
        <div class="contact">
            <h2 class="contact_title">Follow Us</h2>
            <ul>
                <li><a href="" target="_blank">FACEBOOK</a></li>
                <li><a href="" target="_blank">INSTAGRAM</a></li>
                <li><a href="" target="_blank">YOUTUBE</a></li>
            </ul>
        </div>
        <div class="contact">
            <h2 class="contact_title">Subscribe</h2>
            <form action="">
                <input type="text" placeholder="Enter your e-mail">
                <button><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-white.svg" alt=""></button>
            </form>
        </div>
    </section>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIkdu5ROossXfggKrWx6ApS-XmKNv1J48"></script>

<script>
    function initMap() {
        var styleMap = 
[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#8550b0"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1b1b1b"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#65308f"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8a8a8a"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#7ef5f5"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3d3d3d"
      }
    ]
  }
] 
        var pinIconPath = site_data.theme_url + '/images/icons/map_pin.png';    
        // The location of Uluru
        var uluru = { lat: 38.996834839013374, lng: -77.02723399557838 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: uluru,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
            fullscreenControl: false,
            styles : styleMap
        });
        
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: pinIconPath,
            anchorPoint: new google.maps.Point(0,49)
        });
    }

    (function( $ ) {
            $(document).ready(function(){
                initMap();
            });
        })(jQuery);

</script>
<?php
get_footer(); ?>
