<?php get_header(); ?>
	<div id="slide">
		<?php if ( function_exists( "easingsliderlite" ) ) { easingsliderlite(); } ?>
	</div>
	
	<div id="feature">
		<h2 class="fea-h">特集記事</h2>
		<div class="fea-content clearfix">
		<?php global $post; $feature = get_posts( array( 'posts_per_page' => 6, 'orderby' => 'rand', 'tag' => 'feature' ) ); ?>
								
			<?php foreach( $feature as $post ) : setup_postdata($post); ?>
			<dl>
				<dt>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thum-feature'); ?></a>
					</div>
				</dt>
				<dd class="first-child">
					<div class="category <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->category_nicename; }; ?>">
						<?php echo $cat->cat_name; ?>
					</div>
				</dd>
				<dd class="ttl">
					<h1>
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( mb_strlen ( $post -> post_title ) > 40 ) {
								        $title = mb_substr( $post -> post_title, 0, 40 );
								        echo $title . '...';
								    } else {
								    echo $post -> post_title;
								    }
							?> 
						</a>
					</h1>	
				</dd>
			</dl>						
			<?php endforeach; ?>
			
		<?php wp_reset_postdata(); ?>
		</div>		
	</div>
	
	<div id="content" class="site-content clearfix">
		<div id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				
			<?php while ( have_posts() ) : the_post(); ?>
			
			<dl class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->category_nicename; }; ?>">
				<dt>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>">
							<?php add_new(get_the_time('U'),3); ?><?php the_post_thumbnail('thum-entry'); ?>
						</a>
					</div>
				</dt>
				<dd class="first-child">
					<div class="category <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->category_nicename; }; ?>">
						<?php echo $cat->cat_name; ?>
					</div>
				</dd>
				<dd class="ttl">
					<h1>
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( mb_strlen ( $post -> post_title ) > 50 ) {
								        $title = mb_substr( $post -> post_title, 0, 50 );
								        echo $title . '...';
								    } else {
								    echo $post -> post_title;
								    }
							?> 
						</a>
					</h1>	
				</dd>
				<dd class="date">
					<?php echo get_the_date('Y年n月d日'); ?> ｜ <?php if ( function_exists('wpp_get_views') ) { echo wpp_get_views( get_the_ID() ); } ?>views
				</dd>
				<dd class="more">
					<p>
						<a href="<?php the_permalink(); ?>">≫記事をみる</a>
					</p>
				</dd>
			</dl>
			
			<?php endwhile; else: ?>
				<p>記事はありません。</p>
			
			<?php endif; ?>
			
			<div id="navigation">
				<?php wp_pagenavi(); ?>
			</div><!-- #navigation -->
			
		</div><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #content -->
<?php get_footer(); ?>