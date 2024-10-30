<?php defined( 'ABSPATH' ) or die(); ?>

<style type="text/css">
    .cookie-panel .tab-content {
        display: none;
    }

    .cookie-panel .tab-content.active {
        display: block;
    }
</style>

<div class="wrap cookie-panel">
    <h1><?php _e( 'Cookie Panel', 'cookie-panel' ) ?></h1>
    <br/>
    <nav class="nav-tab-wrapper">
        <a href="#lsolcp-panel-information" class="nav-tab nav-tab-active">Information</a>
        <a href="#lsolcp-panel-common" class="nav-tab ">Allgemeines</a>
        <a href="#lsolcp-panel-essential" class="nav-tab "><?php echo esc_attr( get_option('lsolcp_essential_name', __('Essentiell', 'cookie-panel')) ); ?></a>
        <a href="#lsolcp-panel-stats" class="nav-tab "><?php echo esc_attr( get_option('lsolcp_stats_name', __('Statistiken', 'cookie-panel')) ); ?></a>
        <a href="#lsolcp-panel-marketing" class="nav-tab "><?php echo esc_attr( get_option('lsolcp_marketing_name', __('Marketing', 'cookie-panel')) ); ?></a>
        <a href="#lsolcp-panel-help" class="nav-tab ">Hilfe</a>
    </nav>

    <form method="post" action="options-general.php?page=lsolcp">
        <?php wp_nonce_field( 'lsolcp_settings_form' ); ?>

        <input type="hidden" name="lsolcp_settings_form" value="1">


        <section id="lsolcp-panel-essential" class="tab-content">
            <div class="card" style="max-width: 800px;">
                <h4>Die "essentiellen Cookies" gehören zu den funktionalen Cookies. Diese werden benötigt, damit deine Webseite funktioniert. </h4>
                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Name der Gruppe', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Name der Gruppe', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp-essential-name"></label>
                                <input name="lsolcp_essential_name" type="text" id="lsolcp-essential-name" value="<?php echo esc_attr( get_option('lsolcp_essential_name', __('Essentiell', 'cookie-panel')) ); ?>" class="text">
                            </fieldset>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <?php  submit_button(); ?>
            </div>

        </section>

        <section id="lsolcp-panel-stats" class="tab-content">
            <div class="card" style="max-width: 800px;">
                <h4>Statistik-Cookies helfen Webseitenbesitzern zu verstehen, wie Besucher mit Webseiten interagieren, indem Informationen anonym gesammelt und gemeldet werden. </h4>
                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Gruppe aktivieren', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Gruppe aktivieren', 'cookie-panel' ); ?></span>
                                </legend>

                                <input name="lsolcp_stats_active" type="checkbox" id="lsolcp-stats-active" value="1" <?php checked(get_option('lsolcp_stats_active')) ?>>
                                <label class="description" for="lsolcp-stats-active">Aktiviere die Gruppe im Cookie Panel Frontend</label>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Name der Gruppe', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Name der Gruppe', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp-stats-name"></label>
                                <input name="lsolcp_stats_name" type="text" id="lsolcp-stats-name" value="<?php echo esc_attr( get_option('lsolcp_stats_name', __('Statistiken', 'cookie-panel')) ); ?>" class="text">
                            </fieldset>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <h2><?php _e( 'Google Analytics Integration', 'cookie-panel' ); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Tracking Id / Measurement Id', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Tracking Id / Measurement Id', 'cookie-panel' ); ?></span>
                                </legend>

                                <label for="lsolcp-analytics-id"></label>
                                <input name="lsolcp_analytics_id" type="text" id="lsolcp-analytics-id" value="<?php echo esc_attr( get_option('lsolcp_analytics_id') ); ?>" class="text">
                                <p class="description" id="lsolcp-analytics-id-description"><?php _e('Deine Google Analytics Tracking Id, <a href="https://support.google.com/analytics/answer/9539598" target="_blank">hier</a> findest du mehr dazu.', 'cookie-panel'); ?></p>

                            </fieldset>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <h2><?php _e( 'Google Tag Manager Integration', 'cookie-panel' ); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Container Id', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Container Id', 'cookie-panel' ); ?></span>
                                </legend>

                                <label for="lsolcp-stats-tag-manager-id"></label>
                                <input name="lsolcp_stats_tag_manager_id" type="text" id="lsolcp-stats-tag-manager-id" value="<?php echo esc_attr( get_option('lsolcp_stats_tag_manager_id') ); ?>" class="text">
                                <p class="description" id="lsolcp-stats-tag-manager-id-description"><?php _e('Deine Google Tag Manager Container Id, <a href="https://support.google.com/tagmanager/answer/6103696#install" target="_blank">hier</a> findest du mehr dazu.', 'cookie-panel'); ?></p>
                            </fieldset>
                        </td>
                    </tr>


                    </tbody>
                </table>

                <h2><?php _e( 'Facebook Pixel Integration', 'cookie-panel' ); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Pixel Id', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Pixel Id', 'cookie-panel' ); ?></span>
                                </legend>

                                <label for="lsolcp-stats-facebook-id"></label>
                                <input name="lsolcp_stats_facebook_id" type="text" id="lsolcp-stats-facebook-id" value="<?php echo esc_attr( get_option('lsolcp_stats_facebook_id') ); ?>" class="text">
                                <p class="description" id="lsolcp-stats-facebook-id-description"><?php _e('Deine Google Facebook Pixel Id, <a href="https://www.facebook.com/business/help/952192354843755?id=1205376682832142" target="_blank">hier</a> findest du mehr dazu.', 'cookie-panel'); ?></p>
                            </fieldset>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <h2><?php _e( 'Matomo Integration', 'cookie-panel' ); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>

                    <tr>
                        <th scope="row"><?php _e( 'Site Id', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Site Id', 'cookie-panel' ); ?></span>
                                </legend>

                                <label for="lsolcp-matomo-id"></label>
                                <input name="lsolcp_matomo_id" type="text" id="lsolcp-matomo-id" value="<?php echo esc_attr( get_option('lsolcp_matomo_id') ); ?>" class="text">
                                <p class="description" id="lsolcp-matomo-site-id-description"><?php _e('Deine Matomo Site Id, <a href="https://matomo.org/faq/general/faq_19212/" target="_blank">hier</a> findest du mehr dazu.', 'cookie-panel'); ?></p>
                            </fieldset>
                        </td>
                    </tr>


                    <tr>
                        <th scope="row"><?php _e( 'Matomo Url', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Matomo Url', 'cookie-panel' ); ?></span>
                                </legend>

                                <label for="lsolcp-matomo-url"></label>
                                <input name="lsolcp_matomo_url" type="text" id="lsolcp-matomo-url" value="<?php echo esc_attr( get_option('lsolcp_matomo_url') ); ?>" class="text">
                                <p class="description" id="lsolcp-matomo-url-description"><?php _e('Absolute Url zu deinem Matomo Server, z.B. "https://example.org/matomo/"', 'cookie-panel'); ?></p>
                            </fieldset>
                        </td>
                    </tr>

                    </tbody>

                </table>


                <?php  submit_button(); ?>
            </div>

        </section>

        <section id="lsolcp-panel-help" class="tab-content">
            <div class="card" style="max-width: 800px;">
                <p>
                    <b>Hast du Fragen zum "Cookie Panel-Plugin"?</b><br/><br>
                    Dann  <a href="https://www.lamp-solutions.de/kontakt/" target="_blank">hinterlasse uns eine Nachricht</a>.<br/>
                    Wir freuen uns über deine Anfrage und werden sie zeitnah beantworten.<br><br>
                    Das Cookie Panel ist ein OpenSource Projekt der <a href="https://www.lamp-solutions.de/" target="_blank">
                        <img style="width: 16px;" src="https://www.lamp-solutions.de/favicon.ico" alt="LAMP solutions GmbH">LAMP solutions GmbH
                    </a> aus Nürnberg.
                </p>

            </div>
        </section>

        <section id="lsolcp-panel-marketing" class="tab-content">
            <div class="card" style="max-width: 800px;">
                <h4>Marketing-Cookies werden benötigt, um wiederkehrende Webseitenbesucher zu erkennen und Ihnen auf sie zugeschnittene Angebote präsentieren zu können.</h4>
                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Gruppe aktivieren', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Gruppe aktivieren', 'cookie-panel' ); ?></span>
                                </legend>

                                <input name="lsolcp_marketing_active" type="checkbox" id="lsolcp-marketing-active" value="1" <?php checked(get_option('lsolcp_marketing_active')) ?>>
                                <label class="description" for="lsolcp-marketing-active">Aktiviere die Gruppe im Cookie Panel Frontend</label>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Name der Gruppe', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Name der Gruppe', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp-marketing-name"></label>
                                <input name="lsolcp_marketing_name" type="text" id="lsolcp-marketing-name" value="<?php echo esc_attr( get_option('lsolcp_marketing_name', __('Marketing', 'cookie-panel')) ); ?>" class="text">
                            </fieldset>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <h2><?php _e( 'Google Tag Manager Integration', 'cookie-panel' ); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Container Id', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Container Id', 'cookie-panel' ); ?></span>
                                </legend>

                                <label for="lsolcp-marketing-tag-manager-id"></label>
                                <input name="lsolcp_marketing_tag_manager_id" type="text" id="lsolcp-marketing-tag-manager-id" value="<?php echo esc_attr( get_option('lsolcp_marketing_tag_manager_id') ); ?>" class="text">
                                <p class="description" id="lsolcp-marketing-tag-manager-id-description"><?php _e('Deine Google Tag Manager Container Id, <a href="https://support.google.com/tagmanager/answer/6103696#install" target="_blank">hier</a> findest du mehr dazu.', 'cookie-panel'); ?></p>
                            </fieldset>
                        </td>
                    </tr>


                    </tbody>
                </table>

                <h2><?php _e( 'Facebook Pixel Integration', 'cookie-panel' ); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row"><?php _e( 'Pixel Id', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Pixel Id', 'cookie-panel' ); ?></span>
                                </legend>

                                <label for="lsolcp-marketing-facebook-id"></label>
                                <input name="lsolcp_marketing_facebook_id" type="text" id="lsolcp-marketing-facebook-id" value="<?php echo esc_attr( get_option('lsolcp_marketing_facebook_id') ); ?>" class="text">
                                <p class="description" id="lsolcp-marketing-facebook-id-description"><?php _e('Deine Google Facebook Pixel Id, <a href="https://www.facebook.com/business/help/952192354843755?id=1205376682832142" target="_blank">hier</a> findest du mehr dazu.', 'cookie-panel'); ?></p>
                            </fieldset>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <?php  submit_button(); ?>
            </div>

        </section>

        <section id="lsolcp-panel-information" class="tab-content active">
            <div class="card" style="max-width: 800px; display: flex;">
                <img style="align-self: center; margin-right: 20px;" src="<?php echo LSCOLP_URL; ?>/img/logo.png" alt="Cookie Panel" title="Cookie Panel">
                <p style="margin: 20px 0;">
                    <b>Funktionsbeschreibung</b><br>
                    <br>
                    Das Cookie Panel weist den Webseitenbesucher darauf hin, dass auf deiner Webseite Cookies, wie zum Beispiel von Google Analytics oder dem Facebook Pixel, verwendet werden. Mehrere Cookies können dabei in Kategorien zusammengefasst werden.<br>
                    <br>
                    Der Code für die Cookies wird erst dann ausgeliefert, wenn der Webseitenbesucher dem zugestimmt hat.
                </p>
            </div>
        </section>
        <section id="lsolcp-panel-common" class="tab-content">
            <div class="card" style="max-width: 800px;">
                <table class="form-table" role="presentation">
                    <tbody>

                    <tr>
                        <th scope="row"><?php _e( 'Cookie Panel aktivieren', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Cookie Panel aktivieren', 'cookie-panel' ); ?></span>
                                </legend>

                                <input name="lsolcp_active" type="checkbox" id="lsolcp_active" value="1" <?php checked(get_option('lsolcp_active')) ?>>
                                <label class="description" for="lsolcp_active">Aktiviert das Cookie Panel im Frontend für Webseitenbesucher</label>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e( 'Impressum Seite', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Impressum Seite', 'cookie-panel' ) ?></span>
                                </legend>

                                <?php
                                wp_dropdown_pages(
                                    array(
                                        'name'              => 'lsolcp_about_page_id',
                                        'show_option_none'  => __( '&mdash; Select &mdash;' ),
                                        'option_none_value' => '0',
                                        'selected'          => get_option('lsolcp_about_page_id'),
                                        'post_status'       => array( 'draft', 'publish' ),
                                    )
                                );
                                ?>
                                <label class="description" for="lsolcp_about_page_id">Falls gesetzt, wird das Impressum im Cookie Panel Dialog als Link angezeigt.</label>
                            </fieldset>
                        </td>
                    </tr>



                    <tr>
                        <th scope="row"><?php _e( 'Cookies – Informationen Seite (optional)', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Cookies – Informationen Seite (optional)', 'cookie-panel' ) ?></span>
                                </legend>

                                <?php
                                wp_dropdown_pages(
                                    array(
                                        'name'              => 'lsolcp_cookie_page_id',
                                        'show_option_none'  => __( '&mdash; Select &mdash;' ),
                                        'option_none_value' => '0',
                                        'selected'          => get_option('lsolcp_cookie_page_id'),
                                        'post_status'       => array( 'draft', 'publish' ),
                                    )
                                );
                                ?>
                                <label class="description" for="lsolcp_cookie_page_id">Falls gesetzt, wird ein Link zu einer Cookies - Informationen Seite im Cookie Panel Dialog angezeigt.</label>
                            </fieldset>
                        </td>
                    </tr>


                    <tr>
                        <th scope="row"><?php _e( 'Shortcode', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Shortcode', 'cookie-panel' ) ?></span>
                                </legend>

                                <code>[cookie_panel_link link_text="Datenschutzeinstellungen"]</code>
                                <br><br>
                                Zur Verlinkung der Cookie Panel Einstellungen kann folgender Shortcode z.B. auf der Datenschutzerklärungsseite verwendet werden:<br>
                            </fieldset>
                        </td>
                    </tr>



                    </tbody>
                </table>


                <h2><?php _e( 'Individuelle Anpassungen', 'cookie-panel' ); ?></h2>

                <table class="form-table" role="presentation">
                    <tbody>

                    <tr>
                        <th scope="row"><?php _e( 'Impressum / Datenschutz Cookie Panel anzeigen', 'cookie-panel' ); ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Impressum / Datenschutz Cookie Panel anzeigen', 'cookie-panel' ); ?></span>
                                </legend>

                                <input name="lsolcp_subsiteslaw_active" type="checkbox" id="lsolcp-subsiteslaw-active" value="1" <?php checked(get_option('lsolcp_subsiteslaw_active')) ?>>
                                <label class="description" for="lsolcp-subsiteslaw-active">
                                    Wenn aktiviert, wird das Cookie Panel auch auf den Seiten "Impressum", "Datenschutz" und "Cookie Informationen" angezeigt (empfohlen: deaktiviert).
                                </label>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e( 'Cookie Panel Titel', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Cookie Panel Titel', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp-title"></label>
                                <input name="lsolcp_title" type="text" id="lsolcp-title" value="<?php echo esc_attr( get_option('lsolcp_title', __('Datenschutzeinstellungen', 'cookie-panel')) ); ?>" class="text">
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Label Button Alle', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Label Button Alle', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp_button_all"></label>
                                <input name="lsolcp_button_all" type="text" id="lsolcp_button_all" value="<?php echo esc_attr( get_option('lsolcp_button_all', __('Alle akzeptieren', 'cookie-panel')) ); ?>" class="text">
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e( 'Label Button Speichern', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Label Button Speichern', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp_button_save"></label>
                                <input name="lsolcp_button_save" type="text" id="lsolcp_button_save" value="<?php echo esc_attr( get_option('lsolcp_button_save', __('Speichern', 'cookie-panel')) ); ?>" class="text">
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e( 'Cookie Panel Titel Text', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Cookie Panel Titel Text', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp-title-text"></label>
                                <textarea name="lsolcp_title_text" cols="50" rows="5" id="lsolcp-title-text"><?php echo esc_textarea( get_option('lsolcp_title_text', __('Wir nutzen Cookies auf unserer Website. Einige von ihnen sind essenziell, während andere uns helfen, diese Website und Deine Erfahrung zu verbessern.', 'cookie-panel')) ); ?></textarea>

                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e( 'Cookie Panel CSS Anpassungen', 'cookie-panel' ) ?></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span><?php _e( 'Cookie Panel CSS Anpassungen', 'cookie-panel' ) ?></span>
                                </legend>

                                <label for="lsolcp-css"></label>
                                <textarea name="lsolcp_css" cols="50" rows="5" id="lsolcp-css"><?php echo esc_textarea( get_option('lsolcp_css', '') ); ?></textarea>

                            </fieldset>
                        </td>
                    </tr>


                    </tbody>

                </table>


                <?php  submit_button(); ?>
            </div>
        </section>

    </form>

    <script>
        jQuery('.nav-tab').click(function(e) {
            jQuery(this).addClass('nav-tab-active').siblings().removeClass('nav-tab-active');
            jQuery(jQuery(this).attr('href')).addClass('active').siblings().removeClass('active');
            return false;
        });
    </script>
</div>