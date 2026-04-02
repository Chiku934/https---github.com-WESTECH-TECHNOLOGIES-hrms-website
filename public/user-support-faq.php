<?php

declare(strict_types=1);

$title = 'HRMS - FAQ';
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
    .faq-item{padding:12px 0;border-bottom:1px solid #eef2f7}
    .faq-item:last-child{border-bottom:0}
    .faq-q{font-size:13px;font-weight:700;color:#334155;margin-bottom:4px}
    .faq-a{font-size:11px;color:#7b8796}
</style>

<div class="help-page">
    <div class="help-tabs">
        <a href="user-support-tickets.php" class="help-tab">Tickets</a>
        <a href="user-support-knowledge-base.php" class="help-tab">Knowledge Base</a>
        <a href="user-support-requests.php" class="help-tab">My Requests</a>
        <a href="user-support-faq.php" class="help-tab active">FAQ</a>
    </div>
    <div class="help-panel">
        <div class="faq-item">
            <div class="faq-q">How do I submit a support ticket?</div>
            <div class="faq-a">Use the New Ticket button on the Helpdesk home page.</div>
        </div>
        <div class="faq-item">
            <div class="faq-q">Where can I find policy articles?</div>
            <div class="faq-a">Open the Knowledge Base tab to browse help articles.</div>
        </div>
        <div class="faq-item">
            <div class="faq-q">Can I track my existing requests?</div>
            <div class="faq-a">Yes, the My Requests tab lists requests you submitted.</div>
        </div>
    </div>
</div>
HTML;

include __DIR__ . '/includes/myteam-shell.php';
