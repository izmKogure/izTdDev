<form action="<?php echo home_url('/'); ?>" id="search" role="search" method="get">
    <fieldset>
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>"><input type="image" src="<?php echo get_template_directory_uri(); ?>/images/icon_search.png" alt="icon_search">
    </fieldset>
</form>