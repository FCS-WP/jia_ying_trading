<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="tfre-resset-password container">
	<div class="tfre_messages message tfre_messages_reset_password"></div>
	<form method="post" enctype="multipart/form-data">
        <h4><?php esc_html_e( 'Forgot your password?', 'themesflat-core' ); ?></h4>
		<div class="form-group control-username">
			<input name="user_login" class="form-control control-icon reset_password_user_login"
			       placeholder="<?php esc_attr_e( 'Enter your username or email', 'themesflat-core' ); ?>">
			<input type="hidden" name="tfre_security_reset_password"
			       value="<?php echo wp_create_nonce( 'tfre_reset_password_ajax_nonce' ); ?>"/>
			<input type="hidden" name="action" value="tfre_reset_password_ajax">
			<button type="submit"
			        class="btn btn-primary btn-block tfre_forgetpass"><?php esc_html_e( 'Get new password', 'themesflat-core' ); ?></button>
		</div>
	</form>
</div>
