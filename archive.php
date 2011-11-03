<?php get_header(); ?>

	<section id="content">

		<?php the_post(); ?>
		
		<div id="archive-header">
				<h1 class="single-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'selecta' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'selecta' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'selecta' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
						elseif ( is_category() ) :
							printf( __( 'Category Archives: %s', 'selecta' ), '<span>' . single_cat_title( '', false ) . '</span>' );
						elseif ( is_author() ) :
							printf( __( 'Author Archives: %s', 'selecta' ), '<span><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
						elseif ( is_tag() ) :
							printf( __( 'Tag Archives: %s', 'selecta' ), '<span>' . single_tag_title( '', false ) . '</span>' );
						else :
							_e( 'Archives', 'selecta' );
						endif;
					?>
				</h1>
		</div><!-- /archive-header -->
		
		<?php rewind_posts(); ?>
		
		<?php get_template_part( 'loop', 'archive' ); ?>

	</section><!-- /content -->

<?php get_footer(); ?>