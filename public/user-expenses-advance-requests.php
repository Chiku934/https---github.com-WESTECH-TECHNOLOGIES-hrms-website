<?php

declare(strict_types=1);

$title = 'HRMS - Advance Requests';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php', 'active' => true],
    ['label' => 'Helpdesk', 'url' => 'user-support.php'],
];

$pageContent = <<<'HTML'
<style>
    .exp-page{color:#1f2937}
    .exp-tabs{display:flex;align-items:center;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden;margin-bottom:14px}
    .exp-tab{padding:10px 14px;font-size:12px;font-weight:500;color:#7b8796;text-decoration:none;border-right:1px solid #edf1f6;white-space:nowrap}
    .exp-tab.active{background:#f3eefc;color:#6b55bc;font-weight:700}
    .exp-tab:last-child{border-right:0}
    .exp-head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:10px}
    .exp-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 3px}
    .exp-sub{font-size:11px;color:#7b8796}
    .exp-btn{display:inline-flex;align-items:center;justify-content:center;padding:8px 14px;border-radius:3px;background:#6b55bc;color:#fff;text-decoration:none;font-size:12px;font-weight:700}
    .exp-panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);padding:14px;margin-bottom:16px}
    .exp-box{background:#dff6ff;border:1px solid #bfe9f5;border-radius:2px;color:#48606d;font-size:12px;padding:12px 14px}
</style>

<div class="exp-page">
    <div class="exp-tabs">
        <a href="user-expenses.php" class="exp-tab">Pending Expenses</a>
        <a href="user-expenses-past-claims.php" class="exp-tab">Past Claims</a>
        <a href="user-expenses-advance-requests.php" class="exp-tab active">Advance Requests</a>
    </div>

    <div class="exp-head">
        <div>
            <div class="exp-title">Advance Requests</div>
            <div class="exp-sub">Advance requests that are pending approval or settlement</div>
        </div>
        <a href="#" class="exp-btn">+ Request Advance</a>
    </div>

    <div class="exp-panel">
        <div class="exp-box">No advance requests to show.</div>
    </div>
</div>
HTML;

include __DIR__ . '/includes/myteam-shell.php';
