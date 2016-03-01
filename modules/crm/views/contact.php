<?php $search_keys = erp_crm_get_serach_key(); ?>
<div class="wrap erp-crm-customer" id="wp-erp">

    <h2><?php _e( 'Contact', 'wp-erp' ); ?>
        <a href="#" id="erp-customer-new" class="erp-contact-new add-new-h2" data-type="contact" title="<?php _e( 'Add New Contact', 'wp-erp' ); ?>"><?php _e( 'Add New Contact', 'wp-erp' ); ?></a>
    </h2>

    <form action="" method="post">
        <input type="hidden" name="page" value="erp-sales-customers">

        <div class="erp-save-search-wrapper" id="erp-save-search-wrapper">
            <div class="erp-save-search-item" v-for="( index, searchFields ) in searchItem">
                <save-search :search-fields="searchFields" :index="index" :total-search-item="totalSearchItem"></save-search>
            </div>
        </div>

        <?php wp_nonce_field( 'wp-erp-crm-save-search-nonce-action', 'wp-erp-crm-save-search-nonce' ); ?>
        <input type="submit" class="button" name="save_search_submit" value="<?php _e( 'Search', 'wp-erp' ); ?>">
    </form>

    <div class="list-table-wrap">
        <div class="list-table-inner">

            <form method="get">
                <input type="hidden" name="page" value="erp-sales-customers">
                <?php
                $customer_table = new \WeDevs\ERP\CRM\Contact_List_Table( 'contact' );
                $customer_table->prepare_items();
                $customer_table->search_box( __( 'Search Contact', 'wp-erp' ), 'erp-customer-search' );
                $customer_table->views();

                $customer_table->display();
                ?>
            </form>

        </div><!-- .list-table-inner -->
    </div><!-- .list-table-wrap -->
</div>
<?php
    //echo '<pre>'; var_dump( $_SERVER["QUERY_STRING"] ); echo '</pre>';

?>
