<?php
if ( have_rows('content_blocks') ) {
  $counter = 0;
  while ( have_rows('content_blocks') ) {
    $counter++;
    $toprint = '<div id="ContentNum' . $counter . '">';
    echo $toprint;
    the_row();
    get_template_part( 'partials/blocks/block', str_replace( '_', '-', get_row_layout() ) );
    echo '</div>';
  }
}
