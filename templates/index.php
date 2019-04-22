<?php

$scripts = array('handlebars.runtime', 'transmission.api', 'transmission');

$templates = array('templates/table');

script('nc-transmission', array_merge($scripts, $templates));
style('nc-transmission', 'style');

?>

<div id="app">
	<div id="app-navigation">
        <ul>
            <li><a data-value="example" href="#">Example</a></li>
        </ul>
        <div id="app-settings">
            <div id="app-settings-header">
                <button class="settings-button" data-apps-slide-toggle="#app-settings-content"></button>
            </div>
            <div id="app-settings-content">
                <!-- Your settings in here -->
            </div>
        </div>

    </div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<div class="nct-content">
                <p>Loading...</p>
			</div>
		</div>
	</div>
</div>

