<?php

declare(strict_types=1);

$title = 'HRMS - Expenses & Travel';
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
    .expenses-page{color:#1f2937}
    .expenses-tabs{display:flex;align-items:center;gap:0;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden;margin-bottom:14px}
    .expenses-tab{padding:10px 14px;font-size:12px;font-weight:500;color:#7b8796;text-decoration:none;border-right:1px solid #edf1f6;white-space:nowrap}
    .expenses-tab.active{background:#f3eefc;color:#6b55bc;font-weight:700}
    .expenses-tab:last-child{border-right:0}
    .expenses-head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:10px}
    .expenses-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 3px}
    .expenses-sub{font-size:11px;color:#7b8796}
    .expenses-btn{display:inline-flex;align-items:center;justify-content:center;padding:8px 14px;border-radius:3px;background:#6b55bc;color:#fff;text-decoration:none;font-size:12px;font-weight:700}
    .expenses-panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);padding:14px;margin-bottom:16px}
    .expenses-box{background:#dff6ff;border:1px solid #bfe9f5;border-radius:2px;color:#48606d;font-size:12px;padding:12px 14px}
    .section{margin-bottom:16px}
    .section-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 6px}
    .section-help{font-size:11px;color:#7b8796;margin:0 0 10px}
    .balance-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
    .claim-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);padding:14px}
    .claim-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px}
    .claim-head .title{font-size:14px;font-weight:700;color:#334155}
    .claim-head .link{font-size:11px;color:#8b7cd1;text-decoration:none}
    .ring{display:flex;align-items:center;justify-content:center;min-height:150px}
    .ring svg{width:120px;height:120px}
    .ring text{font-family:'Inter',sans-serif;font-weight:700;fill:#5d60b3;text-anchor:middle}
    .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);border-top:1px solid #eef2f7;margin-top:10px}
    .stats-grid div{padding:10px 6px;border-right:1px solid #eef2f7;font-size:10px;color:#8b95a5}
    .stats-grid div:last-child{border-right:0}
    .stats-grid strong{display:block;font-size:11px;color:#334155;margin-top:4px}
    .history-wrap{background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
    .history-head{display:flex;justify-content:space-between;align-items:center;padding:10px 14px;border-bottom:1px solid #eef2f7}
    .history-head .count{font-size:11px;color:#8b95a5}
    .history-table{width:100%;border-collapse:collapse;min-width:1080px}
    .history-table thead th{background:#f3f5f8;font-size:9px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.05em;padding:10px;border-bottom:1px solid #e5eaf2;text-align:left}
    .history-table tbody td{padding:14px 10px;border-bottom:1px solid #f0f2f6;font-size:11px;color:#334155;vertical-align:top}
    .sub{display:block;font-size:10px;color:#8b95a5;margin-top:3px}
    .pill{display:inline-flex;align-items:center;padding:3px 8px;border-radius:999px;background:#e8f1ff;color:#4f6ac0;font-size:10px;font-weight:700}
    .pill.pending{background:#fef3c7;color:#a16207}
    .actions{color:#9aa4b2;font-size:14px;text-align:center}
    @media (max-width:1180px){
        .balance-grid{grid-template-columns:1fr}
    }
</style>

<div class="expenses-page">
    <div class="expenses-tabs">
        <a href="user-expenses.php" class="expenses-tab active">Pending Expenses</a>
        <a href="user-expenses-past-claims.php" class="expenses-tab">Past Claims</a>
        <a href="user-expenses-advance-requests.php" class="expenses-tab">Advance Requests</a>
    </div>

    <div class="expenses-head">
        <div>
            <div class="expenses-title">Expenses to be Claimed</div>
            <div class="expenses-sub">The following are the expenses that you are yet to claim</div>
        </div>
        <a href="#" class="expenses-btn">+ Add an Expense</a>
    </div>

    <div class="expenses-panel">
        <div class="expenses-box">No saved expenses to show.</div>
    </div>

    <div class="section">
        <div class="section-title">Expense claims in process</div>
        <div class="section-help">The following are the expense claims that are yet to be approved or yet to be paid are shown here</div>
        <div class="expenses-panel" style="margin-bottom:0;">
            <div class="expenses-box">No pending expenses claims to show.</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Advance settlements in process</div>
        <div class="section-help">The following are the advance settlements that are yet to be approved or yet to be paid are shown here</div>
        <div class="expenses-panel" style="margin-bottom:0;">
            <div class="expenses-box">No pending expenses claims to show.</div>
        </div>
    </div>
</div>
HTML;

include __DIR__ . '/includes/myteam-shell.php';
