<?php
if ( have_rows('content_blocks') ) {
  while ( have_rows('content_blocks') ) {
    the_row();
    get_template_part( 'partials/blocks/block', str_replace( '_', '-', get_row_layout() ) );
  }
}
