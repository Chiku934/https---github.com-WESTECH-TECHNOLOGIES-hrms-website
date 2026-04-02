<?php

declare(strict_types=1);

$title = 'HRMS - Leave Overview';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php', 'active' => true],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Helpdesk', 'url' => 'user-support.php'],
];
$subNavItems = [
    ['label' => 'Summary', 'url' => 'user-leave.php', 'active' => true],
];

$leaveHistoryRows = [
    ['date' => '31 Mar 2026', 'length' => '1 Day', 'type' => 'Sick Leave', 'type_class' => 'green', 'status' => 'Approved', 'status_class' => 'approved', 'requested_by' => 'Jitesh Kumar Das', 'action_taken_on' => '31 Mar 2026', 'note' => 'mother not well', 'reason' => '', 'requested_on' => '31 Mar 2026'],
    ['date' => '27 Mar 2026 (Second half)', 'length' => '0.5 Day', 'type' => 'Earned Leave', 'type_class' => '', 'status' => 'Approved', 'status_class' => 'approved', 'requested_by' => 'Jitesh Kumar Das', 'action_taken_on' => '28 Mar 2026', 'note' => 'Taking half day leave as mother not well.', 'reason' => '', 'requested_on' => '27 Mar 2026'],
    ['date' => '24 Mar 2026', 'length' => '1 Day', 'type' => 'Casual Leave', 'type_class' => '', 'status' => 'Pending', 'status_class' => 'pending', 'requested_by' => 'Jitesh Kumar Das', 'action_taken_on' => '-', 'note' => 'Personal work', 'reason' => '', 'requested_on' => '24 Mar 2026'],
    ['date' => '19 Mar 2026', 'length' => '1 Day', 'type' => 'Optional Leave', 'type_class' => '', 'status' => 'Approved', 'status_class' => 'approved', 'requested_by' => 'Soumyadarshini Dash', 'action_taken_on' => '20 Mar 2026', 'note' => 'Festival leave', 'reason' => '', 'requested_on' => '19 Mar 2026'],
    ['date' => '13 Mar 2026', 'length' => '1 Day', 'type' => 'Paternity Leave', 'type_class' => '', 'status' => 'Rejected', 'status_class' => 'pending', 'requested_by' => 'Prajwal Chandra Nayak', 'action_taken_on' => '14 Mar 2026', 'note' => 'Family support', 'reason' => 'Insufficient balance', 'requested_on' => '13 Mar 2026'],
];

