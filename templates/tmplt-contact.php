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
            <a href="mailto:office@luminastudio.org">office@luminastudio.org </a>
        </div>
        <div class="contact">
            <h2 class="contact_title">Call Us</h2>
            <a href="tel:(301) 565-2281">(301) 565-2281</a>
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
  var styleMap = [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": "-20"
            },
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "50"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "-20"
            },
            {
                "saturation": "20"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "saturation": "15"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "10"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "-40"
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fafafa"
            },
            {
                "saturation": "32"
            },
            {
                "lightness": "32"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels",
        "stylers": [
            {
                "weight": "5.98"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "weight": "3.56"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#c3ff00"
            },
            {
                "invert_lightness": true
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "-20"
            },
            {
                "saturation": "20"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "-25"
            },
            {
                "saturation": "20"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#de9ad7"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#986bbb"
            },
            {
                "lightness": "-35"
            },
            {
                "saturation": "20"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "-35"
            },
            {
                "saturation": "20"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "-35"
            },
            {
                "saturation": "20"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a28bb5"
            },
            {
                "lightness": "-10"
            },
            {
                "saturation": "20"
            }
        ]
    }
]
  
  if(window.screen.width < 700){
    var pinIconPath = {
      url: site_data.theme_url + "/images/icons/map_pin_mobile.svg",
      anchor: new google.maps.Point(10, 10)
    }

    var map_zoom = 15;
  } else{
    var pinIconPath = {
      url: site_data.theme_url + "/images/icons/map_pin.svg", 
      anchor: new google.maps.Point(10, 10)
    }
    var map_zoom = 16;
  }
  
  // The location of Uluru
  var uluru = { lat: 38.996834839013374, lng: -77.02723399557838 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: map_zoom,
    center: uluru,
    zoomControl: false,
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,
    rotateControl: false,
    fullscreenControl: false,
    styles: styleMap,
  });

  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
    icon: pinIconPath,
    anchorPoint: new google.maps.Point(0, 49),
  });
}

(function ($) {
  $(document).ready(function () {
    initMap();
  });
})(jQuery);

</script>
<?php
get_footer(); ?>
