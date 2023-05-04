<?php
$modules = apache_get_modules();
if (in_array('mod_rewrite', $modules)) {
    echo "mod_rewrite is enabled";
} else {
    echo "mod_rewrite is not enabled";
}
?>