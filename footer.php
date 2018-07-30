<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sweetcake
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'sweetcake' ) ); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Proudly powered by %s', 'sweetcake' ), 'WordPress' );
                ?>
            </a>
            <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( 'Theme: %1$s by %2$s.', 'sweetcake' ), 'sweetcake', '<a href="http://underscores.me/">Underscores.me</a>' );
                ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('.owl-carousel').owlCarousel({
      items:1,
      dotsContainer: '#slider-dots',
      navContainer: '#slider-nav',
      nav:true,
      loop:true,
      autoplay: true,
      autoplayTimeout:4000,
      animateOut: 'fadeOut'
    });
  });
</script>

<script>
  var mymap = L.map('sweetcake-map',{scrollWheelZoom: false, doubleClickZoom: false}).setView([40.7793, -73.959], 18);
  var siteUrl = '<?= get_bloginfo('template_url'); ?>';
  var markerIcon = L.divIcon({
    className: 'map-marker-icon',
    iconSize: [57, 57],
    html: '<div class="marker-icon-wrapper"></div>',
    //iconAnchor: [27, 27]
    popupAnchor: [0, -24],
  });
  /*var markerIcon = L.icon({
    iconUrl: siteUrl + '/img/mapmarker.png',
    iconSize: [57, 57],
    //iconAnchor: [27, 27]
    popupAnchor: [0, -24],
});*/
  var marker = L.marker([40.7783, -73.959],{icon: markerIcon}).addTo(mymap);
  marker.bindPopup('SweetCake');
  var markerIcon = marker._icon;
  markerIcon.classList.add('sweetcake-map-marker');
  markerIcon.classList.add('opened');
  markerIcon.addEventListener('click', function(event){
  event.preventDefault();
    if (markerIcon.classList.contains('closed')) {
      markerIcon.classList.remove('closed');
      markerIcon.classList.add('opened');
    }
    else {
      console.log('1');
      markerIcon.classList.remove('opened');
      markerIcon.classList.add('closed');
    }
  });
  marker.bindPopup('<?= sweetcake_map_contacts(); ?>',
    {className: 'sweetcake-map-popup',
     maxWidth: 380,
     minWidth: 380,
     closeButton: false,
     closeOnClick: false
    },
    ).openPopup();

  /*L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWF5YXNvbCIsImEiOiJjamp3dWF6OGQwc21kM3Ftazc3am5jb3MwIn0.pJ3_sExs34qtkQb9YaJ_Rg', */
  L.tileLayer('https://api.mapbox.com/styles/v1/mayasol/cjjy8fi9h0js52slkbij1jsa0/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWF5YXNvbCIsImEiOiJjamp3dWF6OGQwc21kM3Ftazc3am5jb3MwIn0.pJ3_sExs34qtkQb9YaJ_Rg',
    {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);
</script>

</body>
