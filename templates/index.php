<?php
script('nc-transmission', 'script');
style('nc-transmission', 'style');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('navigation/index')); ?>
		<?php print_unescaped($this->inc('settings/index')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<div class="nct-content">
				<?php print_unescaped($this->inc('content/toolbar')) ?>
				<?php print_unescaped($this->inc('content/index')); ?>
			</div>
		</div>
	</div>
</div>

