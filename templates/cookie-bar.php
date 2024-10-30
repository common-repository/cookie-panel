<div class="tx-lamp-cookie-consent">

    <div class="lamp-cookie-panel" data-lamp-cookie-panel="1">
        <div id="cookie-hint-main">
            <div class="cookie-header">
                <?php if(!empty(get_option('lsolcp_logo'))) { ?>
                    <img src="<?php echo esc_attr(get_option('lsolcp_logo')); ?>" alt="<?php echo esc_attr(get_option('lsolcp_title')); ?>" title="">
                    <br>
                    <br>
                <?php } ?>
                <h3><?php echo esc_html(get_option('lsolcp_title')); ?></h3>
            </div>
            <?php echo esc_html(get_option('lsolcp_title_text')); ?>

            <div class="cookie-panel__selection">
                <form>
                    <div class="cookie-panel__checkbox-wrap">
                        <input class="cookie-panel__checkbox cookie-panel__checkbox--state-inactiv"
                               autocomplete="off" data-lamp-cookie-panel-grp="1"
                               id="group-1" type="checkbox"
                               checked="1"
                               data-lamp-cookie-panel-essential="1"
                               disabled="disabled"
                               value="group-1">
                        <label for="group-1"><?php echo esc_html(get_option('lsolcp_essential_name')); ?></label>
                    </div>

                    <?php if(!empty(get_option('lsolcp_stats_active', false))) { ?>
                    <div class="cookie-panel__checkbox-wrap">
                        <input class="cookie-panel__checkbox " autocomplete="off" data-lamp-cookie-panel-grp="2" id="group-2" type="checkbox" value="group-2">
                        <label for="group-2"><?php echo esc_html(get_option('lsolcp_stats_name')); ?></label>
                    </div>
                    <?php } ?>

                    <?php if(!empty(get_option('lsolcp_marketing_active', false))) { ?>
                    <div class="cookie-panel__checkbox-wrap">
                        <input class="cookie-panel__checkbox " autocomplete="off" data-lamp-cookie-panel-grp="3" id="group-3" type="checkbox" value="group-3">
                        <label for="group-3"><?php echo esc_html(get_option('lsolcp_marketing_name')); ?></label>
                    </div>
                    <?php } ?>

                </form>
            </div>
            <div class="cookie-main">
                <div class="cookie-panel__description">
                </div>
                <div class="cookie-panel__control">
                    <button data-lamp-cookie-panel-save="all" class="cookie-blue-btn cookie-panel__button cookie-panel__button--color--green">
                        <?php echo get_option( 'lsolcp_button_all',"Alle akzeptieren" );  ?></button>
                    <br>
                    <button data-lamp-cookie-panel-save="save" class="cookie-white-btn cookie-panel__button">
                        <?php echo get_option( 'lsolcp_button_save',"Speichern" );  ?></button>
                </div>

                <div class="cookie-panel__link">
                    <?php
                    $privacy_policy_page_id     = (int) get_option( 'wp_page_for_privacy_policy' );
                    $lsolcp_cookie_page_id     = (int) get_option( 'lsolcp_cookie_page_id' );
                    $lsolcp_about_page_id     = (int) get_option( 'lsolcp_about_page_id' );
                    ?>

                    <?php if(!empty($lsolcp_cookie_page_id)) { ?>
                        <a href="<?php echo esc_attr(get_the_permalink($lsolcp_cookie_page_id)); ?>"><?php echo get_the_title($lsolcp_cookie_page_id); ?></a>
                    <?php } ?>

                    <?php if(!empty($privacy_policy_page_id)) { ?>
                        <a href="<?php echo esc_attr(get_the_permalink($privacy_policy_page_id)); ?>"><?php echo get_the_title($privacy_policy_page_id); ?></a>
                    <?php } ?>

                    <?php if(!empty($lsolcp_about_page_id)) { ?>
                        <a href="<?php echo esc_attr(get_the_permalink($lsolcp_about_page_id)); ?>"><?php get_the_title($lsolcp_about_page_id); ?></a>
                    <?php } ?>

                </div>


            </div>
        </div>
        <div class="cookie-details"></div>

        <div class="brand">
            <div class="inner">
                <img src="<?php echo LSCOLP_URL; ?>/img/plugin.png" alt="Cookie Panel" title="Cookie Panel">
                <a rel="noopener" href="https://wordpress.org/plugins/cookie-panel/" target="_blank"><p>Cookie Panel</p></a>
            </div>
        </div>

        <?php
        $lscolp_template_loader = new lscolp_template_loader();
        $lscolp_cookies = $lscolp_template_loader->get_template_part('cookie-bar-cookies');
        if(!empty($lscolp_cookies)) include_once $lscolp_cookies;
        ?>

    </div>
</div>
