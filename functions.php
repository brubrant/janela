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
	
	
	// chama os javascripts
	add_action( 'template_redirect', 'janela_scripts' );
	

	// This theme supports post formats.
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'quote', 'gallery', 'video', 'chat' ) );


	// torna o tema traduzível
	load_theme_textdomain( 'jecebel', TEMPLATEPATH . '/languages' );


	// os arquivos de tradução ficam na pasta /languages/
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );


	// This theme allows users to set a custom background.
	add_custom_background();

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
    	    <div class="share-twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" data-count="horizontal">Tweet</a><script src="http://platform.twitter.com/widgets.js"></script></div>
    	    <div class="share-plusone"><g:plusone size="medium" count="true" href="<?php the_permalink(); ?>"></g:plusone><script>window.___gcfg = { lang: 'pt-BR' }; (function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })();</script></div>
    	    <div class="share-facebook"><div id="fb-root"></div><script src="http://connect.facebook.net/pt_BR/all.js#appId=236523979728704&amp;xfbml=1"></script><fb:like href="<?php the_permalink() ?>" send="false" layout="button_count" width="90" show_faces="false" font="lucida grande"></fb:like></div>
    	    <input class="share-shortlink" type="text" value="<?php echo wp_get_shortlink(get_the_ID()); ?>" onclick="this.focus(); this.select();" />
    	</div>
   	<?php
}