<?php

$page = isset($_GET['page']) ?? '';

if ($page == 'login') {
    include "login/index.php";
}
