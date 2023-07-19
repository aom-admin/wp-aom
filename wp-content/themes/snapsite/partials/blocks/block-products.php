<!-- Get products -->
<?php 
$products = get_sub_field('products');

if( $products ) : ?>

<div class="product-list">
    <?php 
    while ( have_rows('products') ) :
        the_row();
        $i++;
        ?>

        <?php
        $product_name = get_sub_field('product_name');
        $product_description = get_sub_field('product_description');
        $product_brochure = get_sub_field('product_brochure');
        $product_quote_link = get_sub_field('request_a_quote_link');
        if (!$product_quote_link) {
            $product_quote_link = '/contact-us';
        }
        $product_image = get_sub_field('product_image');
        ?>
        
        <div class="product-list-item-wrapper">
            <div class="product-list-item row">
                <div class="product-list-item-img">
                    <?php echo wp_get_attachment_image( $product_image['ID'], 'full' ); ?>
                </div>
                <div class="product-list-item-content">
                    <div class="product-list-item-title">
                        <h3><?php echo esc_html($product_name); ?></h3>
                    </div>
                    <div class="product-list-item-description">
                        <?php
                        if ($product_description) :
                            echo $product_description;
                        endif; ?>
                    </div>
                </div>
                <div class="product-list-item-actions">
                    <a href="<?php echo esc_url($product_brochure) ?>" class="button">View Brochure</a>
                    <a href="<?php echo esc_url($product_quote_link) ?>" class="button">Request a Quote</a>
                </div>
            </div>
        </div>


    <?php endwhile; 
endif; ?>

</div>