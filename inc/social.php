<?php
//Follow us on facebook
function facebook() {
	return '<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=232196246918155";
fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<div class="fb-like" data-href="https://www.facebook.com/izmaker" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>';
	
}

add_shortcode('fo_facebook', 'facebook');

//Follow us on twitter
function twitter() {
	return '<a href="https://twitter.com/iz_izmaker" class="twitter-follow-button" data-show-count="false" data-lang="ja" data-show-screen-name="false">@iz_izmakerさんをフォロー</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script>';
	
}

add_shortcode('fo_twitter', 'twitter');

//facebook like box
function fa_box() {
	return '<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=232196246918155";
fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/izmaker" data-width="745" data-height="290" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=232196246918155";
fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="660" data-numposts="5" data-colorscheme="light"></div>';
}
add_shortcode('li_facebook', 'fa_box');

//widget facebook
function fa_widget() {
		return '<div id="fb-root"></div>
<script>(function(d, s, id) {
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=758942267458537&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/izmaker" data-width="300" data-height="642" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div>';
}
add_shortcode('wi_facebook', 'fa_widget');

//ninja onebutton
function ni_button() {
	return'<div class="ninja_onebutton">
<script type="text/javascript">
//<![CDATA[
(function(d){
if(typeof(window.NINJA_CO_JP_ONETAG_BUTTON_a641ec737fba9dd270a31b4aa7a71ce2)=="undefined"){
document.write("<sc"+"ript type="text\/javascript" src="http:\/\/omt.shinobi.jp\/b\/a641ec737fba9dd270a31b4aa7a71ce2"><\/sc"+"ript>");
}else{
window.NINJA_CO_JP_ONETAG_BUTTON_a641ec737fba9dd270a31b4aa7a71ce2.ONETAGButton_Load();}
})(document);
//]]>
</script><span class="ninja_onebutton_hidden" style="display:none;"><?php the_permalink(); ?></span><span style="display:none;" class="ninja_onebutton_hidden"><?php the_title(); ?></span>
</div>';
}
add_shortcode('bu_ninja', 'ni_button');