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


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134607971-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-134607971-1');
</script>

<?php }
add_action( 'wp_head', 'ssi_google_analytics', 10 );
