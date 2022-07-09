<div class="sm-woo-container">
    <h3>
        <?php _e('Data from plugin:', \Sm\SM_TEXTDOMAIN); ?>
    </h3>
    <ul>
        <?php foreach ($data as $item){ ?>
            <li><?php echo $item; ?></li>
        <?php } ?>
    </ul>
</div>

