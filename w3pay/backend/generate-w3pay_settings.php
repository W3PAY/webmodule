<?php
set_time_limit(0);
include __DIR__.'/services/sW3pay.php';
$JsonSettings = sW3pay::instance()->generateJsonSettings(sSettings::instance()->getSettingsFiles()['w3pay_settings']);
echo '<pre>';
print_r($JsonSettings);
echo '</pre>';
?>