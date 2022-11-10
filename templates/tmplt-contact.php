<?php
/* Template Name: Contact */
get_header();
$phone = get_field('phone','option');
$address = get_field('address','option');
$email = get_field('email','option');
$facebook = get_field('facebook','option');
$instagram = get_field('instagram','option');
$youtube = get_field('youtube','option');
$office_hours = get_field('office_hours','option');
?>
<div class="template_contact_page_container">
    <h1 class="page_title">Contact</h1>

    <section class="map_section">
        <div class="map_holder">
            <div id="map"></div>

            <?php if( $address || $office_hours ): ?>
                <div class="map_info desktop">
                    <?php if( $address ): ?>
                        <div class="info">
                            <div class="info_title">Find Us</div>
                            <div class="info_desc"><?= $address ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if( $office_hours ): ?>
                        <div class="info">
                            <div class="info_title">Office hours</div>
                            <div class="info_desc"><?= $office_hours ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if( $address || $office_hours ): ?>
            <div class="map_info mobile">
                <?php if( $address ): ?>
                    <div class="info">
                        <div class="info_title">Find US</div>
                        <div class="info_desc"><?= $address ?></div>
                    </div>
                <?php endif; ?>

                <?php if( $office_hours ): ?>
                    <div class="info">
                        <div class="info_title">Office hours</div>
                        <div class="info_desc"><?= $office_hours ?></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>

    <?php
    $info_list = get_field('info_list');
    $info_list_title = get_field('info_list_title');
    if( $info_list ): ?>
        <section class="boxes_section">
            <?php if( $info_list_title ): ?>
                <h2 class="title"><?= $info_list_title; ?></h2>
            <?php endif; ?>

            <div class="boxes <?= ( sizeof($info_list) > 2 ) ? ' more_than_two_boxes' : null; ?>">
                <?php foreach( $info_list as $item ): ?>
                    <div class="box">
                        <div class="box_content">
                            <?php if( $item['title'] ): ?>
                                <h2><?= $item['title'] ?></h2>
                            <?php endif; ?>

                            <?php if( $item['description'] ): ?>
                                <p><?= $item['description'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="contact_section">
        <?php if( $email ): ?>
            <div class="contact">
                <h2 class="contact_title">Email Us</h2>
                <a href="mailto:<?= $email ?>"><?= $email; ?></a>
            </div>
        <?php endif; ?>

        <?php if( $phone ): ?>
            <div class="contact">
                <h2 class="contact_title">Call Us</h2>
                <a href="tel:<?= $phone ?>"><?= $phone ?></a>
            </div>
        <?php endif; ?>

        <?php if( $facebook || $instagram || $youtube ): ?>
            <div class="contact">
                <h2 class="contact_title">Follow Us</h2>
                <ul>
                    <?php if( $facebook ): ?>
                        <li><a href="<?= $facebook; ?>" target="_blank">FACEBOOK</a></li>
                    <?php endif; ?>

                    <?php if( $instagram ): ?>
                        <li><a href="<?= $instagram; ?>" target="_blank">INSTAGRAM</a></li>
                    <?php endif; ?>

                    <?php if( $youtube ): ?>
                        <li><a href="<?= $youtube; ?>" target="_blank">YOUTUBE</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="contact">
            <h2 class="contact_title">Subscribe</h2>
            <p class="mobile_email_label">ENTER YOUR</p>
            <form action="">
                <input type="email" placeholder="Enter your e-mail">
                <button><img src="<?= get_template_directory_uri(); ?>/images/icons/arrow-white.svg" alt=""></button>
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
