<?php get_header(); ?>

	<?php the_post(); ?>
		
	<header class="archive-header" id="series-header">
	       
	    <h2 class="header-title" id="series-title"><?php single_term_title(); ?></h2>			
	    
	    <?php
	    
	    // Descrição
	    $series_description = term_description();
	    
	    if ( ! empty( $series_description ) ) : ?>
            <div class="series-description">
                <?php echo $series_description; ?>
            </div>
        <?php
        endif;
	    ?>
	</header><!-- /archive-header -->
	
	<?php rewind_posts(); ?>

	<section class="content clearfix" id="content-list">
		
		<?php query_posts( $query_string . '&posts_per_page=-1&order=ASC' ); ?>
		<?php get_template_part( 'loop', 'archive' ); ?>

	</section><!-- /content -->

<?php get_footer(); ?>