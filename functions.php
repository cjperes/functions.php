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

?>