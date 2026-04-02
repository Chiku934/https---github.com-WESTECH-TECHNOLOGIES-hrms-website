<?php

declare(strict_types=1);

$title = 'HRMS - Dashboard';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Summary', 'url' => 'dashboard.php', 'active' => true],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Profile Changes', 'url' => '#'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Hiring', 'url' => '#'],
];

ob_start();
include __DIR__ . '/../app/pages/dashboard.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
