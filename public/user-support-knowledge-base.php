<?php

declare(strict_types=1);

$title = 'HRMS - Helpdesk Knowledge Base';
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
    .help-head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:10px}
    .help-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 3px}
    .help-sub{font-size:11px;color:#7b8796}
    .help-btn{display:inline-flex;align-items:center;justify-content:center;padding:8px 14px;border-radius:3px;background:#6b55bc;color:#fff;text-decoration:none;font-size:12px;font-weight:700}
    .help-grid{display:grid;grid-template-columns:1fr 320px;gap:14px}
    .help-panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);padding:14px}
    .help-item{padding:12px 0;border-bottom:1px solid #eef2f7}
    .help-item:last-child{border-bottom:0}
    .help-item-title{font-size:13px;font-weight:700;color:#334155;margin-bottom:4px}
    .help-item-sub{font-size:11px;color:#7b8796}
    .help-box{background:#dff6ff;border:1px solid #bfe9f5;border-radius:2px;color:#48606d;font-size:12px;padding:12px 14px}
    @media (max-width:1180px){.help-grid{grid-template-columns:1fr}}
</style>

<div class="help-page">
    <div class="help-tabs">
        <a href="user-support-tickets.php" class="help-tab">Tickets</a>
        <a href="user-support-knowledge-base.php" class="help-tab active">Knowledge Base</a>
        <a href="user-support-requests.php" class="help-tab">My Requests</a>
        <a href="user-support-faq.php" class="help-tab">FAQ</a>
    </div>

    <div class="help-head">
        <div>
            <div class="help-title">Knowledge Base</div>
            <div class="help-sub">Search HRMS articles and internal how-to guides.</div>
        </div>
        <a href="#" class="help-btn">Search articles</a>
    </div>

    <div class="help-grid">
        <div class="help-panel">
            <div class="help-item">
                <div class="help-item-title">Getting Started</div>
                <div class="help-item-sub">Onboarding guides, navigation help, and basic account setup.</div>
            </div>
            <div class="help-item">
                <div class="help-item-title">Leave & Attendance</div>
                <div class="help-item-sub">How to request leave, regularize attendance, and view logs.</div>
            </div>
            <div class="help-item">
                <div class="help-item-title">Expense Claims</div>
                <div class="help-item-sub">Submit and track expense reimbursements and advances.</div>
            </div>
        </div>
        <div class="help-panel">
            <div style="font-size:14px;font-weight:700;color:#334155;margin-bottom:12px;">Popular Topics</div>
            <div class="help-box" style="margin-bottom:10px;">How to submit a leave request.</div>
            <div class="help-box" style="margin-bottom:10px;">How to create a timesheet entry.</div>
            <div class="help-box">How to add an expense claim.</div>
        </div>
    </div>
</div>
HTML;

include __DIR__ . '/includes/myteam-shell.php';
