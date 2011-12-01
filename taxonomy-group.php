<?php get_header(); ?>

	<?php the_post(); ?>
		
	<header class="archive-header" id="group-header">
	   
        <?php
	    // Procura pelos dados da metabox de grupo
	    $meta = get_option( 'group_extras' );					

	    // Procura os dados do grupo atual através do slug
	    $group = get_term_by( 'slug', $term, 'group' );
	    
	    if (empty($meta)) $meta = array();
	    if (!is_array($meta)) $meta = (array) $meta;
	
	    $meta = isset( $meta[$group->term_id] ) ? $meta[$group->term_id] : array();
	
	    // Imagem
	    if ( ! empty( $meta['group_logo'] ) ) : 
	    	
	    	$images = $meta['group_logo'];
	
	    	foreach ( $images as $att ) :
	    		$imagesrc = wp_get_attachment_image_src( $att, 'medium' );
	    		$imagesrc = $imagesrc[0]; ?>
	    	
	    		<div class="group-logo">
                	<img src="<?php echo $imagesrc; ?>" alt="Logo <?php single_term_title(); ?>" />
                </div>
            <?php
	    	endforeach;
	    endif;
	    ?>
	    
	    <h2 class="header-title" id="group-title"><?php single_term_title(); ?></h2>			
	    
	    <?php
	    // URL
	    if ( ! empty( $meta['group_url'] ) ) : ?>
            <div class="group-url">
            	<a href="<?php echo $meta['group_url']; ?>">Site</a>
            </div>
        <?php
        endif;
	    
	    // Descrição
	    $group_description = term_description();
	    
	    if ( ! empty( $group_description ) ) : ?>
            <div class="group-description">
                <?php echo $group_description; ?>
            </div>
        <?php
        endif;
	    
	    // Membros
	    if ( ! empty( $meta['group_members'] ) ) : ?>
        	<div class="group-members">
            	<?php $member = explode( ',', $meta['group_members'] ); ?>
            	<?php foreach ( $member as $member_login ) : ?>
                <?php $member_data = get_user_by( 'login', $member_login ); ?>
                <a href="<?php echo get_author_posts_url( $member_data->ID ); ?>" title="Ver a página de <?php echo $member_data->display_name; ?>" data-tooltip="<?php echo $member_data->display_name; ?>"><?php echo get_avatar( $member_data->ID, 60, 'Nome', false ); ?></a>	
                <?php endforeach; ?>
            </div>
        <?php
	    endif;
	    ?>
	</header><!-- /archive-header -->
	
	<?php rewind_posts(); ?>

	<section class="content clearfix" id="content-list">
		
		<?php query_posts( $query_string . '&posts_per_page=-1' ); ?>
		<?php get_template_part( 'loop', 'archive' ); ?>

	</section><!-- /content -->

<?php get_footer(); ?>