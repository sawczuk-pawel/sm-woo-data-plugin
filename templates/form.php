<div class="js-sm-response"></div>
<form class="js-sm-woo-form" method="post" action="/wp-admin/admin-post.php">
    <p class="form-row form-row-wide">
        <label for="sm_data" class="">Data field, separate items by commas</label>
        <span class="woocommerce-input-wrapper">
            <input type="text" class="input-text " name="sm_data" id="sm_data" required autocomplete="off">
        </span>
    </p>
    <p class="form-row form-row-wide">
        <input type="hidden" name="action" value="sm-woo">
        <button type="submit" class="button" name="sm_save_form" value="Save address">Save data to API</button>
    </p>
</form>