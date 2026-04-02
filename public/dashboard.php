<?php

declare(strict_types=1);

$title = 'HRMS - Dashboard';
$bodyClass = 'myteam-page';

ob_start();
include __DIR__ . '/../app/pages/dashboard.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
