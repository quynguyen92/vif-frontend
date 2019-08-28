<div class="about-us">
    <div class="wrap">
        <div class="section-title-content">
            <div class="section-title">
                <h2 class="section-title-holder" style="color:<?php echo esc_attr($title_color); ?>;font-size: <?php echo esc_attr($font_size); ?>px"><?php echo wp_kses_post( $title );?></h2>
            </div>
            <div class="owl-custom-nav-bar"></div>
            <div class="clear"></div>
        </div>
        <div class="content-about"><?php echo $content; ?></div>
        <div id="about_us_map" style="width: 100%; height: 500px"></div>
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtgzXMVJQur87U47G903rr3g09WyIe0Ew&sensor=false&libraries=places"></script>
<script type="text/javascript">
    window.onload = function () {
        GoogleMap.createMapWithMarker('about_us_map', '', '20.9590939', '105.7629213');
        <?php if (!empty($map_address)) : ?>GoogleMap.searchByName('<?php echo $map_address; ?>');<?php endif; ?>
    };
    var GoogleMap = {
        marker: {},
        map: null,
        address: {},
        createMapWithMarker: function (elementId, latLngWrapper, latitude, longitude) {
            // create google map
            var map = new google.maps.Map(document.getElementById(elementId), {
                zoom: 17,
                center: new google.maps.LatLng(latitude, longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            // create marker
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude, longitude),
                draggable: true
            });
            map.setCenter(marker.position);
            marker.setMap(map);
            // save old marker
            GoogleMap.marker = marker;
            GoogleMap.map = map;
        },
        addMarker: function (map, latLngWrapper, location) {
            var marker = new google.maps.Marker({
                position: location,
                draggable: true,
                map: map
            });
            marker.setMap(map);
            // save old marker
            GoogleMap.marker = marker;
        },
        removeMarker: function () {
            GoogleMap.marker.setMap(null);
        },
        searchByName: function (name, latLngWrapper) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': name}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    GoogleMap.removeMarker();
                    GoogleMap.addMarker(GoogleMap.map, latLngWrapper, results[0].geometry.location);
                    GoogleMap.map.setCenter(results[0].geometry.location);
                }
            });
        }
    };
</script>