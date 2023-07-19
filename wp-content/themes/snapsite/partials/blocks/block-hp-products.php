<!-- Get products -->
<?php 

function findObjectByGroupType($object, $group_type){
    foreach ( $object as $element ) {
        if ( $group_type == $element->groupType ) {
            return $element->details;
        }
    }

    return false;
}

function fetchProductData($skus) {
    // Make request to https://hermesws.ext.hp.com/HermesWS/secure/v2/productcontent using skus array to get product data
    // Can use https://hermesws.ext.hp.com/HermesWS/v2/productcontent to get product data without authentication
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://hermesws.ext.hp.com/HermesWS/secure/v2/productcontent',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FAILONERROR => true,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
        "sku": ' . json_encode($skus) . ',
        "countryCode": "US",
        "languageCode": "EN",
        "layoutName": "PDPCOMBO",
        "requestor": "14211155068672282699291763219045695001",
        "reqContent": [
        "chunks",
        "images",
        "hierarchy",
        "plc",
        "title"
        ]
    }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        print curl_error($curl);
    }

    curl_close($curl);

    return $response;
}

function fetchProductDocument($skus) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://hermesws.ext.hp.com/HermesWS/secure/v2/itemdocs',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'

    {
    "countryCode": "US",
    "languageCode": "EN",
    "skus": ' . json_encode($skus) . ',
    "documentTypes": [
        "quickspecs",
        "data sheet"
    ],
    "disclosureLevels": [
        "Public"
    ],
    "audiences": [
        "Partners",
        "Customers",
        "HP"
    ],
    "contentTypes": [
        "pdf"
    ],
    "requestor": "TEST"
    }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        print curl_error($curl);
    }

    curl_close($curl);
    return $response;
}

if( have_rows('product_skus') ) :
    $skuarray = array();
    $overridearray = array();
    while ( have_rows('product_skus') ) :
        the_row();
        $i++;
        $override_api = get_sub_field('override_api');
        if ($override_api == true) {
            // Grab override data
            $product_name = get_sub_field('product_name');
            $product_image = get_sub_field('product_image');
            $product_description = get_sub_field('product_description');
            $product_brochure = get_sub_field('product_brochure');
            // make object with override data
            $product = new stdClass();
            $product->sku = get_sub_field('sku');
            $product->name = $product_name;
            $product->image = $product_image;
            $product->description = $product_description;
            $product->brochure = $product_brochure;
            // push object to array with sku as key
            $overridearray[$product->sku] = $product;
        } else {
            $sku = get_sub_field('sku');
            array_push($skuarray, $sku);
        }
    endwhile;

    $decoded_docs_json = json_decode(fetchProductDocument($skuarray));
    $decoded_docs_json = $decoded_docs_json->products;

    
    $decoded_products_json = json_decode(fetchProductData($skuarray));
    $decoded_products_json = $decoded_products_json->products;
    
    echo ("<div class='product-list'>");

    while ( have_rows('product_skus') ) :
        the_row();
        $i++;
        $sku = get_sub_field('sku');

        $product_image = null;
        $product_image_alt = null;
        $product_name = null;
        $product_details_chuncks = null;
        $product_doc = null;

        if (get_sub_field('override_api') == true) {
            $product = $overridearray[$sku];
            $product_name = $product->name;
            $product_image = $product->image['url'];
            $product_image_alt = $product->image['alt'];
            $product_details_chuncks = $product->description;
            $product_doc = $product->brochure;
        } else if ($decoded_products_json->$sku == null) {
            $product_name = $sku . " - Product not found";
        } else {
            $product_image = $decoded_products_json->$sku->images[0]->details[0]->imageUrlHttps;
            $product_image_alt = $decoded_products_json->$sku->images[0]->details[0]->documentTypeDetail;
            $product_name = $decoded_products_json->$sku->chunks[0]->details[0]->value;
            $product_details_chuncks = $decoded_products_json->$sku->chunks;
        }

        if (!$product_name) {
            $product_name = $sku . " - Product not found";
        }

        // Only get the product doc if it's not an override with a custom doc
        if ($decoded_docs_json != null && $product_doc == null) {
            $current_sku = $decoded_docs_json->$sku;
            if ($current_sku != null) {
                $documents = $current_sku->documents;
                if ($documents != null) {
                    $documents_array = get_object_vars($documents);
                    $data_sheet = $documents_array['data sheet'][0];
                    if ($data_sheet != null) {
                        $product_doc = $data_sheet->renditionDetails[0]->docURL;
                    }
                }
            }
        }

        //  $decoded_docs_json->$sku->documents['data sheet']->renditionDetails[0]->docURL; ?>
        <!-- TODO decide what counts as a "do not show" product -->
        <div class="product-list-item-wrapper">
            <div class="product-list-item row">
                <div class="product-list-item-img">
                    <img src="<?php echo ($product_image) ?>" alt="<?php echo esc_html($product_image_alt); ?>">
                </div>
                <div class="product-list-item-content">
                    <div class="product-list-item-title">
                        <h3><?php echo esc_html($product_name); ?></h3>
                    </div>
                    <div class="product-list-item-description">
                        <?php
                        if ($product_details_chuncks && get_sub_field('override_api') == true) :
                            echo $product_details_chuncks;
                        elseif ($product_details_chuncks) :
                            // loop over each "chunk" of product details and get the first of type "messaging"
                            $product_details_array = findObjectByGroupType($product_details_chuncks, 'MESSAGING');
                            if ($product_details_array) {
                                foreach ($product_details_array as $product_detail) {
                                    $product_detail_item = $product_detail->value;
                                    echo "<li>$product_detail_item</li>";
                                }
                            }
                        endif; ?>
                    </div>
                </div>
                <div class="product-list-item-actions">
                    <?php 
                    if ($product_doc) : ?>
                        <a href="<?php echo esc_url($product_doc) ?>" class="button">View Brochure</a>
                    <?php endif; ?>
                    <a href="/contact-us/" class="button">Request a Quote</a>
                </div>
            </div>
        </div>

        <?php

    endwhile;

    echo ("</div>");

endif;

?>