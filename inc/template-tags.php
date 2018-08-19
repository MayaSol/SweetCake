<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sweetcake
 */

if ( ! function_exists( 'sweetcake_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function sweetcake_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x( 'Posted on %s', 'post date', 'sweetcake' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

    }
endif;

if ( ! function_exists( 'sweetcake_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function sweetcake_posted_by() {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( 'by %s', 'post author', 'sweetcake' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

    }
endif;

if ( ! function_exists( 'sweetcake_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function sweetcake_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'sweetcake' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'sweetcake' ) . '</span>', $categories_list ); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'sweetcake' ) );
            if ( $tags_list ) {
                /* translators: 1: list of tags. */
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'sweetcake' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            }
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'sweetcake' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'sweetcake' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if ( ! function_exists( 'sweetcake_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function sweetcake_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php
            the_post_thumbnail( 'post-thumbnail', array(
                'alt' => the_title_attribute( array(
                    'echo' => false,
                ) ),
            ) );
            ?>
        </a>

        <?php
        endif; // End is_singular().
    }
endif;

if ( ! function_exists( 'sweetcake_anchors_next' ) ) :

  function sweetcake_anchors_next($block_cur) {

    $blocks = [
      '',
      '#sweetcake-services',
      '#sweetcake-testimonials',
      '#sweetcake-works',
      '#sweetcake-prices',
      '#sweetcake-social',
      '#sweetcake-map',
      ''
    ];

    $block_cur_id = array_search($block_cur, $blocks);
    $block_prev = $blocks[$block_cur_id - 1];
    $block_next = $blocks[$block_cur_id + 1];

    $anchor_svg = sweetcake_get_svg( $args = array( 'icon' => 'anchor-bg', 'size' => array('42px','13px')) );

echo
    '<div class="anchor-container-top">
      <div class="anchor-up">
        <a href="' . $block_prev . '">' . $anchor_svg . '</a>
      </div>
      <div class="anchor-down">
        <a href="' . $block_next . '">' . $anchor_svg . '</a>
      </div>
    </div>
    <div class="anchor-container-bottom">
      <div class="anchor-up">
        <a href="' . $block_prev . '">' . $anchor_svg . '</a>
      </div>
      <div class="anchor-down">
        <a href="' . $block_next . '">' . $anchor_svg . '</a>
      </div>
    </div>';
  }

endif;


if ( ! function_exists( 'swcake_term_classes' ) ) :

  function swcake_term_classes($terms) {

    $result = '';

    for($i = 0; $i < count($terms); ++$i) {
      $result = $result . ' ' . $terms[$i]->slug;
    }

    return $result;
  }

endif;

if ( ! function_exists( 'sweetcake_map_contacts' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function sweetcake_map_contacts() {

      echo '<div class="map-info">';

      echo '<h3 class="map-info-title">Sweet Cake'.
      sweetcake_get_svg( $args = array( 'icon' => 'anchor-up', 'size' => array('15px','8px')) )
      .'</h3>';

      $address = esc_html( get_option('address') );

      if ($address) {
        echo '<p class="map-info-line map-info-address">' . $address . '</p>';
      }

      $phone = esc_html( get_option('phone_number') );

      if ($phone) {
        echo '<p class="map-info-line map-info-phone">Tel: ' . $phone . '</p>';
      }

      $fax = esc_html( get_option('phone_number') );

      if ($fax) {
        echo '<p class="map-info-line map-info-fax">Fax: ' . $fax . '</p>';
      }

      $email = esc_html( get_option('email') );

      if ($email) {
        echo '<p class="map-info-line map-info-email">Email: ' . $email . '</p>';
      }

      echo '</div>';
    }

endif;



if ( ! function_exists( 'swcake_card_works_thumb' ) ) :
  /**
   * Returns html for image in work cards with src, width, height, without srcset.
   *
   */
  function swcake_card_works_thumb($post, $size) {

    $post_thumbnail_id = get_post_thumbnail_id( $post );
    $image = wp_get_attachment_image_src($post_thumbnail_id, $size);
    $img_html = '<img src = "' . $image[0] . '" width = ' . $image[1] . ' height = ' . $image[2] . '></img>';

    return $img_html;
  }

endif;
