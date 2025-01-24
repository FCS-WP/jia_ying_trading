<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( is_user_logged_in() ) {
    echo esc_html_e( 'You are logged in!', 'themesflat-core' );
    exit;
}
?>
<div class="tfre_login-form">
    
    <h2><?php esc_html_e( 'Login:', 'themesflat-core' ); ?></h2>
    <div class="error_message tfre_message"></div>
    <form class="tfre_login" method="post" enctype="multipart/form-data" id="tfre_custom-login-form">
        <div class="container">
            <div class="form-group">
                <label for="username"><?php esc_html_e( 'User Name:', 'themesflat-core' ); ?></label>
                <input type="text" name="username" id="username" 
                    placeholder="<?php esc_attr_e( 'Email or user name', 'themesflat-core' ); ?>" required>
            </div>
            <div class="form-group">
                <label for="password"><?php esc_html_e( 'Password:', 'themesflat-core' ); ?></label>
                <input type="password" name="password" id="password" 
                    placeholder="<?php esc_attr_e( 'Your password', 'themesflat-core' ); ?>" required>
            </div>
            <div>
                <a href="javascript:void(0)" class="tfre-reset-password" id="tfre-reset-password"><?php esc_html_e( 'Forgot password?', 'themesflat-core' ) ?></a>
            </div>
            <input type="hidden" name="action" value="tfre_login_ajax">
            <button type="submit"><?php esc_html_e( 'Login', 'themesflat-core' ); ?></button>
        </div>
        <div class="container tfre_register" id="tfre_register_redirect">
            <p><?php esc_html_e( 'Don\'t you have an account?', 'themesflat-core' ); ?>
            <a href="#"><?php esc_html_e( 'Register', 'themesflat-core' ); ?></a>.</p>
        </div>
	</form>
</div>
