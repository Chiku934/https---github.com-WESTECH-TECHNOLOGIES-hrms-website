<?php

declare(strict_types=1);

$title = 'HRMS - Payroll';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Summary', 'url' => 'dashboard.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Profile Changes', 'url' => '#'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Hiring', 'url' => '#'],
];

$pageContent = '
<div class="shell-card">
    <h2 style="margin:0 0 8px;color:#111827;">Payroll</h2>
    <p style="margin:0;color:#475569;">This page is now aligned to the shared myteam shell and is ready for payroll summaries and payout details.</p>
</div>';

include __DIR__ . '/includes/myteam-shell.php';
