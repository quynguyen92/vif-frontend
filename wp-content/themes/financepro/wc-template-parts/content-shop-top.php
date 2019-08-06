<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="woo-shop-top">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="view-mode pull-left" id="shop-view-mode">
            <ul>
                <li class="grid-view-nav"><a href="#" ><i class="fa fa-th-large"></i></a></li> 
                <li class="list-view-nav"><a href="#"><i class="fa fa-list"></i></a></li>            
            </ul>
        </div>
        <div class="limit-show media-body">
            <div><?php woocommerce_result_count();?></div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="sort-list">
            <?php woocommerce_catalog_ordering();?>
        </div>
    </div>
</div>