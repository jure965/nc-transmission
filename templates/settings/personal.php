<?php
script('transmissionremote', 'settings/personal');
?>

<div class="section" id="transmissionremote">
    <h2><?php p($l->t('Connection Settings')); ?></h2>
    <div>
        <label for="transmissionremote_host"><?php p($l->t('Host for your transmission-daemon')); ?>:</label>
        <input type="text" id="transmissionremote_host" value="<?php p($_['transmissionremote_host']); ?>"/>
    </div>
    <div>
        <label for="transmissionremote_port"><?php p($l->t('Port for your transmission-daemon')); ?>:</label>
        <input type="text" id="transmissionremote_port" value="<?php p($_['transmissionremote_port']); ?>"/>
    </div>
    <div>
        <label for="transmissionremote_user"><?php p($l->t('Username')); ?>:</label>
        <input type="text" id="transmissionremote_user" value="<?php p($_['transmissionremote_user']); ?>"/>
    </div>
    <div>
        <label for="transmissionremote_pass"><?php p($l->t('Password')); ?>:</label>
        <input type="text" id="transmissionremote_pass" value="<?php p($_['transmissionremote_pass']); ?>"/>
    </div>
    <div>
        <button type="button" id="transmissionremote_btnSave">Save</button>
    </div>
</div>
