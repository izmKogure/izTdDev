<form method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <fieldset>
        <input type="text" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
        <input type="image" src="<?php echo get_template_directory_uri(); ?>/images/icon_search.png" alt="icon_search">
    </fieldset>
</form>