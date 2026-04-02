<?php

declare(strict_types=1);

$title = 'HRMS - Leave Logs';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Summary', 'url' => 'dashboard.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php', 'active' => true],
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Profile Changes', 'url' => '#'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Hiring', 'url' => '#'],
];
$subNavItems = [
    ['label' => 'Leave Summary', 'url' => 'user-leave.php'],
    ['label' => 'Apply Leave', 'url' => 'user-leave-apply.php'],
    ['label' => 'Leave Logs', 'url' => 'user-leave-status.php', 'active' => true],
];

ob_start();
include __DIR__ . '/../app/pages/user-leave-status.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
