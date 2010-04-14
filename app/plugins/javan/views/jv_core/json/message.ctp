<?php
$javascript->useNative = false;
if(isset($response['redirect'])) $response['redirect'] = $html->url($response['redirect']);
echo $javascript->object($response, array('strict'=>false));
?>
