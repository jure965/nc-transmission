<?php

$scripts = array(
    // libs
    'lib/i18next.min',
    'lib/handlebars.runtime',
    'lib/moment.min',
//    'lib/bootstrap.min',
    // lib extensions
    'handlebars.helpers',
    // templates
    'templates/table',
    // model
    'model/Torrent.js',
    // api
    'transmission.api',
    // main
    'translation',
    'transmission'
);

$stylesheets = array(
//    'bootstrap.min',
    'style'
);

script('transmissionremote', $scripts);
style('transmissionremote', $stylesheets);

?>

<div id="app">
    <!--	<div id="app-navigation">-->
    <!--        <ul>-->
    <!--            <li><a data-value="allTorrents" href="#">All torrents</a></li>-->
    <!--            <li><a data-value="downloading" href="#">Downloading</a></li>-->
    <!--            <li><a data-value="completed" href="#">Completed</a></li>-->
    <!--            <li><a data-value="active" href="#">Active</a></li>-->
    <!--            <li><a data-value="inactive" href="#">Inactive</a></li>-->
    <!--            <li><a data-value="stopped" href="#">Stopped</a></li>-->
    <!--            <li><a data-value="error" href="#">Error</a></li>-->
    <!--            <li><a data-value="waiting" href="#">Waiting</a></li>-->
    <!--        </ul>-->
    <!--        <div id="app-settings">-->
    <!--            <div id="app-settings-header">-->
    <!--                <button class="settings-button" data-apps-slide-toggle="#app-settings-content"></button>-->
    <!--            </div>-->
    <!--            <div id="app-settings-content">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <div id="transmissionremote-toolbar-h">
        <button class="transmissionremote-button-icon"><span class="icon-add"></span></button>
    </div>
    <div id="app-content">
        <div id="app-content-wrapper">
            <div class="transmissionremote-content">
                <div class="transmissionremote-wrapper">
                    <div class="transmissionremote-center">
                        <span class="transmissionremote-heavy">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

