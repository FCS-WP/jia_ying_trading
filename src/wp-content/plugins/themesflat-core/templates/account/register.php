<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( is_user_logged_in() ) {
    echo esc_html_e( 'You are logged in!', 'themesflat-core' );
    exit;
}
?>
<div class="tfre_registration-form">
    
    <h2><?php esc_html_e( 'Register:', 'themesflat-core' ); ?></h2>
    <div class="error_message tfre_message"></div>
    <form class="tfre_register" method="post" enctype="multipart/form-data" id="tfre_custom-register-form">
        <div class="container">
            <div class="form-group">
                <label for="username"><?php esc_html_e( 'User Name:', 'themesflat-core' ); ?></label>
                <input type="text" name="username" id="username" 
                    placeholder="<?php esc_attr_e( 'User name', 'themesflat-core' ); ?>" required>
            </div>
            <div class="form-group">
                <label for="email"><?php esc_html_e( 'Email:', 'themesflat-core' ); ?></label>
                <input type="email" name="email" id="email" 
                    placeholder="<?php esc_attr_e( 'Email', 'themesflat-core' ); ?> "required>
            </div>
            <div class="form-group">
                <label for="password"><?php esc_html_e( 'Password:', 'themesflat-core' ); ?></label>
                <input type="password" name="password" id="password" 
                    placeholder="<?php esc_attr_e( 'Your passsword', 'themesflat-core' ); ?>" required>
            </div>
            <div class="form-group">
                <label for="confirm_password"><?php esc_html_e( 'Confirm Password:', 'themesflat-core' ); ?></label>
                <input type="password" name="confirm_password" id="confirm_password"
                    placeholder="<?php esc_attr_e( 'Confirm password', 'themesflat-core' ); ?>" required>
            </div>
            <input type="hidden" name="action" value="tfre_register_ajax">
            <button type="submit"><?php esc_html_e( 'Sign Up', 'themesflat-core' ); ?></button>
        </div>
        <div class="container tfre_signin tfre_login_redirect" id ="tfre_login_redirect">
            <p><?php esc_html_e( 'Already have an account?', 'themesflat-core' ); ?>
            <a href="#"><?php esc_html_e( 'Sign in', 'themesflat-core' ); ?></a>.</p>
        </div>
	</form>
</div>
