<?php
/*
Plugin Name: Google Analytics
Plugin URI: http://snapshotinteractive.com
Description: Adds a Google analytics tracking code to the theme by hooking to wp_head.
Author: Chance Strickland
Version: 1.0
 */

function ssi_google_analytics() { ?>

<meta name="google-site-verification" content="CtmQOKTkUGmbR9YLXc7Av-DMLTS1ajxh3E6uCtwQ8oI" />
<meta name="msvalidate.01" content="806446C137F45CE689A62CD371717EDD" />


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TNPP8P4');</script>
<!-- End Google Tag Manager -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144835204-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144835204-1');
</script>


<?php }
add_action( 'wp_head', 'ssi_google_analytics', 10 );
