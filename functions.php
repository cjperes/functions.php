<?php

#remover versao do wordpress
function wpb_remove_version() {
return '';
}
add_filter('the_generator', 'wpb_remove_version'); 




#custom painel no feed
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets'); 
  
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Nork Digital', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Bem-vindo ao seu site Fast Nork! Precisa de ajuda? <a href="mailto:suporte@nork.digital">entre em contato</a>. Veja alguns tutoriais que podem te ajudar: <a href="https://www.nork.digital/help/wordpress" target="_blank">Help Nork</a></p>';
echo '<img src="https://www.nork.digital/wp-content/uploads/2017/10/nork-wordpress.png" />';
}



#remover footer
function remove_footer_admin () {

echo 'Desenvolvido por <a href="https://www.nork.digital" target="_blank">Nork Digital</a> | Precisa de ajuda? <a href="mailto:suporte@nork.digital" target="_blank">Suporte</a></p>';

}


add_filter('admin_footer_text', 'remove_footer_admin');





#remover feedback de erro wordpress
function no_wordpress_errors(){
  return 'Algo deu errado, tente novamente.';
}
add_filter( 'login_errors', 'no_wordpress_errors' );




#remover painel de boas vindas
remove_action('welcome_panel', 'wp_welcome_panel');



#anti spam bot [email]user@email.com.br[/email] #
function wpcodex_hide_email_shortcode( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}

	return '<a href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
}
add_shortcode( 'email', 'wpcodex_hide_email_shortcode' );



//Styling wp-login page
function login_styles() { ?>
 <style type="text/css">
 body {
     background: #e8b800 !important; /* Old browsers */
     background: -moz-linear-gradient(45deg, #e8b800 0%, #fce48a 100%) !important; /* FF3.6-15 */
     background: -webkit-linear-gradient(45deg, #e8b800 0%, #fce48a 100%) !important;
     /* Chrome10-25,Safari5.1-6 */
     background: linear-gradient(45deg, #e8b800 0%, #fce48a 100%) !important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
     filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#e8b800', endColorstr='#000', GradientType=1); /* IE6-9 fallback on horizontal gradient */
     background-attachment: fixed !important;
 }
 #wp-submit {
     border: none !important;
     box-shadow: none !important;
     background: #000 !important;
     text-shadow: none !important;
     border-radius: 4px !important;
     -webkit-border-radius: 4px !important;
     color: #fff !important;
     display: block;
     width: 100% !important;
     margin: 30px 0 0 0 !important;
     font-size: 16px;
     padding: 5px 0 !important;
     height: auto !important;
     transition: all 0.5s;
 }
 #wp-submit:hover {
     background: #e8b800 !important;
 }
 .login h1 a {
     background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/nork-wordpress.png') !important;
     background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/nork-wordpress.png') !important;
     background-size: 100% !important;
     background-position: center center !important;
     background-repeat: no-repeat;
     height: 74px !important;
     width: 250px !important;
 }
 .login #backtoblog a,
 .login #nav a {
     color: #fff !important;
 }
 </style>
<?php }

add_action('login_enqueue_scripts', 'login_styles');

// Link logo login
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// Mudar nome ao passar o mouse
function my_login_logo_url_title() {
    return 'Nork Digital';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

?>

