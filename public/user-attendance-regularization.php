<?php

declare(strict_types=1);

$title = 'HRMS - Attendance Regularization';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Summary', 'url' => 'dashboard.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Attendance', 'url' => 'user-attendance.php', 'active' => true],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Profile Changes', 'url' => '#'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Hiring', 'url' => '#'],
];

$pageContent = '
<div class="shell-card">
    <h2 style="margin:0 0 8px;color:#111827;">Attendance Regularization</h2>
    <p style="margin:0;color:#475569;">This page is now aligned to the shared myteam shell and can be expanded with the regularization workflow next.</p>
</div>';

include __DIR__ . '/includes/myteam-shell.php';