$leaveHistoryTableHtml = '';
foreach ($leaveHistoryRows as $row) {
    $searchText = strtolower($row['date'] . ' ' . $row['type'] . ' ' . $row['status'] . ' ' . $row['requested_by'] . ' ' . $row['note'] . ' ' . $row['reason']);
    $leaveHistoryTableHtml .= sprintf(
        '<tr data-type="%s" data-status="%s" data-search="%s"><td class="leave-date">%s<span class="leave-sub">%s</span></td><td>%s<span class="leave-sub">Requested on %s</span></td><td><span class="status-pill %s">%s</span><span class="leave-sub">by %s</span></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class="actions-cell">⋮</td></tr>',
        htmlspecialchars(strtolower($row['type']), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars(strtolower($row['status']), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($searchText, ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['length'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['type'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['requested_on'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['status_class'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['requested_by'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['action_taken_on'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['note'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['reason'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8')
    );
}

$pageContent = <<<'HTML'
<style>
    .leave-page{color:#1f2937}
    .leave-topline{font-size:13px;font-weight:600;color:#6b55bc;margin:0 0 14px}
    .leave-section-title{font-size:15px;font-weight:700;color:#334155;margin:0 0 12px}
    .leave-toolbar{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:14px}
    .period-select{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border:1px solid #dfe5f1;border-radius:2px;background:#fff;color:#6b55bc;font-size:12px;font-weight:600}
    .request-grid{display:grid;grid-template-columns:1fr 250px;gap:14px;align-items:stretch}
    .panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02)}
    .panel-pad{padding:14px}
    .request-banner{display:flex;align-items:center;gap:14px;min-height:86px}
    .request-icon{width:34px;height:34px;border-radius:50%;background:#f5f1ff;color:#6b55bc;display:flex;align-items:center;justify-content:center;font-size:16px}
    .request-title{font-size:13px;font-weight:700;color:#334155;margin-bottom:4px}
    .request-sub{font-size:11px;color:#7a8598}
    .request-actions{display:flex;flex-direction:column;gap:8px}
    .request-btn{display:inline-flex;align-items:center;justify-content:center;background:#6b55bc;color:#fff;text-decoration:none;font-size:12px;font-weight:700;padding:9px 12px;border-radius:2px}
    .request-link{font-size:11px;color:#6b55bc;text-decoration:none}
    .leave-stats-grid{display:grid;grid-template-columns:1.05fr 1fr 1.65fr;gap:14px}
    .mini-chart-card{min-height:110px}
    .mini-chart-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}
    .mini-title{font-size:12px;font-weight:700;color:#334155}
    .mini-chart{height:62px;display:flex;align-items:flex-end;gap:6px;padding-top:4px}
    .mini-bar{width:20px;background:#a89bd8;border-radius:0}
    .mini-donut{display:flex;align-items:center;justify-content:center;height:76px}
    .mini-donut svg{width:72px;height:72px}
    .mini-donut text{font-family:'Inter',sans-serif;font-weight:700;fill:#5b5fb0}
    .mini-months{display:flex;align-items:flex-end;gap:8px;height:62px;padding-top:4px}
    .month-bar{width:24px;background:#a89bd8}
    .bal-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
    .balance-card{min-height:180px;padding:14px;display:flex;flex-direction:column}
    .balance-head{display:flex;align-items:center;justify-content:space-between;font-size:12px;font-weight:700;color:#4b5563;margin-bottom:12px}
    .view-link{font-size:11px;color:#8b7cd1;text-decoration:none}
    .ring-wrap{display:flex;align-items:center;justify-content:center;flex:1;min-height:110px}
    .ring-wrap svg{width:118px;height:118px}
    .ring-center{font-size:11px;font-weight:700;fill:#5d60b3;text-anchor:middle}
    .balance-foot{display:grid;grid-template-columns:1fr 1fr;margin-top:auto;border-top:1px solid #eef2f7}
    .balance-foot div{padding:10px 4px;border-right:1px solid #eef2f7;font-size:10px;color:#8b95a5}
    .balance-foot div:last-child{border-right:0}
    .balance-foot strong{display:block;color:#374151;font-size:11px;margin-top:4px}
    .other-types{background:#fff;border:1px solid #e5eaf2;padding:14px;font-size:12px;color:#475569}
    .history-head{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:16px 0 10px}
    .history-tools{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
    .filter-wrap{position:relative}
    .filter-pill{min-width:130px;height:34px;border:1px solid #e5eaf2;background:#fff;border-radius:2px;display:flex;align-items:center;justify-content:space-between;padding:0 12px;font-size:12px;color:#64748b;cursor:pointer}
    .search-box{min-width:220px;height:34px;border:1px solid #e5eaf2;background:#fff;border-radius:2px;padding:0 12px;font-size:12px}
    .filter-menu{position:absolute;top:38px;left:0;min-width:180px;background:#fff;border:1px solid #e5eaf2;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.12);padding:6px;z-index:20;display:none}
    .filter-menu.open{display:block}
    .filter-menu button{width:100%;border:0;background:transparent;text-align:left;padding:8px 10px;border-radius:4px;font-size:12px;color:#334155;cursor:pointer}
    .filter-menu button:hover,.filter-menu button.active{background:#f3eefc;color:#6b55bc}
    .table-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
    .table-top{display:flex;align-items:center;justify-content:space-between;padding:10px 14px;border-bottom:1px solid #eef2f7}
    .table-count{font-size:11px;color:#8b95a5}
    .leave-table{width:100%;border-collapse:collapse;min-width:1080px}
    .leave-table thead th{background:#f3f5f8;font-size:9px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.05em;padding:10px;border-bottom:1px solid #e5eaf2;text-align:left}
    .leave-table tbody td{padding:14px 10px;border-bottom:1px solid #f0f2f6;font-size:11px;color:#334155;vertical-align:top}
    .leave-date{font-weight:600;color:#1f2937}
    .leave-sub{display:block;font-size:10px;color:#8b95a5;margin-top:4px}
    .type-pill{display:inline-flex;align-items:center;padding:3px 8px;border-radius:999px;background:#f2eefc;color:#6b55bc;font-size:10px;font-weight:700}
    .type-pill.green{background:#e8f7ee;color:#166534}
    .status-pill{display:inline-flex;align-items:center;padding:3px 8px;border-radius:999px;background:#eef2ff;color:#5b59c7;font-size:10px;font-weight:700}
    .status-pill.approved{background:#e6f7ef;color:#146c43}
    .status-pill.pending{background:#fef3c7;color:#a16207}
    .actions-cell{color:#9aa4b2;font-size:14px;text-align:center}
    .leave-bars{display:flex;align-items:flex-end;gap:6px;height:52px}
    .leave-bars span{width:24px;background:#ac98d8}
    .leave-bars .muted{background:#e3dff0}
    .leave-empty{padding:18px;color:#8b95a5;text-align:center;font-size:12px}
    @media (max-width:1180px){
        .request-grid,.leave-stats-grid,.bal-grid{grid-template-columns:1fr}
        .leave-table{min-width:960px}
    }
</style>

<div class="leave-page">
    <div class="leave-topline">Summary</div>

    <div class="leave-toolbar">
        <div class="leave-section-title" style="margin:0">Pending leave requests</div>
        <div class="period-select">Apr 2025 - Mar 2026 <i class="fa-solid fa-chevron-down" style="font-size:9px"></i></div>
    </div>

    <div class="request-grid">
        <div class="panel panel-pad">
            <div class="request-banner">
                <div class="request-icon"><i class="fa-solid fa-sparkles"></i></div>
                <div>
                    <div class="request-title">Hurray! No pending leave requests</div>
                    <div class="request-sub">Request leave on the right!</div>
                </div>
            </div>
        </div>
        <div class="panel panel-pad">
            <div class="request-actions">
                <a class="request-btn" href="user-leave-apply.php">Request Leave</a>
                <a class="request-link" href="#">Request Credit for Compensatory Off</a>
                <a class="request-link" href="#">Leave Policy Explanation</a>
            </div>
        </div>
    </div>

    <div style="height:18px"></div>
    <div class="leave-section-title">My Leave Stats</div>
    <div class="leave-stats-grid">
        <div class="panel panel-pad mini-chart-card">
            <div class="mini-chart-head"><div class="mini-title">Weekly Pattern</div><i class="fa-regular fa-circle-question" style="color:#b6bfd0;font-size:12px"></i></div>
            <div class="leave-bars">
                <span style="height:10px"></span><span style="height:20px"></span><span style="height:14px"></span><span style="height:18px"></span><span style="height:28px"></span><span class="muted" style="height:4px"></span><span class="muted" style="height:4px"></span>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:10px;color:#8b95a5;margin-top:6px;"><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span></div>
        </div>
        <div class="panel panel-pad mini-chart-card">
            <div class="mini-chart-head"><div class="mini-title">Consumed Leave Types</div><i class="fa-regular fa-circle-question" style="color:#b6bfd0;font-size:12px"></i></div>
            <div class="mini-donut">
                <svg viewBox="0 0 100 100" aria-label="Leave types">
                    <circle cx="50" cy="50" r="34" fill="none" stroke="#efeafc" stroke-width="12"></circle>
                    <circle cx="50" cy="50" r="34" fill="none" stroke="#9fc33a" stroke-width="12" stroke-dasharray="140 85" stroke-dashoffset="20" transform="rotate(-90 50 50)"></circle>
                    <circle cx="50" cy="50" r="34" fill="none" stroke="#f3c24f" stroke-width="12" stroke-dasharray="32 193" stroke-dashoffset="-130" transform="rotate(-90 50 50)"></circle>
                    <circle cx="50" cy="50" r="34" fill="none" stroke="#8f7bd7" stroke-width="12" stroke-dasharray="24 201" stroke-dashoffset="-170" transform="rotate(-90 50 50)"></circle>
                    <text x="50" y="47" text-anchor="middle" font-size="10">Leave</text>
                    <text x="50" y="59" text-anchor="middle" font-size="10">Types</text>
                </svg>
            </div>
        </div>
        <div class="panel panel-pad mini-chart-card">
            <div class="mini-chart-head"><div class="mini-title">Monthly Stats</div><i class="fa-regular fa-circle-question" style="color:#b6bfd0;font-size:12px"></i></div>
            <div class="mini-months">
                <div class="month-bar" style="height:8px"></div>
                <div class="month-bar" style="height:22px"></div>
                <div class="month-bar" style="height:6px"></div>
                <div class="month-bar" style="height:15px"></div>
                <div class="month-bar" style="height:23px"></div>
                <div class="month-bar" style="height:12px"></div>
                <div class="month-bar" style="height:25px"></div>
                <div class="month-bar" style="height:20px"></div>
                <div class="month-bar" style="height:24px"></div>
                <div class="month-bar" style="height:12px"></div>
                <div class="month-bar" style="height:19px"></div>
                <div class="month-bar" style="height:25px"></div>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:10px;color:#8b95a5;margin-top:6px;"><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span><span>Jan</span><span>Feb</span><span>Mar</span></div>
        </div>
    </div>

    <div style="height:18px"></div>
    <div class="leave-section-title">Leave Balances</div>
    <div class="bal-grid">
        <div class="panel balance-card">
            <div class="balance-head">Casual Leave <a href="#" class="view-link">View details</a></div>
            <div class="ring-wrap">
                <svg viewBox="0 0 120 120" aria-label="Casual leave balance">
                    <circle cx="60" cy="60" r="42" fill="none" stroke="#e3dcf4" stroke-width="14"></circle>
                    <text x="60" y="56" class="ring-center" font-size="12">0 Days</text>
                    <text x="60" y="70" class="ring-center" font-size="12">Available</text>
                </svg>
            </div>
        </div>
        <div class="panel balance-card">
            <div class="balance-head">Comp Offs <a href="#" class="view-link">View details</a></div>
            <div class="ring-wrap" style="font-size:12px;color:#9aa4b2;">No data to display.</div>
        </div>
        <div class="panel balance-card">
            <div class="balance-head">Earned Leave <a href="#" class="view-link">View details</a></div>
            <div class="ring-wrap">
                <svg viewBox="0 0 120 120" aria-label="Earned leave balance">
                    <circle cx="60" cy="60" r="42" fill="none" stroke="#dce8b0" stroke-width="14"></circle>
                    <circle cx="60" cy="60" r="42" fill="none" stroke="#a4c43a" stroke-width="14" stroke-dasharray="10 270" stroke-dashoffset="75" transform="rotate(-90 60 60)"></circle>
                    <text x="60" y="56" class="ring-center" font-size="12">0.25 Days</text>
                    <text x="60" y="70" class="ring-center" font-size="12">Available</text>
                </svg>
            </div>
        </div>
        <div class="panel balance-card">
            <div class="balance-head">Sick Leave <a href="#" class="view-link">View details</a></div>
            <div class="ring-wrap">
                <svg viewBox="0 0 120 120" aria-label="Sick leave balance">
                    <circle cx="60" cy="60" r="42" fill="none" stroke="#f6e4a7" stroke-width="14"></circle>
                    <text x="60" y="56" class="ring-center" font-size="12">0 Days</text>
                    <text x="60" y="70" class="ring-center" font-size="12">Available</text>
                </svg>
            </div>
        </div>
        <div class="panel balance-card">
            <div class="balance-head">Unpaid Leave <a href="#" class="view-link">View details</a></div>
            <div class="ring-wrap">
                <svg viewBox="0 0 120 120" aria-label="Unpaid leave balance">
                    <circle cx="60" cy="60" r="42" fill="none" stroke="#e9daf5" stroke-width="14"></circle>
                    <text x="60" y="56" class="ring-center" font-size="12">∞ Days</text>
                    <text x="60" y="70" class="ring-center" font-size="12">Available</text>
                </svg>
            </div>
            <div class="balance-foot">
                <div>AVAILABLE<strong>∞</strong></div>
                <div>CONSUMED<strong>2.5 days</strong></div>
                <div style="grid-column:1 / span 2;">ANNUAL QUOTA<strong>∞</strong></div>
            </div>
        </div>
    </div>

    <div style="height:18px"></div>
    <div class="other-types">Other Leave Types Available : &nbsp;&nbsp; Optional Leave, Paternity Leave</div>

    <div class="history-head">
        <div class="leave-section-title" style="margin:0">Leave History</div>
        <div class="history-tools">
            <div class="filter-wrap">
                <div class="filter-pill" id="history-leave-type-toggle">Leave Type <i class="fa-solid fa-chevron-down" style="font-size:9px"></i></div>
                <div class="filter-menu" id="history-leave-type-menu">
                    <button type="button" data-filter-value="all" class="active">All Leave Types</button>
                    <button type="button" data-filter-value="sick leave">Sick Leave</button>
                    <button type="button" data-filter-value="earned leave">Earned Leave</button>
                    <button type="button" data-filter-value="casual leave">Casual Leave</button>
                    <button type="button" data-filter-value="optional leave">Optional Leave</button>
                    <button type="button" data-filter-value="paternity leave">Paternity Leave</button>
                </div>
            </div>
            <div class="filter-wrap">
                <div class="filter-pill" id="history-status-toggle">Status <i class="fa-solid fa-chevron-down" style="font-size:9px"></i></div>
                <div class="filter-menu" id="history-status-menu">
                    <button type="button" data-filter-value="all" class="active">All Statuses</button>
                    <button type="button" data-filter-value="approved">Approved</button>
                    <button type="button" data-filter-value="pending">Pending</button>
                    <button type="button" data-filter-value="rejected">Rejected</button>
                </div>
            </div>
            <input class="search-box" type="search" placeholder="Search" aria-label="Search leave history">
        </div>
    </div>

    <div class="table-card">
        <div class="table-top">
            <div></div>
            <div class="table-count">Total: 49</div>
        </div>
        <div style="overflow-x:auto;">
            <table class="leave-table">
                <thead>
                    <tr>
                        <th style="width:14%">Leave Dates</th>
                        <th style="width:11%">Leave Type</th>
                        <th style="width:14%">Status</th>
                        <th style="width:12%">Requested By</th>
                        <th style="width:11%">Action Taken On</th>
                        <th style="width:18%">Leave Note</th>
                        <th style="width:15%">Reject/Cancellation Reason</th>
                        <th style="width:5%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    __LEAVE_HISTORY_ROWS_HTML__
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const leaveTableRows = Array.from(document.querySelectorAll('.leave-table tbody tr'));
    const searchInput = document.querySelector('.history-tools .search-box');
    const leaveTypeToggle = document.getElementById('history-leave-type-toggle');
    const leaveTypeMenu = document.getElementById('history-leave-type-menu');
    const statusToggle = document.getElementById('history-status-toggle');
    const statusMenu = document.getElementById('history-status-menu');
    const periodSelect = document.querySelector('.period-select');
    const periodOptions = ['Apr 2025 - Mar 2026', 'Apr 2024 - Mar 2025', 'Apr 2023 - Mar 2024'];
    let selectedLeaveType = 'all';
    let selectedStatus = 'all';
    let activePeriodIndex = 0;

    function setMenuState(menu, value) {
        if (!menu) return;
        menu.querySelectorAll('button').forEach(btn => {
            btn.classList.toggle('active', (btn.dataset.filterValue || 'all') === value);
        });
    }

    function filterRows() {
        const term = (searchInput ? searchInput.value : '').trim().toLowerCase();
        leaveTableRows.forEach(row => {
            const rowSearch = (row.dataset.search || '').toLowerCase();
            const rowType = (row.dataset.type || '').toLowerCase();
            const rowStatus = (row.dataset.status || '').toLowerCase();
            const matchesSearch = !term || rowSearch.includes(term);
            const matchesType = selectedLeaveType === 'all' || rowType === selectedLeaveType;
            const matchesStatus = selectedStatus === 'all' || rowStatus === selectedStatus;
            row.style.display = matchesSearch && matchesType && matchesStatus ? '' : 'none';
        });
        const visibleCount = leaveTableRows.filter(row => row.style.display !== 'none').length;
        const countNode = document.querySelector('.table-count');
        if (countNode) countNode.textContent = `Total: ${visibleCount}`;
        const tbody = document.querySelector('.leave-table tbody');
        if (tbody && visibleCount === 0) {
            if (!document.getElementById('leave-empty-row')) {
                const emptyRow = document.createElement('tr');
                emptyRow.id = 'leave-empty-row';
                emptyRow.innerHTML = '<td colspan="8" class="leave-empty">No leave history matches your filters.</td>';
                tbody.appendChild(emptyRow);
            }
        } else {
            const emptyRow = document.getElementById('leave-empty-row');
            if (emptyRow) emptyRow.remove();
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterRows);
    }

    if (leaveTypeToggle && leaveTypeMenu) {
        leaveTypeToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            leaveTypeMenu.classList.toggle('open');
            if (statusMenu) statusMenu.classList.remove('open');
        });
        leaveTypeMenu.addEventListener('click', function (event) {
            const button = event.target.closest('button[data-filter-value]');
            if (!button) return;
            selectedLeaveType = button.dataset.filterValue || 'all';
            setMenuState(leaveTypeMenu, selectedLeaveType);
            leaveTypeToggle.firstChild && (leaveTypeToggle.firstChild.textContent = selectedLeaveType === 'all' ? 'Leave Type ' : `${button.textContent} `);
            leaveTypeMenu.classList.remove('open');
            filterRows();
        });
    }

    if (statusToggle && statusMenu) {
        statusToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            statusMenu.classList.toggle('open');
            if (leaveTypeMenu) leaveTypeMenu.classList.remove('open');
        });
        statusMenu.addEventListener('click', function (event) {
            const button = event.target.closest('button[data-filter-value]');
            if (!button) return;
            selectedStatus = button.dataset.filterValue || 'all';
            setMenuState(statusMenu, selectedStatus);
            statusToggle.firstChild && (statusToggle.firstChild.textContent = selectedStatus === 'all' ? 'Status ' : `${button.textContent} `);
            statusMenu.classList.remove('open');
            filterRows();
        });
    }

    if (periodSelect) {
        periodSelect.style.cursor = 'pointer';
        periodSelect.addEventListener('click', function (event) {
            event.stopPropagation();
            activePeriodIndex = (activePeriodIndex + 1) % periodOptions.length;
            periodSelect.firstChild.textContent = periodOptions[activePeriodIndex] + ' ';
            filterRows();
        });
    }

    document.addEventListener('click', function () {
        if (leaveTypeMenu) leaveTypeMenu.classList.remove('open');
        if (statusMenu) statusMenu.classList.remove('open');
    });

    filterRows();
});
</script>
HTML;

 $pageContent = str_replace('__LEAVE_HISTORY_ROWS_HTML__', $leaveHistoryTableHtml, $pageContent);

include __DIR__ . '/includes/myteam-shell.php';
