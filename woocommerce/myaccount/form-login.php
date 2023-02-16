<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<div class="woocommerce-notices-wrapper"></div>

<form class="woocommerce-form woocommerce-form-login login" method="post">

  <?php do_action('woocommerce_login_form_start'); ?>
  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" />
  </p>
  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
  </p>

  <?php do_action('woocommerce_login_form'); ?>

  <p class="form-row">
    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
    <button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
      <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
    </label>
  </p>
  <p class="woocommerce-LostPassword lost_password">
    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
  </p>



</form>
<form action=""  method="post">
<div>
  <p>Pas encore de compte ?</p>
</div>
<?php echo do_shortcode('[user_registration_form id="68"]'); ?>

</form>
<?php do_action('woocommerce_login_form_end'); ?>
<?php do_action('woocommerce_after_customer_login_form'); ?>