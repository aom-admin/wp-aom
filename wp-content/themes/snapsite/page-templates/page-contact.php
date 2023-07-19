<?php
/**
 * Template Name: Contact Template
 */
get_header();
?>

<?php
$api_key = get_field('api_key');
$latitude = get_field('latitude');
$longitude = get_field('longitude');
$zoom_level = get_field('zoom_level');
?>
<section id="contact-section" class="page-content padded extra" role="region">
  <?php
  $contact_title = get_field('contact_title');
  if(!empty($contact_title)) : ?>
  <div class="row">
    <div class="small-12 column text-center title-container">
        <h3><?php echo $contact_title; ?></h3>
      </div><!--cell-->
    </div><!--row-->
  <?php endif; ?>
    <div class="row">
    <div class="small-12 medium-5 column">
      <?php
      $map_title = get_field('map_title');
      if(!empty($map_title)) :
        echo '<h4>' . $map_title . '</h4>';
      else :
        echo '<h4>Visit Us</h4>';
      endif; ?>
      <div id="map"></div>
      <?php echo '<script>
        var map;
        function initMap() {

          var location = {lat: ' . $latitude . ', lng: ' . $longitude . '};

          var map = new google.maps.Map(
              document.getElementById("map"), {zoom: ' . $zoom_level . ', center: location,disableDefaultUI: true});

          var marker = new google.maps.Marker({position: location, map: map});
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=' . $api_key . '&callback=initMap"
      async defer></script>'; ?>
      <?php
      $address = get_field('address','option');
      $address_line_2 = get_field('address_line_2','option');
      if(!empty($address_line_2)) :
        $address .= ' ' . $address_line_2;
      endif;
      $suite = get_field('suite','option');
      if(!empty($suite)) :
        $address .= ' Suite ' . $suite;
      endif;
      $city = get_field('city','option');
      if(!empty($city)) :
        $address .= ' ' . $city;
      endif;
      $state = get_field('state','option');
      if(!empty($state)) :
        $address .= ' ' . $state;
      endif;
      $zip = get_field('zip','option');
      if(!empty($zip)) :
        $address .= ' ' . $zip;
      endif; ?>

      <p class="address"><?php echo $address; ?></p>
    </div><!--cell-->
     <div class="small-12 medium-7 column contact-form-container">
      <?php
      $form_title = get_field('form_title');
      if(!empty($form_title)) :
        echo '<h4>' . $form_title . '</h4>';
      else :
        echo '<h4>Email Us</h4>';
      endif; ?>
      <?php
      $form_shortcode = get_field('form_shortcode');
      echo do_shortcode($form_shortcode); ?>
      <div class="call-us-wrapper">      
        <?php
        $call_us_title = get_field('call_us_title');
        if(!empty($call_us_title)) :
          echo '<h4>' . $call_us_title . '</h4>';
        else :
          echo '<h4>Call Us</h4>';
        endif;
        $phone = get_field('phone','option'); ?>
        <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
      </div>
    </div><!--cell-->
  </div><!--row-->
  <?php
  $contact_message = get_field('contact_message');
  if(!empty($contact_message)) : ?>
  <div class="row contact-message">
    <div class="small-12 column text-center title-container">
        <h3><?php echo $contact_message; ?></h3>
      </div><!--cell-->
    </div><!--row-->
  <?php endif; ?>
 </section>

<?php get_footer(); ?>