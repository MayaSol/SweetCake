<?php
/*
*  Custom Fields For Post Types
*  Requires plugin Advanced Custom Fields https://www.advancedcustomfields.com/
*/

/**
* Custom Fields For SweetCake Pirces Posts
*/

/**
 * Features field group
 */
function swcake_prices_acf_add_fields() {
  /**
   * Features field group
   */
  acf_add_local_field_group( array(
    'key'        => 'group_price_features',
    'title'      => 'Set features for item you sell',
    'fields'     => array(
      array(
        'key'          => 'price_item_feature_01',
        'name'         => 'price_item_feature_01',
        'label'        => 'Item Feature 1',
        'type'         => 'text',
      ),
      array(
        'key'          => 'price_item_feature_02',
        'name'         => 'price_item_feature_02',
        'label'        => 'Item Feature 2',
        'type'         => 'text',
      ),
      array(
        'key'          => 'price_item_feature_03',
        'name'         => 'price_item_feature_03',
        'label'        => 'Item Feature 3',
        'type'         => 'text',
      ),
    ),
    'location'   => array(
      array(
        array(
          'param'    => 'post_type',
          'operator' => '==',
          'value'    => 'swcake_price',
        ),
      ),
    ),
    'menu_order' => 6,
    //'position'   => 'acf_after_title',
  ) );
/**
 * Price field group
 */
  acf_add_local_field_group( array(
    'key'        => 'group_price',
    'title'      => 'Set price',
    'fields'     => array(
      array(
        'key'          => 'price_value',
        'name'         => 'price_value',
        'label'        => 'Price value',
        'type'         => 'text',
      ),
      array(
        'key'          => 'item_name',
        'name'         => 'item_name',
        'label'        => 'Item name',
        'type'         => 'text',
      ),
    ),
    'location'   => array(
      array(
        array(
          'param'    => 'post_type',
          'operator' => '==',
          'value'    => 'swcake_price',
        ),
      ),
    ),
    'menu_order' => 7,
  ) );


}

  add_action( 'acf/init', 'swcake_prices_acf_add_fields' );


