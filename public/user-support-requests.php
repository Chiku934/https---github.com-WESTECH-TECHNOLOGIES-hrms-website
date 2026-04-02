<?php

declare(strict_types=1);

$title = 'HRMS - My Requests';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Helpdesk', 'url' => 'user-support.php', 'active' => true],
];

$pageContent = <<<'HTML'
<style>
    .help-page{color:#1f2937}
    .help-tabs{display:flex;align-items:center;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden;margin-bottom:14px}
    .help-tab{padding:10px 14px;font-size:12px;font-weight:500;color:#7b8796;text-decoration:none;border-right:1px solid #edf1f6;white-space:nowrap}
    .help-tab.active{background:#f3eefc;color:#6b55bc;font-weight:700}
    .help-tab:last-child{border-right:0}
    .help-panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);padding:14px}
    .help-empty{display:flex;align-items:center;justify-content:center;min-height:260px;text-align:center;color:#b0b8c6}
    .help-empty strong{display:block;color:#334155;font-size:13px;margin-bottom:4px}
</style>

<div class="help-page">
    <div class="help-tabs">
        <a href="user-support-tickets.php" class="help-tab">Tickets</a>
        <a href="user-support-knowledge-base.php" class="help-tab">Knowledge Base</a>
        <a href="user-support-requests.php" class="help-tab active">My Requests</a>
        <a href="user-support-faq.php" class="help-tab">FAQ</a>
    </div>
    <div class="help-panel">
        <div class="help-empty">
            <div>
                <strong>No support requests yet.</strong>
                <div style="font-size:11px;">Your submitted requests will appear here.</div>
            </div>
        </div>
    </div>
</div>
HTML;

include __DIR__ . '/includes/myteam-shell.php';
