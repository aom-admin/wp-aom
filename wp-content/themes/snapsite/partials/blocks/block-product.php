<!-- Get products -->
<?php
// TODO add category to get post and filter by category
$args = array(
    'post_type' => 'products',
    'posts_per_page' => -1
);
 
$my_query = new WP_Query( $args );
 
if ( $my_query->have_posts() ) : ?>

    <?php echo '<div class="product-wrapper">';
 
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
    
    <!-- loop over categories and get products that have them -->

<!-- Else just get all products -->