<?php

$cookiePanelSettings = array(
        "group-1" => array(),
        "group-2" => array(),
        "group-3" => array()
);


if(!empty(get_option('lsolcp_stats_active', false))) {
    $group = 'group-2';



// Matomo
    if(!empty(get_option("lsolcp_matomo_url")) && !empty("lsolcp_matomo_id")) {

        $matomoGroup = $group;
        $matomoSiteId = esc_attr(get_option("lsolcp_matomo_id"));
        $matomoSiteUrl = esc_attr(get_option("lsolcp_matomo_url"));
        $cookiePanelSettings[$matomoGroup]["lsolcp_matomo"] = array(
            "body" => array(
                <<<EOF
<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="{$matomoSiteUrl}";
    _paq.push(['setTrackerUrl', u+'/matomo.php']);
    _paq.push(['setSiteId', '{$matomoSiteId}']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="{$matomoSiteUrl}/matomo.php?idsite={$matomoSiteId}&amp;rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Matomo Code -->
EOF

            )
        );
    }


// Facebook Pixel
    if(!empty(get_option("lsolcp_stats_facebook_id"))) {
        $facebookGroup = $group;
        $faceBookPixelId = (int)get_option("lsolcp_stats_facebook_id");
        $cookiePanelSettings[$facebookGroup]["facebook"] = array(
            "body" => array(
                <<<EOF
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '{$faceBookPixelId}');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id={$faceBookPixelId}&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
EOF

            )
        );
    }

// Google Analytics
    if(!empty(get_option("lsolcp_analytics_id"))) {
        $analyticsId = esc_attr(get_option("lsolcp_analytics_id"));
        $analyticsGroup = $group;

        if(strpos($analyticsId, 'UA-') === 0) { // Old Google Tracking Id UA-123
            $cookiePanelSettings[$analyticsGroup]["lsolcp_analytics"] = array(
                "body" => array(
                    <<<EOF
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '{$analyticsId}', 'auto');
ga('set', 'anonymizeIp', true);
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
EOF

                )
            );
        } else { // New Google Tracking Id G-123
            $cookiePanelSettings[$analyticsGroup]["lsolcp_analytics"] = array(
                "body" => array(
                    <<<EOF
<!-- Google Analytics Tag -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleTagCPObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.googletagmanager.com/gtag/js?id={$analyticsId}','gtagcp');

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{$analyticsId}', { 'anonymize_ip': true });
</script>
<!-- End Google Analytics Tag -->
EOF

                )
            );
        }
    }

// Google Tag Manager
    if(!empty(get_option("lsolcp_stats_tag_manager_id"))) {
        $gtmcontainerId = esc_attr(get_option("lsolcp_stats_tag_manager_id"));
        $tagManagerGroup = $group;
        $cookiePanelSettings[$tagManagerGroup]["lsolcp_tag_manager"] = array(
            "body" => array(
                <<<EOF
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{$gtmcontainerId}');</script>
<!-- End Google Tag Manager -->
EOF

            )
        );
    }


}

if(!empty(get_option('lsolcp_marketing_active', false))) {
    $group = 'group-3';

    // Facebook Pixel
    if(!empty(get_option("lsolcp_marketing_facebook_id"))) {
        $facebookGroup = $group;
        $faceBookPixelId = (int)get_option("lsolcp_marketing_facebook_id");
        $cookiePanelSettings[$facebookGroup]["facebook"] = array(
            "body" => array(
                <<<EOF
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '{$faceBookPixelId}');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id={$faceBookPixelId}&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
EOF

            )
        );
    }


    // Google Tag Manager
    if(!empty(get_option("lsolcp_marketing_tag_manager_id"))) {
        $gtmcontainerId = esc_attr(get_option("lsolcp_marketing_tag_manager_id"));
        $tagManagerGroup = $group;
        $cookiePanelSettings[$tagManagerGroup]["lsolcp_tag_manager"] = array(
            "body" => array(
                <<<EOF
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{$gtmcontainerId}');</script>
<!-- End Google Tag Manager -->
EOF

            )
        );
    }

}



?>

<script id="lamp-cookie-consent" type="application/json">
<?php echo json_encode($cookiePanelSettings); ?>
</script>
<style id="lamp-cookie-consent-css" type="text/css"><?php echo esc_html(get_option('lsolcp_css')); ?></style>