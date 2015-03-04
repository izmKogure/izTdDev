<?php
//primary-adsense
function primary_adsense() {
    return '<div style="float:left; margin-right:20px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" 
style="display:inline-block;width:160px;height:600px"
data-ad-client="ca-pub-8972086855511860"
data-ad-slot="2949017436"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
style="display:inline-block;width:120px;height:600px"
data-ad-client="ca-pub-8972086855511860"
data-ad-slot="1472284234"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';
}

add_shortcode('prim_ad', 'primary_adsense');

//secondary-adsense
function secondary_adsense() {
    return '<script type="text/javascript"><!--
google_ad_client = "ca-pub-8972086855511860";
google_ad_slot = "7285902639";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';
}

add_shortcode('sec_ad', 'secondary_adsense');

//Google Analytics
add_action('wp_head', 'ga');

function ga() { ?>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-48454064-1', 'izmaker.com');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
</script>
<?php } ?>