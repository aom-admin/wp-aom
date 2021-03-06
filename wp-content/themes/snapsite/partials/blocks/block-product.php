<!-- Get products -->
<?php

if ( get_sub_field('product_item') ) {
    $post_filter = get_sub_field('product_item');
    if ( !is_array($post_filter) ) {
        $post_filter = array($post_filter);
    }
    if ( get_sub_field('categories') ) {
        $category_filter = get_sub_field('categories');
        if ( !is_array($category_filter) ) {
            $category_filter = array($category_filter);
        }   
        $args = array(
            'post_type'         => 'product',
            'posts_per_page'    => -1,
            'post__in'          => $post_filter,
            'orderby'           => 'menu_order',
            'order'             => 'DESC',
            'tax_query' => array(
                array(
                  'taxonomy'    => 'category',
                  'terms'       => $category_filter,
                ),
            ),
        );
    } else {
        $args = array(
            'post_type'         => 'product',
            'posts_per_page'    => -1,
            'post__in'          => $post_filter,
            'orderby'           => 'menu_order',
            'order'             => 'DESC',
        );
    }
    
    
} else {
    if ( get_sub_field('categories') ) {
        $category_filter = get_sub_field('categories');
        if ( !is_array($category_filter) ) {
            $category_filter = array($category_filter);
        }   
        $args = array(
            'post_type'         => 'product',
            'posts_per_page'    => -1,
            'orderby'           => 'menu_order',
            'order'             => 'DESC',
            'tax_query' => array(
                array(
                  'taxonomy'    => 'category',
                  'terms'       => $category_filter,
                ),
            ),
        );
    } else {
        $args = array(
            'post_type'         => 'product',
            'orderby'           => 'menu_order',
            'order'             => 'DESC',
            'posts_per_page'    => -1,
        );
    }
}


 
$my_query = new WP_Query( $args );
 
if ( $my_query->have_posts() ) : ?>

    <?php echo '<div class="product-wrapper row">';
 
    while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <div class="product-item-wrapper">
            <a href="<?php the_permalink(); ?>">
                <div class="product-item">
                    <div class="product-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                </div>
            </a>
        </div>    
    <?php endwhile; ?>

    <?php echo '</div>'; ?>
 
<?php endif; ?>
<?php wp_reset_postdata(); ?>
    
    <!-- loop over categories and get products that have them -->

<!-- Else just get all products -->