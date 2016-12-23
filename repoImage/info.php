<?php

if(function_exists('shell_exec')) {
    echo "exec is enabled";
} else {
    echo "exec is disabled";
}

echo phpinfo();
