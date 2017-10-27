add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Nork Digital', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Bem-vindo! Precisa de ajuda? <a href="mailto:hello@nork.digital">entre em contato</a>. Veja alguns tutoriais que podem te ajudar: <a href="https://www.nork.digital/help/wordpress" target="_blank">Help Nork</a></p>';
echo '<img src="https://www.nork.digital/wp-content/uploads/2017/10/nork-wordpress.png" />';
}