<?php


add_action( 'after_setup_theme', 'janela_setup' );
function janela_setup() {

	// define as constantes
	define('HOME', get_bloginfo('url'));
	define('THEME', get_stylesheet_directory_uri());
	define('IMAGES', THEME . '/images');
	define('JS', THEME . '/js');


	// define o tamanho da área de conteúdo
	global $content_width;
	if ( !isset( $content_width ) )
		$content_width = 470;
		
	// chama os scripts das meta boxes para posts
	include_once 'inc/meta-box-3.2.2.class.php';
	include 'inc/meta-box-usage.php';

	
	// chama os scripts das meta boxes para taxonomias
	include_once 'inc/taxonomy-meta.php';
	include 'inc/taxonomy-meta-usage.php';


	// adiciona links para os feeds
	add_theme_support( 'automatic-feed-links' );
	
	
	// adiciona suporte a imagens destacadas
	add_theme_support( 'post-thumbnails' );
	
	
	// adiciona o excerpt nas páginas
	add_post_type_support( 'page', 'excerpt' );
	
	
	// chama os javascripts
	add_action( 'template_redirect', 'janela_scripts' );
	

	// This theme supports post formats.
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'quote', 'gallery', 'video', 'chat' ) );
	
	
	add_action( 'init', 'janela_taxonomies', 0 );


	// torna o tema traduzível
	load_theme_textdomain( 'jecebel', TEMPLATEPATH . '/languages' );


	// os arquivos de tradução ficam na pasta /languages/
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );


	// This theme allows users to set a custom background.
	add_custom_background();
	
	
	update_option( 'image_default_link_type','none' );
	
	
	add_filter( 'user_contactmethods', 'janela_contact_info' );

}


function janela_contact_info($contactmethods) {
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	
    return $contactmethods;
}


// cria as taxonomias
function janela_taxonomies() {
	register_taxonomy( 'series', 'post', array( 'hierarchical' => true, 'label' => 'Séries', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'group', 'post', array( 'hierarchical' => true, 'label' => 'Grupos', 'query_var' => true, 'rewrite' => true ) );
}


function janela_scripts() {

	// modal para o menu
	wp_enqueue_script( 'reveal', JS .'/jquery.reveal.js', array( 'jquery'), '1.0', true );


	// player para posts de audio
	if ( ! is_singular() || ( is_singular() && 'audio' == get_post_format() ) ) {
		wp_enqueue_script( 'audio-player', JS . '/audio-player.js', array( 'jquery' ), '20110829', true );
	}
	
	// comment-reply quando necessario
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
		wp_enqueue_script( 'comment-reply' );
}



/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function selecta_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'selecta_remove_recent_comments_style' );


// Add in-head JS block for audio post format.
function selecta_add_audio_support() {
	if ( ! is_singular() || ( is_singular() && 'audio' == get_post_format() ) ) {
?>
		<script type="text/javascript">
			AudioPlayer.setup( "<?php echo get_template_directory_uri(); ?>/swf/player.swf", {
				bg: "111111",
				leftbg: "111111",
				rightbg: "111111",
				track: "222222",
				text: "ffffff",
				lefticon: "eeeeee",
				righticon: "eeeeee",
				border: "222222",
				tracker: "eb374b",
				loader: "666666"
			});
		</script>
<?php }
}
add_action( 'wp_head', 'selecta_add_audio_support' );


function janela_share() {
	global $post; ?>
		<div class="entry-share cf">
    	    <div class="share-button share-facebook"><div id="fb-root"></div><script src="http://connect.facebook.net/pt_BR/all.js#appId=293812317326286&amp;xfbml=1"></script><fb:like href="<?php the_permalink() ?>" send="false" layout="box_count" width="55" show_faces="false" font="lucida grande"></fb:like></div>
    	    <div class="share-button share-twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" data-count="vertical">Tweet</a><script src="http://platform.twitter.com/widgets.js"></script></div>
    	    <div class="share-button share-plusone"><div class="g-plusone" data-size="tall" data-href="<?php the_permalink(); ?>"></div><script type="text/javascript">window.___gcfg = {lang: 'pt-BR'};(function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })();</script></div>
    	    <input class="share-shortlink" type="text" value="<?php echo wp_get_shortlink(get_the_ID()); ?>" onclick="this.focus(); this.select();" readonly="readonly" />
    	</div>
   	<?php
}


/**
 * Título dos posts thumbnails
 * Filtra o título da imagem para que ele sempre seja o título do post
 * Ainda não completamente testado.
 * TODO Fazer condicionais para saber se a imagem em questão é um post_thumbnail
 */
function table_postthumbnails( $attr, $attachment ) {
		
	/*
	Verifica se o título da imagem é igual ao título do post. Se for, mudamos para um novo.
	Caso sejam diferentes, quer dizer que o atributo 'title' já foi mudado dentro da chamada da função the_post_thumbnail()
	*/
	if ( $attachment->post_title == $attr['title'] ) {
		//echo "TITULOS IGUAIS, MELHOR MUDAR PARA RIIIISOS";
		
		// O atributo 'title' recebe o título do post
		$attr['title'] = get_the_title( $attachment->post_parent );
	}
	
	return $attr;
	
}
add_filter( 'wp_get_attachment_image_attributes', 'table_postthumbnails', 99, 2 );


/**
 * Lista de séries e grupos
 * Cria uma lista dos elementos a serem usados nos modais
 *
 * @param string $taxonomia A taxonomia a ser pesquisada
 */
function janela_lista( $taxonomia = '' ) {

	if ( ! empty ( $taxonomia ) ) {
		
		$termos = get_terms( $taxonomia );
		
		if ( $termos ) : ?>
			<ul class="lista-<?php echo $taxonomia; ?>">
				<?php foreach ( $termos as $termo ) : ?>
					<li class="item-<?php echo $termo->slug; ?>"><a href="<?php echo get_term_link( $termo->slug, $taxonomia ); ?>"><?php echo $termo->name; ?></a></li>	
				<?php endforeach; ?>
			</ul>
		<?php
        endif;
		
	}
}
add_filter( 'wp_get_attachment_image_attributes', 'table_postthumbnails', 99, 2 );


?>