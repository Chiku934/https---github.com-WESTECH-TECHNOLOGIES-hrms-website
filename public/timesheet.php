<?php

declare(strict_types=1);

$title = 'HRMS - Timesheet';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php', 'active' => true],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Helpdesk', 'url' => 'user-support.php'],
];

$timesheetWeeks = [
    '30 Mar - 05 Apr 2026',
    '23 Mar - 29 Mar 2026',
    '16 Mar - 22 Mar 2026',
];

$projectTimeProjects = [
    ['name' => 'BHUBANESWAR SMART CITY', 'org' => 'GDLH -', 'client' => 'Bhubaneswar Municipal Corporation'],
    ['name' => 'PURI HERITAGE UPGRADE', 'org' => 'GHL -', 'client' => 'Puri Development Authority'],
    ['name' => 'SAMBALPUR WATER DASHBOARD', 'org' => 'GHL -', 'client' => 'Sambalpur Water Works'],
    ['name' => 'CUTTACK HEALTH PORTAL', 'org' => 'GDLH -', 'client' => 'Cuttack District Health Office'],
    ['name' => 'ROURKELA SCHOOL ERP', 'org' => 'GSI -', 'client' => 'Rourkela Education Board'],
    ['name' => 'BALASORE HRMS ROLL OUT', 'org' => 'GSU -', 'client' => 'Balasore Unit - Internal'],
    ['name' => 'ODISHA PAYROLL HUB', 'org' => 'GSI -', 'client' => 'Gemini - Internal'],
    ['name' => 'BHADRAK FIELD SERVICE', 'org' => 'GCS -', 'client' => 'Gemini - Internal'],
    ['name' => 'BARIPADA NO TASK ASSIGNED', 'org' => 'GDLH -', 'client' => 'Gemini - Internal'],
    ['name' => 'JAJPUR ERP MIGRATION', 'org' => 'GHL -', 'client' => 'Jajpur Industrial Council'],
    ['name' => 'KORAPUT CRM MODERNIZATION', 'org' => 'GHL -', 'client' => 'Koraput District Office'],
];

$projectTimeListHtml = '';
foreach ($projectTimeProjects as $index => $project) {
    $projectTimeListHtml .= sprintf(
        '<div class="project-item%s" data-project-name="%s %s"><div class="project-name"><span>%s</span><span style="color:#95a0b3;font-weight:600;font-size:10px;white-space:nowrap;">%s</span></div><div class="project-sub">%s</div></div>',
        $index === 0 ? ' active' : '',
        htmlspecialchars(strtolower($project['name']), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars(strtolower($project['client']), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($project['org'], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($project['client'], ENT_QUOTES, 'UTF-8')
    );
}

$timeSummaryLabels = [
    '16 Jan - 22 Jan',
    '23 Jan - 29 Jan',
    '30 Jan - 05 Feb',
    '06 Feb - 12 Feb',
    '13 Feb - 19 Feb',
    '20 Feb - 26 Feb',
    '27 Feb - 05 Mar',
    '06 Mar - 12 Mar',
    '13 Mar - 19 Mar',
    '20 Mar - 26 Mar',
    '27 Mar - 29 Mar',
];

$timeSummaryValues = [0, 0, 32, 40, 40, 16, 40, 32, 40, 24, 40];

$myTasksRows = [
    ['Bhubaneswar Smart City Sprint', 'NA', 'BHUBANESWAR SMART CITY', 'Jitesh Kumar Das', 'Nov 17, 2026<br><span class="summary-mini">starts on Nov 14, 2025</span>', '65.00 hrs / 4 hrs', 'Completed', 'green'],
    ['Puri Heritage Dashboard Review', 'NA', 'PURI HERITAGE UPGRADE', 'Soumyadarshini Dash', 'Dec 06, 2025<br><span class="summary-mini">starts on Nov 23, 2025</span>', '38.50 hrs / 1 hrs', 'Completed', 'green'],
    ['Cuttack Health Portal Demo', 'NA', 'CUTTACK HEALTH PORTAL', 'Purushottama Sahoo', 'Mar 31, 2026<br><span class="summary-mini">starts on Dec 18, 2025</span>', '0 hrs / 50 hrs', 'Not Started', 'yellow'],
    ['Sambalpur Water Board Meetup', 'NA', 'SAMBALPUR WATER DASHBOARD', 'Goutham Kurangi', 'Dec 19, 2026<br><span class="summary-mini">starts on Dec 18, 2025</span>', '81.42 hrs / 1 hrs', 'Completed', 'green'],
    ['Rourkela School ERP Visit', 'NA', 'ROURKELA SCHOOL ERP', 'Prajwal Chandra Nayak', 'Feb 28, 2026<br><span class="summary-mini">starts on Dec 19, 2025</span>', '50.00 hrs / NA', 'In Progress', 'blue'],
    ['Balasore HRMS Rollout Prep', 'NA', 'BALASORE HRMS ROLL OUT', 'Jitesh Kumar Das', 'Dec 30, 2025<br><span class="summary-mini">starts on Dec 23, 2025</span>', '97.50 hrs / 2 hrs', 'Completed', 'green'],
    ['Odisha Payroll Hub Planning', 'NA', 'ODISHA PAYROLL HUB', 'Soumyadarshini Dash', 'Dec 31, 2026<br><span class="summary-mini">starts on Jan 09, 2026</span>', '92.00 hrs / 2 hrs', 'In Progress', 'blue'],
    ['Bhadrak Field Service Visit', 'NA', 'BHADRAK FIELD SERVICE', 'Goutham Kurangi', 'Dec 27, 2026<br><span class="summary-mini">starts on Jan 21, 2026</span>', '40.50 hrs / 1 hrs', 'In Progress', 'blue'],
    ['Baripada Audit Prep', 'NA', 'BARIPADA NO TASK ASSIGNED', 'Purushottama Sahoo', 'Dec 31, 2026<br><span class="summary-mini">starts on Mar 06, 2026</span>', '98.00 hrs / 8 hrs', 'In Progress', 'blue'],
    ['Koraput CRM Sync', 'NA', 'KORAPUT CRM MODERNIZATION', 'Prajwal Chandra Nayak', 'Dec 31, 2026<br><span class="summary-mini">starts on Mar 18, 2026</span>', '58.50 hrs / 2 hrs', 'In Progress', 'blue'],
];

$projectsAllocatedRows = [
    ['BHUBANESWAR SMART CITY', 'In Progress', 'Jitesh Kumar Das', '01 Mar 2025 - 31 Mar 2026'],
    ['PURI HERITAGE UPGRADE', 'Completed', 'Soumyadarshini Dash', '01 Nov 2024 - 31 Mar 2025'],
    ['SAMBALPUR WATER DASHBOARD', 'In Progress', 'Purushottama Sahoo', '13 Sep 2024 - 31 Jul 2026'],
    ['CUTTACK HEALTH PORTAL', 'In Progress', 'NA', '02 May 2024 - 31 Mar 2025'],
    ['ROURKELA SCHOOL ERP', 'In Progress', 'Jitesh Kumar Das', '02 May 2024 - 31 Mar 2025'],
    ['BALASORE HRMS ROLL OUT', 'Completed', 'Jitesh Kumar Das', '02 May 2024 - 30 Sep 2024'],
    ['ODISHA PAYROLL HUB', 'In Progress', 'Prajwal Chandra Nayak', '01 Aug 2025 - 28 Feb 2026'],
];

$myTasksTableHtml = '';
foreach ($myTasksRows as $task) {
    $myTasksTableHtml .= sprintf(
        '<tr data-stage="%s" data-search="%s"><td><div class="task-title">%s</div><div class="task-sub">GSU-A-T-2023-8-3</div></td><td>%s</td><td>%s</td><td style="color:#6b55bc;">%s</td><td>%s</td><td><span class="hours-pill">%s</span></td><td><span class="status-dot status-%s"></span>%s</td></tr>',
        htmlspecialchars(strtolower($task[6]), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars(strtolower($task[0] . ' ' . $task[2] . ' ' . $task[3]), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($task[0], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($task[1], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($task[2], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($task[3], ENT_QUOTES, 'UTF-8'),
        $task[4],
        htmlspecialchars($task[5], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($task[7], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($task[6], ENT_QUOTES, 'UTF-8')
    );
}

$projectsAllocatedTableHtml = '';
foreach ($projectsAllocatedRows as $row) {
    $projectsAllocatedTableHtml .= sprintf(
        '<tr data-status="%s" data-search="%s"><td class="allocated-expander"><i class="fa-solid fa-chevron-right"></i></td><td>%s</td><td>%s</td><td style="color:#6b55bc;">%s</td><td>%s</td></tr>',
        htmlspecialchars(strtolower($row[1]), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars(strtolower($row[0] . ' ' . $row[2]), ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row[1], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row[2], ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8')
    );
}

$pageContent = <<<'HTML'
<style>
    .timesheet-page{display:flex;flex-direction:column;gap:12px;color:#1f2937}
    .timesheet-tabs{display:flex;align-items:center;gap:0;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
    .timesheet-tab{padding:11px 16px;font-size:12px;font-weight:500;color:#728096;text-decoration:none;border-right:1px solid #edf1f6;white-space:nowrap;position:relative;transition:background-color .15s ease,color .15s ease,transform .15s ease}
    .timesheet-tab:last-child{border-right:0}
    .timesheet-tab.active{background:#f7f3ff;color:#4f4a95;font-weight:600}
    .timesheet-tab.active::after{content:'';position:absolute;left:0;right:0;bottom:0;height:2px;background:#6b55bc}
    .timesheet-header{display:flex;align-items:center;justify-content:space-between;gap:12px}
    .timesheet-title{font-size:18px;font-weight:700;color:#1e293b;margin:0}
    .ts-toggle-group{display:flex;align-items:center;gap:10px;color:#637089;font-size:12px}
    .ts-switch{width:32px;height:18px;background:#e2e8f0;border-radius:999px;position:relative;transition:background .15s ease}
    .ts-switch::after{content:'';position:absolute;top:2px;left:2px;width:14px;height:14px;border-radius:50%;background:#fff;box-shadow:0 1px 2px rgba(0,0,0,.18);transition:left .15s ease}
    .ts-switch.on{background:#6b55bc}
    .ts-switch.on::after{left:16px}
    .ts-toolbar,.ts-summary,.ts-grid-card,.ts-footer-row,.ts-bottom-grid{background:#fff;border:1px solid #e5eaf2;border-radius:2px}
    .ts-toolbar{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:14px 16px}
    .week-nav{display:flex;align-items:center;gap:8px}
    .nav-btn{width:24px;height:24px;border:1px solid #e2e8f0;background:#fff;border-radius:2px;color:#6b7280;cursor:pointer;display:inline-flex;align-items:center;justify-content:center}
    .date-pill{display:inline-flex;align-items:center;gap:8px;padding:5px 10px;border:1px solid #e2e8f0;border-radius:2px;font-size:12px;font-weight:600;color:#334155;min-width:150px;justify-content:center}
    .toolbar-actions{display:flex;align-items:center;gap:10px}
    .copy-btn{border:1px solid #8e7bd9;color:#6b55bc;background:#fff;padding:6px 12px;border-radius:3px;font-size:12px;font-weight:600;cursor:pointer}
    .icon-btn{width:28px;height:28px;border:1px solid #e2e8f0;background:#fff;border-radius:2px;color:#64748b;cursor:pointer;display:inline-flex;align-items:center;justify-content:center}
    .ts-summary{display:flex;align-items:flex-end;gap:28px;padding:16px 16px 14px}
    .summary-block{min-width:170px}
    .summary-label{font-size:11px;color:#64748b;font-weight:600;margin-bottom:4px;display:flex;align-items:center;gap:5px}
    .summary-value{font-size:16px;font-weight:700;color:#1e293b}
    .summary-bar{width:170px;height:7px;background:#edf2f7;border-radius:999px;overflow:hidden;margin-top:8px}
    .summary-bar-fill{height:100%;width:20%;background:#6ec9d9;border-radius:999px}
    .summary-dot{width:8px;height:8px;border-radius:50%;background:#6ec9d9;display:inline-block}
    .ts-grid-card{padding:0;overflow:hidden}
    .ts-grid{width:100%;border-collapse:collapse;table-layout:fixed}
    .ts-grid thead th{background:#f3f5f8;color:#687385;font-size:9px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;padding:10px;border-bottom:1px solid #e5eaf2;text-align:left}
    .ts-grid thead th:not(:first-child), .ts-grid tbody td:not(:first-child), .ts-grid tfoot td:not(:first-child){text-align:center}
    .ts-grid tbody td,.ts-grid tfoot td{padding:14px 10px;border-bottom:1px solid #f0f2f6;font-size:12px;color:#334155;vertical-align:top}
    .ts-project{font-weight:600;color:#1e293b}
    .ts-subtext{font-size:11px;color:#8b95a5}
    .ts-total-row td{background:#f8fafc;font-weight:700;color:#1f2937}
    .ts-total-row .label{display:flex;align-items:center;gap:5px;justify-content:flex-end}
    .ts-issue{display:flex;align-items:center;gap:8px;color:#6b55bc;font-weight:600;font-size:12px;padding:12px 16px}
    .ts-issue-row{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:12px 16px;border-top:1px solid #eef2f7}
    .ts-actions{display:flex;align-items:center;gap:10px}
    .secondary-btn{border:1px solid #d8dff0;background:#fff;color:#6b55bc;padding:7px 14px;border-radius:3px;font-size:12px;font-weight:600;cursor:pointer}
    .comment-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
    .panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;padding:14px}
    .panel-title{font-size:14px;font-weight:700;color:#263244;margin:0 0 14px}
    .empty-box{display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:170px;color:#9aa4b2;text-align:center}
    .empty-box i{font-size:38px;color:#d0d7e2;margin-bottom:10px}
    .activity-range{font-size:11px;color:#8b95a5;font-weight:500}
    .project-time-layout{display:none;grid-template-columns:170px 1fr;gap:12px}
    .project-time-layout.active{display:grid}
    .project-rail{background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden;height:369px;display:flex;flex-direction:column}
    .project-rail-head{padding:10px 12px;border-bottom:1px solid #eef2f7;background:#fbfcfe}
    .project-rail-title{font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.04em}
    .project-rail-search{padding:10px 10px 8px;border-bottom:1px solid #eef2f7}
    .project-rail-search .search-box{width:100%;height:28px;border:1px solid #e2e8f0;border-radius:2px;padding:0 10px;font-size:12px;color:#334155;outline:none}
    .project-list{overflow:auto;flex:1}
    .project-item{padding:8px 10px;border-bottom:1px solid #f0f2f6;cursor:pointer}
    .project-item:hover,.project-item.active{background:#f4f0ff}
    .project-name{font-size:11px;font-weight:700;color:#3b4457;line-height:1.2;margin-bottom:2px;display:flex;justify-content:space-between;gap:8px}
    .project-sub{font-size:10px;color:#8b95a5;line-height:1.25}
    .project-content{display:flex;flex-direction:column;gap:12px}
    .project-summary{background:#fff;border:1px solid #e5eaf2;border-radius:2px;padding:14px 16px;display:flex;align-items:center;min-height:68px}
    .project-summary-value{font-size:18px;font-weight:700;color:#1f2937;line-height:1.1}
    .project-summary-label{font-size:11px;color:#64748b;margin-top:2px}
    .project-toolbar{display:flex;align-items:center;gap:10px;background:#fff;border:1px solid #e5eaf2;border-radius:2px;padding:8px 10px}
    .project-toolbar .date-pill{min-width:154px;justify-content:flex-start}
    .project-toolbar .search-input{flex:1;min-width:0;border:0;outline:none;font:inherit;color:#334155;font-size:12px}
    .project-panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;min-height:250px;display:flex;align-items:center;justify-content:center}
    .project-empty{text-align:center;color:#a0a8b7}
    .project-empty i{font-size:42px;color:#d5dae4;margin-bottom:10px}
    .project-empty strong{display:block;font-size:15px;color:#8f98a7;margin-bottom:6px}
    .project-empty small{display:block;font-size:12px;color:#9aa4b2;max-width:360px}
    .project-empty .project-range-note{margin-top:8px;font-size:11px;color:#b0b8c6}
    .project-calendar-popover{position:fixed;left:0;top:0;z-index:20;background:#fff;border:1px solid #e5eaf2;border-radius:8px;box-shadow:0 18px 40px rgba(15,23,42,.12);padding:12px;width:280px;display:none}
    .project-calendar-popover.open{display:block}
    .project-calendar-popover .row{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:10px}
    .project-calendar-popover label{display:block;font-size:10px;font-weight:700;color:#8b95a5;text-transform:uppercase;letter-spacing:.04em;margin-bottom:4px}
    .project-calendar-popover input{width:100%;height:32px;border:1px solid #e2e8f0;border-radius:4px;padding:0 8px;font:inherit;font-size:12px;color:#334155}
    .project-calendar-actions{display:flex;justify-content:flex-end;gap:8px}
    .project-calendar-actions button{border:1px solid #d8dff0;background:#fff;color:#6b55bc;padding:6px 10px;border-radius:4px;font-size:12px;font-weight:600;cursor:pointer}
    .project-calendar-actions button.primary{background:#6b55bc;color:#fff;border-color:#6b55bc}
    .project-toolbar-wrap{position:relative}
    .week-toolbar-wrap{position:relative}
    .week-calendar-popover{position:fixed;left:0;top:0;z-index:20;background:#fff;border:1px solid #e5eaf2;border-radius:8px;box-shadow:0 18px 40px rgba(15,23,42,.12);padding:12px;width:280px;display:none}
    .week-calendar-popover.open{display:block}
    .week-calendar-popover .row{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:10px}
    .week-calendar-popover label{display:block;font-size:10px;font-weight:700;color:#8b95a5;text-transform:uppercase;letter-spacing:.04em;margin-bottom:4px}
    .week-calendar-popover input{width:100%;height:32px;border:1px solid #e2e8f0;border-radius:4px;padding:0 8px;font:inherit;font-size:12px;color:#334155}
    .week-calendar-actions{display:flex;justify-content:flex-end;gap:8px}
    .week-calendar-actions button{border:1px solid #d8dff0;background:#fff;color:#6b55bc;padding:6px 10px;border-radius:4px;font-size:12px;font-weight:600;cursor:pointer}
    .week-calendar-actions button.primary{background:#6b55bc;color:#fff;border-color:#6b55bc}
    .view-mode.compact .ts-grid tbody td,.view-mode.compact .ts-grid tfoot td{padding-top:10px;padding-bottom:10px}
    .timesheet-toast{position:fixed;right:16px;bottom:16px;background:#1f2937;color:#fff;padding:10px 12px;border-radius:8px;font-size:12px;box-shadow:0 12px 30px rgba(15,23,42,.18);opacity:0;transform:translateY(8px);pointer-events:none;transition:opacity .2s ease,transform .2s ease;z-index:50}
    .timesheet-toast.show{opacity:1;transform:translateY(0)}
    .summary-view{display:none;flex-direction:column;gap:12px}
    .summary-view.active{display:flex}
    .summary-chart-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;padding:14px 14px 8px}
    .summary-chart-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 8px}
    .summary-chart-wrap{position:relative;height:330px;border-top:1px solid #f1f4f8}
    .summary-chart-wrap svg{width:100%;height:100%}
    .summary-legend{display:flex;justify-content:center;align-items:center;gap:8px;font-size:12px;color:#6b7280;margin-top:6px}
    .summary-legend-dot{width:8px;height:8px;background:#ff8c63;display:inline-block}
    .summary-table-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
    .summary-table-head{display:flex;align-items:center;justify-content:space-between;padding:10px 14px;border-bottom:1px solid #eef2f7}
    .summary-download{width:26px;height:26px;border:0;background:transparent;color:#94a3b8;cursor:pointer}
    .summary-table{width:100%;border-collapse:collapse}
    .summary-table th,.summary-table td{padding:10px 14px;border-bottom:1px solid #f1f4f8;font-size:12px;color:#334155;text-align:left}
    .summary-table th{background:#f8fafc;font-size:10px;text-transform:uppercase;letter-spacing:.04em;color:#7b8796}
    .summary-mini{font-size:11px;color:#8b95a5}
    .task-view,.project-allocated-view{display:none;flex-direction:column;gap:12px}
    .task-view.active,.project-allocated-view.active{display:flex}
    .task-toolbar,.allocated-toolbar{background:#fff;border:1px solid #e5eaf2;border-radius:2px;padding:0 14px;display:flex;align-items:center;justify-content:space-between;gap:12px;height:47px}
    .task-filter,.allocated-filter{border:0;outline:none;background:transparent;font:inherit;font-size:12px;color:#334155}
    .task-search,.allocated-search{flex:1;min-width:0;height:100%;border:0;outline:none;font:inherit;font-size:12px;color:#334155}
    .task-table-card,.allocated-table-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
    .task-table,.allocated-table{width:100%;border-collapse:collapse}
    .task-table th,.task-table td,.allocated-table th,.allocated-table td{padding:12px 14px;border-bottom:1px solid #f1f4f8;font-size:12px;color:#334155;vertical-align:top}
    .task-table th,.allocated-table th{background:#f8fafc;font-size:10px;text-transform:uppercase;letter-spacing:.04em;color:#7b8796;font-weight:700}
    .task-title{color:#6b55bc;font-weight:600}
    .task-sub{font-size:11px;color:#8b95a5;margin-top:3px}
    .hours-pill{display:inline-block;padding:2px 0;font-weight:600}
    .status-dot{display:inline-block;width:8px;height:8px;border-radius:50%;margin-right:8px;vertical-align:middle}
    .status-green{background:#92b23f}
    .status-yellow{background:#c7b36b}
    .status-blue{background:#6ca5db}
    .allocated-expander{width:18px;color:#b8c0cf}
    .allocated-pagination{display:flex;justify-content:flex-end;gap:10px;padding:10px 14px;font-size:12px;color:#8b95a5}
    @media (max-width:1180px){.comment-grid{grid-template-columns:1fr}.ts-toolbar,.ts-summary{flex-wrap:wrap}.toolbar-actions{width:100%;justify-content:flex-end}.ts-summary{align-items:flex-start}}
    @media (max-width:720px){.timesheet-title{font-size:16px}.ts-grid{min-width:980px}.timesheet-tabs{overflow-x:auto}.project-time-layout{grid-template-columns:1fr}}
</style>

<div class="timesheet-page">
    <div class="timesheet-tabs" id="timesheet-main-tabs" role="tablist" aria-label="Timesheet views">
        <a href="#" class="timesheet-tab active" data-view="all">All Timesheets</a>
        <a href="#" class="timesheet-tab" data-view="past-due">Past Due <span style="display:inline-flex;align-items:center;justify-content:center;width:16px;height:16px;border-radius:999px;background:#ef4444;color:#fff;font-size:10px;font-weight:700;margin-left:4px;">4</span></a>
        <a href="#" class="timesheet-tab" data-view="rejected">Rejected Timesheets</a>
        <a href="#" class="timesheet-tab" data-view="project">Project Time</a>
        <a href="#" class="timesheet-tab" data-view="summary">Time Summary</a>
        <a href="#" class="timesheet-tab" data-view="tasks">My Tasks</a>
        <a href="#" class="timesheet-tab" data-view="projects">Projects Allocated</a>
    </div>

    <div class="timesheet-header">
        <h1 class="timesheet-title" id="timesheet-heading">All Timesheets</h1>
        <div class="ts-toggle-group">
            <span>Submit daily time entry</span>
            <button type="button" class="ts-switch" id="daily-entry-switch" aria-pressed="false" aria-label="Submit daily time entry"></button>
            <button type="button" class="icon-btn" aria-label="View list"><i class="fa-solid fa-list"></i></button>
            <button type="button" class="icon-btn" aria-label="View grid"><i class="fa-solid fa-grip"></i></button>
        </div>
    </div>

    <div class="ts-toolbar">
        <div class="week-nav">
            <button type="button" class="nav-btn" id="week-prev" aria-label="Previous week"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="date-pill" id="week-range">30 Mar - 05 Apr 2026</div>
            <button type="button" class="nav-btn" id="week-next" aria-label="Next week"><i class="fa-solid fa-chevron-right"></i></button>
            <button type="button" class="icon-btn" id="week-calendar-toggle" aria-label="Pick date"><i class="fa-regular fa-calendar"></i></button>
        </div>
        <div class="toolbar-actions">
            <button type="button" class="copy-btn">Copy last week hours</button>
            <button type="button" class="icon-btn" id="week-layout-toggle" aria-label="Toggle compact layout"><i class="fa-solid fa-ellipsis"></i></button>
        </div>
        <div class="week-toolbar-wrap">
            <div class="week-calendar-popover" id="week-calendar-popover" aria-label="Timesheet date range selector">
                <div class="row">
                    <div>
                        <label for="week-calendar-start">Start date</label>
                        <input type="date" id="week-calendar-start">
                    </div>
                    <div>
                        <label for="week-calendar-end">End date</label>
                        <input type="date" id="week-calendar-end">
                    </div>
                </div>
                <div class="week-calendar-actions">
                    <button type="button" id="week-calendar-cancel">Cancel</button>
                    <button type="button" class="primary" id="week-calendar-apply">Apply</button>
                </div>
            </div>
        </div>
    </div>

    <div class="ts-summary">
        <div class="summary-block">
            <div class="summary-label">Total <i class="fa-regular fa-circle-question"></i></div>
            <div class="summary-value" id="total-hours-value">8:00 / 40:00</div>
            <div class="summary-bar"><div class="summary-bar-fill" id="total-hours-fill" style="width:20%"></div></div>
        </div>
        <div class="summary-block">
            <div class="summary-label">Time Off</div>
            <div class="summary-value" style="display:flex;align-items:center;gap:6px;"><span class="summary-dot"></span><span id="time-off-value">8:00</span></div>
        </div>
    </div>

    <div class="ts-grid-card">
        <table class="ts-grid" aria-label="Timesheet grid">
            <thead id="timesheet-head">
                <tr>
                    <th style="width:39%">Projects</th>
                    <th>30 Mar<br>Mon</th>
                    <th>31 Mar<br>Tue</th>
                    <th>01 Apr<br>Wed</th>
                    <th>02 Apr<br>Thu</th>
                    <th>03 Apr<br>Fri</th>
                    <th>04 Apr<br>Sat</th>
                    <th>05 Apr<br>Sun</th>
                    <th style="width:9%">Task Total<br>HRS/ WEEK</th>
                </tr>
            </thead>
            <tbody id="timesheet-body"></tbody>
            <tfoot>
                <tr class="ts-total-row">
                    <td><span class="label">Total hours/day <i class="fa-regular fa-circle-question" style="font-size:10px;color:#94a3b8"></i></span></td>
                    <td>0:00</td>
                    <td>0:00</td>
                    <td>0:00</td>
                    <td>0:00</td>
                    <td>0:00</td>
                    <td>0:00</td>
                    <td>0:00</td>
                    <td>0:00</td>
                </tr>
            </tfoot>
        </table>
        <div class="ts-issue">↳ Request Leave</div>
        <div class="ts-issue-row">
            <div class="ts-actions">
                <button type="button" class="secondary-btn">Attach file</button>
            </div>
            <div class="ts-actions">
                <button type="button" class="secondary-btn">Save</button>
                <button type="button" class="secondary-btn">Submit weekly timesheet</button>
            </div>
        </div>
    </div>

    <div class="project-time-layout" id="project-time-layout" aria-label="Project time view">
        <aside class="project-rail">
            <div class="project-rail-head">
                <div class="project-rail-title">Projects</div>
            </div>
            <div class="project-rail-search">
                <input type="text" class="search-box" id="project-search" placeholder="Search">
            </div>
            <div class="project-list" id="project-list">__PROJECT_LIST_HTML__</div>
        </aside>

        <section class="project-content">
            <div class="project-summary">
                <div>
                    <div class="project-summary-value">0:00 Hrs</div>
                    <div class="project-summary-label">Total Duration</div>
                </div>
            </div>

            <div class="project-toolbar-wrap">
            <div class="project-toolbar">
                <div class="date-pill" id="project-date-range">03 Mar 2026 - 30 Mar 2026</div>
                <input type="text" class="search-input" id="project-time-search" placeholder="Search">
                <button type="button" class="icon-btn" id="project-calendar-toggle" aria-label="Pick date"><i class="fa-regular fa-calendar"></i></button>
            </div>
                <div class="project-calendar-popover" id="project-calendar-popover" aria-label="Project date range selector">
                    <div class="row">
                        <div>
                            <label for="project-calendar-start">Start date</label>
                            <input type="date" id="project-calendar-start">
                        </div>
                        <div>
                            <label for="project-calendar-end">End date</label>
                            <input type="date" id="project-calendar-end">
                        </div>
                    </div>
                    <div class="project-calendar-actions">
                        <button type="button" id="project-calendar-cancel">Cancel</button>
                        <button type="button" class="primary" id="project-calendar-apply">Apply</button>
                    </div>
                </div>
            </div>

            <div class="project-panel">
                <div class="project-empty">
                    <i class="fa-regular fa-ghost"></i>
                    <strong>No timesheets logged</strong>
                    <small>Timesheets logged against this project will appear here.</small>
                    <div class="project-range-note" id="project-range-note">03 Mar 2026 - 30 Mar 2026</div>
                </div>
            </div>
        </section>
    </div>

    <div class="summary-view" id="time-summary-view" aria-label="Time summary view">
        <div class="summary-chart-card">
            <h2 class="summary-chart-title">Timesheet Hours</h2>
            <div class="summary-chart-wrap" id="summary-chart-wrap"></div>
            <div class="summary-legend"><span class="summary-legend-dot"></span><span>Total Hours</span></div>
        </div>
        <div class="summary-table-card">
            <div class="summary-table-head">
                <div></div>
                <button type="button" class="summary-download" aria-label="Download summary"><i class="fa-solid fa-download"></i></button>
            </div>
            <table class="summary-table" aria-label="Time summary table">
                <thead>
                    <tr>
                        <th>Timesheet Period</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>30 Mar - 05 Apr 2026 <div class="summary-mini">Current week</div></td>
                        <td>40:00</td>
                        <td>Submitted</td>
                    </tr>
                    <tr>
                        <td>23 Mar - 29 Mar 2026 <div class="summary-mini">Previous week</div></td>
                        <td>36:00</td>
                        <td>Approved</td>
                    </tr>
                    <tr>
                        <td>16 Mar - 22 Mar 2026 <div class="summary-mini">Two weeks ago</div></td>
                        <td>38:00</td>
                        <td>Approved</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="task-view" id="my-tasks-view" aria-label="My tasks view">
        <div class="task-toolbar">
            <select class="task-filter" id="task-stage-filter">
                <option>Task Stage</option>
                <option>Completed</option>
                <option>In Progress</option>
                <option>Not Started</option>
            </select>
            <input type="text" class="task-search" id="task-search" placeholder="Search tasks or project">
        </div>
        <div class="task-table-card">
            <table class="task-table" aria-label="Tasks table">
                <thead>
                    <tr>
                        <th>Tasks</th>
                        <th>Phase</th>
                        <th>Project</th>
                        <th>Project Manager</th>
                        <th>End Date</th>
                        <th>Hours</th>
                        <th>Task Stage</th>
                    </tr>
                </thead>
                <tbody id="task-table-body">__TASK_ROWS_HTML__</tbody>
            </table>
        </div>
    </div>

    <div class="project-allocated-view" id="projects-allocated-view" aria-label="Projects allocated view">
        <div class="allocated-toolbar">
            <input type="date" class="task-filter" id="alloc-from" aria-label="Allocation from">
            <input type="date" class="task-filter" id="alloc-to" aria-label="Allocation to">
            <select class="task-filter" id="alloc-status">
                <option>Project Status</option>
                <option>In Progress</option>
                <option>Completed</option>
            </select>
            <input type="text" class="allocated-search" id="alloc-search" placeholder="Search">
            <button type="button" class="summary-download" aria-label="Download allocations"><i class="fa-solid fa-download"></i></button>
        </div>
        <div class="allocated-table-card">
            <table class="allocated-table" aria-label="Projects allocated table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Project</th>
                        <th>Project Status</th>
                        <th>Project Managers</th>
                        <th>Project Duration</th>
                    </tr>
                </thead>
                <tbody id="allocated-table-body">__ALLOC_ROWS_HTML__</tbody>
            </table>
            <div class="allocated-pagination">
                <span>1 to 7 of 7</span>
                <span>Page 1 of 1</span>
            </div>
        </div>
    </div>

    <div class="comment-grid">
        <div class="panel">
            <div class="panel-title">Comment Summary</div>
            <div class="empty-box">
                <i class="fa-regular fa-comments"></i>
                <div style="font-size:14px;font-weight:600;color:#8f98a7">No comments yet</div>
                <div style="font-size:12px;margin-top:4px;">Comment added against each time entry</div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title">Timesheet Activity <span class="activity-range">(30 Mar - 05 Apr 2026)</span></div>
            <div class="empty-box">
                <i class="fa-regular fa-ghost"></i>
                <div style="font-size:14px;font-weight:600;color:#8f98a7">No activity found</div>
            </div>
        </div>
    </div>
    <div class="timesheet-toast" id="timesheet-toast" role="status" aria-live="polite"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const timesheetPage = document.querySelector('.timesheet-page');
    const tabs = Array.from(document.querySelectorAll('#timesheet-main-tabs .timesheet-tab'));
    const heading = document.getElementById('timesheet-heading');
    const weekRange = document.getElementById('week-range');
    const body = document.getElementById('timesheet-body');
    const totalValue = document.getElementById('total-hours-value');
    const totalFill = document.getElementById('total-hours-fill');
    const timeOffValue = document.getElementById('time-off-value');
    const dailyEntrySwitch = document.getElementById('daily-entry-switch');
    const projectLayout = document.getElementById('project-time-layout');
    const projectRailSearch = document.getElementById('project-search');
    const projectTimeSearch = document.getElementById('project-time-search');
    const projectCalendarToggle = document.getElementById('project-calendar-toggle');
    const projectCalendarPopover = document.getElementById('project-calendar-popover');
    const projectCalendarStart = document.getElementById('project-calendar-start');
    const projectCalendarEnd = document.getElementById('project-calendar-end');
    const projectCalendarApply = document.getElementById('project-calendar-apply');
    const projectCalendarCancel = document.getElementById('project-calendar-cancel');
    const projectRangeNote = document.getElementById('project-range-note');
    const projectItems = Array.from(document.querySelectorAll('.project-item'));
    const defaultGrid = document.querySelector('.ts-grid-card');
    const defaultSummary = document.querySelector('.ts-summary');
    const defaultToolbar = document.querySelector('.ts-toolbar');
    const defaultComments = document.querySelector('.comment-grid');
    const projectDateRange = document.getElementById('project-date-range');
    const summaryView = document.getElementById('time-summary-view');
    const summaryChartWrap = document.getElementById('summary-chart-wrap');
    const taskView = document.getElementById('my-tasks-view');
    const taskSearch = document.getElementById('task-search');
    const taskStageFilter = document.getElementById('task-stage-filter');
    const taskRows = Array.from(document.querySelectorAll('#task-table-body tr'));
    const allocatedView = document.getElementById('projects-allocated-view');
    const allocSearch = document.getElementById('alloc-search');
    const allocStatus = document.getElementById('alloc-status');
    const allocRows = Array.from(document.querySelectorAll('#allocated-table-body tr'));
    const weekPrev = document.getElementById('week-prev');
    const weekNext = document.getElementById('week-next');
    const weekCalendarToggle = document.getElementById('week-calendar-toggle');
    const weekCalendarPopover = document.getElementById('week-calendar-popover');
    const weekCalendarStart = document.getElementById('week-calendar-start');
    const weekCalendarEnd = document.getElementById('week-calendar-end');
    const weekCalendarApply = document.getElementById('week-calendar-apply');
    const weekCalendarCancel = document.getElementById('week-calendar-cancel');
    const weekLayoutToggle = document.getElementById('week-layout-toggle');
    const timesheetToast = document.getElementById('timesheet-toast');
    const copyBtn = document.querySelector('.copy-btn');

    const weekRanges = [
        '30 Mar - 05 Apr 2026',
        '23 Mar - 29 Mar 2026',
        '16 Mar - 22 Mar 2026',
    ];
    let activeWeekIndex = 0;
    let customWeekLabel = '';

    function showToast(message) {
        if (!timesheetToast) return;
        timesheetToast.textContent = message;
        timesheetToast.classList.add('show');
        window.clearTimeout(showToast._timer);
        showToast._timer = window.setTimeout(() => {
            timesheetToast.classList.remove('show');
        }, 1800);
    }

    function positionPopover(button, popover) {
        if (!button || !popover) return;
        const rect = button.getBoundingClientRect();
        const margin = 8;
        const gap = 6;
        const width = popover.offsetWidth || 280;
        const height = popover.offsetHeight || 180;
        let left = rect.left;
        let top = rect.bottom + gap;
        const maxLeft = window.innerWidth - width - margin;
        if (left > maxLeft) left = maxLeft;
        if (left < margin) left = margin;
        if (top + height > window.innerHeight - margin) {
            top = Math.max(margin, rect.top - height - gap);
        }
        popover.style.left = `${left}px`;
        popover.style.top = `${top}px`;
    }

    function setWeekLabel(label) {
        if (weekRange) weekRange.textContent = label;
    }

    function syncWeekInputsFromLabel(label) {
        const parts = (label || '').split(' - ');
        if (parts.length === 2) {
            const start = new Date(parts[0]);
            const end = new Date(parts[1]);
            if (!isNaN(start.getTime()) && weekCalendarStart) weekCalendarStart.value = start.toISOString().slice(0, 10);
            if (!isNaN(end.getTime()) && weekCalendarEnd) weekCalendarEnd.value = end.toISOString().slice(0, 10);
        }
    }

    const datasets = {
        all: {
            title: 'All Timesheets',
            total: '8:00 / 40:00',
            timeOff: '8:00',
            fill: 20,
            rows: [
                ['Time-off Paid Leave', '', '8:00', '', '', '', '', '', ''],
                ['Project Alpha - Product Launch', '2:00', '1:30', '2:30', '2:00', '0:00', '0:00', '0:00', '8:00'],
                ['Internal Work / Standup', '0:30', '0:30', '0:30', '0:30', '0:30', '0:30', '0:30', '3:30'],
            ],
        },
        'past-due': {
            title: 'Past Due Timesheets',
            total: '6:00 / 40:00',
            timeOff: '2:00',
            fill: 15,
            rows: [
                ['Time-off Paid Leave', '', '', '2:00', '', '', '', '', ''],
                ['Client Support - Pending Entry', '1:00', '1:00', '1:00', '1:00', '1:00', '1:00', '0:00', '6:00'],
                ['Project Alpha - Missing Review', '0:30', '0:30', '0:30', '0:30', '0:30', '0:30', '0:00', '3:00'],
            ],
        },
        rejected: {
            title: 'Rejected Timesheets',
            total: '4:00 / 40:00',
            timeOff: '0:00',
            fill: 10,
            rows: [
                ['Project Beta - Rework', '1:00', '0:00', '1:00', '0:00', '1:00', '0:00', '1:00', '4:00'],
                ['Daily Admin / Review', '0:20', '0:20', '0:20', '0:20', '0:20', '0:20', '0:20', '2:20'],
            ],
        },
        project: {
            title: 'Project Time',
            total: '8:00 / 40:00',
            timeOff: '0:00',
            fill: 20,
            rows: [
                ['Project Alpha', '2:00', '1:30', '2:30', '2:00', '0:00', '0:00', '0:00', '8:00'],
                ['Project Beta', '1:00', '1:00', '1:00', '1:00', '1:00', '1:00', '0:00', '6:00'],
            ],
        },
        summary: {
            title: 'Time Summary',
            total: '8:00 / 40:00',
            timeOff: '8:00',
            fill: 20,
            rows: [
                ['Summary View', '2:00', '1:30', '2:30', '2:00', '0:00', '0:00', '0:00', '8:00'],
            ],
            chart: [0, 0, 32, 40, 40, 16, 40, 32, 40, 24, 40],
            labels: ['16 Jan - 22 Jan', '23 Jan - 29 Jan', '30 Jan - 05 Feb', '06 Feb - 12 Feb', '13 Feb - 19 Feb', '20 Feb - 26 Feb', '27 Feb - 05 Mar', '06 Mar - 12 Mar', '13 Mar - 19 Mar', '20 Mar - 26 Mar', '27 Mar - 29 Mar'],
        },
        tasks: {
            title: 'My Tasks',
            total: '5:00 / 40:00',
            timeOff: '0:00',
            fill: 12,
            rows: [
                ['Task 1 - Daily Sync', '0:30', '0:30', '0:30', '0:30', '0:30', '0:30', '0:30', '3:30'],
                ['Task 2 - QA Review', '0:30', '0:00', '1:00', '0:30', '0:00', '0:00', '0:00', '2:00'],
            ],
        },
        projects: {
            title: 'Projects Allocated',
            total: '8:00 / 40:00',
            timeOff: '0:00',
            fill: 20,
            rows: [
                ['Allocated Project A', '2:00', '1:30', '2:30', '2:00', '0:00', '0:00', '0:00', '8:00'],
                ['Allocated Project B', '0:30', '0:30', '0:30', '0:30', '0:30', '0:30', '0:30', '3:30'],
            ],
        },
    };

    function render(view) {
        const data = datasets[view] || datasets.all;
        if (heading) heading.textContent = data.title;
        if (totalValue) totalValue.textContent = data.total;
        if (timeOffValue) timeOffValue.textContent = data.timeOff;
        if (totalFill) totalFill.style.width = `${data.fill}%`;

        const isProject = view === 'project';
        const isSummary = view === 'summary';
        const isTasks = view === 'tasks';
        const isAllocated = view === 'projects';
        [defaultSummary, defaultToolbar, defaultGrid, defaultComments].forEach(el => {
            if (el) el.style.display = (isProject || isSummary || isTasks || isAllocated) ? 'none' : '';
        });
        if (projectLayout) {
            projectLayout.classList.toggle('active', isProject);
        }
        if (summaryView) {
            summaryView.classList.toggle('active', isSummary);
        }
        if (taskView) {
            taskView.classList.toggle('active', isTasks);
        }
        if (allocatedView) {
            allocatedView.classList.toggle('active', isAllocated);
        }
        if (isProject) {
            if (heading) heading.textContent = 'Project Time';
        }
        if (isSummary) {
            if (heading) heading.textContent = 'Time Summary';
            renderSummaryChart(data.chart || [], data.labels || []);
        }
        if (isTasks && heading) heading.textContent = 'My Tasks';
        if (isAllocated && heading) heading.textContent = 'Projects Allocated';

        if (body && !(isProject || isSummary || isTasks || isAllocated)) {
            body.innerHTML = data.rows.map((row, index) => {
                const first = index === 0 ? '<span class="ts-subtext">by Jitesh Kumar Das</span>' : '';
                return `
                    <tr>
                        <td class="ts-project">${row[0]}${first ? `<div>${first}</div>` : ''}</td>
                        <td>${row[1] || ''}</td>
                        <td>${row[2] || ''}</td>
                        <td>${row[3] || ''}</td>
                        <td>${row[4] || ''}</td>
                        <td>${row[5] || ''}</td>
                        <td>${row[6] || ''}</td>
                        <td>${row[7] || ''}</td>
                        <td>${row[8] || ''}</td>
                    </tr>
                `;
            }).join('') + `
                <tr>
                    <td colspan="9" style="padding:14px 16px;">
                        <div style="color:#6b55bc;font-weight:600;font-size:12px;cursor:pointer;">+ Add Time Entry</div>
                    </td>
                </tr>
            `;
        }

        if (isTasks && taskStageFilter) {
            taskStageFilter.value = taskStageFilter.value || 'Task Stage';
            filterTaskRows();
        }
        if (isAllocated) {
            filterAllocatedRows();
        }

        tabs.forEach(tab => tab.classList.toggle('active', tab.dataset.view === view));
    }

    function renderSummaryChart(values, labels) {
        if (!summaryChartWrap) return;
        const width = 1100;
        const height = 310;
        const leftPad = 30;
        const rightPad = 12;
        const topPad = 20;
        const bottomPad = 34;
        const chartWidth = width - leftPad - rightPad;
        const chartHeight = height - topPad - bottomPad;
        const maxValue = Math.max(50, ...values, 1);
        const stepX = values.length > 1 ? chartWidth / (values.length - 1) : chartWidth;
        const points = values.map((value, index) => {
            const x = leftPad + (index * stepX);
            const y = topPad + (chartHeight - (value / maxValue) * chartHeight);
            return { x, y, value, label: labels[index] || '' };
        });
        const areaPoints = [
            `${leftPad},${topPad + chartHeight}`,
            ...points.map(point => `${point.x},${point.y}`),
            `${leftPad + chartWidth},${topPad + chartHeight}`,
        ].join(' ');
        const linePoints = points.map(point => `${point.x},${point.y}`).join(' ');
        const ticks = [0, 10, 20, 30, 40, 50];
        const tickLines = ticks.map(tick => {
            const y = topPad + (chartHeight - (tick / maxValue) * chartHeight);
            return `
                <g>
                    <line x1="${leftPad}" y1="${y}" x2="${leftPad + chartWidth}" y2="${y}" stroke="#edf1f7" stroke-width="1" />
                    <text x="0" y="${y + 4}" font-size="11" fill="#6b7280">${tick}</text>
                </g>
            `;
        }).join('');
        const labelStep = Math.max(1, Math.floor(points.length / 10));
        const xLabels = points.map((point, index) => {
            if (index % labelStep !== 0 && index !== points.length - 1) return '';
            return `
                <text x="${point.x}" y="${height - 8}" font-size="10" fill="#6b7280" transform="rotate(-90 ${point.x} ${height - 8})" text-anchor="end">${point.label}</text>
            `;
        }).join('');
        summaryChartWrap.innerHTML = `
            <svg viewBox="0 0 ${width} ${height}" preserveAspectRatio="none" role="img" aria-label="Timesheet hours chart">
                <defs>
                    <linearGradient id="hours-gradient" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#ff8d63" stop-opacity="0.92"></stop>
                        <stop offset="100%" stop-color="#ff8d63" stop-opacity="0.18"></stop>
                    </linearGradient>
                </defs>
                ${tickLines}
                <polygon points="${areaPoints}" fill="url(#hours-gradient)" opacity="0.95"></polygon>
                <polyline points="${linePoints}" fill="none" stroke="#ff8d63" stroke-width="1.5"></polyline>
                ${xLabels}
            </svg>
        `;
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function (event) {
            event.preventDefault();
            render(tab.dataset.view || 'all');
        });
    });

    if (dailyEntrySwitch) {
        dailyEntrySwitch.addEventListener('click', function () {
            const next = !dailyEntrySwitch.classList.contains('on');
            dailyEntrySwitch.classList.toggle('on', next);
            dailyEntrySwitch.setAttribute('aria-pressed', next ? 'true' : 'false');
        });
    }

    function filterProjects(query) {
        const needle = (query || '').trim().toLowerCase();
        projectItems.forEach(item => {
            const match = !needle || (item.dataset.projectName || '').includes(needle);
            item.style.display = match ? '' : 'none';
        });
    }

    if (projectRailSearch) {
        projectRailSearch.addEventListener('input', function () {
            filterProjects(projectRailSearch.value);
        });
    }

    if (projectTimeSearch) {
        projectTimeSearch.addEventListener('input', function () {
            filterProjects(projectTimeSearch.value);
            if (projectRailSearch) projectRailSearch.value = projectTimeSearch.value;
        });
    }

    function filterTaskRows() {
        const term = (taskSearch ? taskSearch.value : '').trim().toLowerCase();
        const stage = (taskStageFilter && taskStageFilter.value !== 'Task Stage') ? taskStageFilter.value.trim().toLowerCase() : '';
        taskRows.forEach(row => {
            const rowStage = (row.dataset.stage || '').toLowerCase();
            const rowSearch = (row.dataset.search || '').toLowerCase();
            const matchesStage = !stage || rowStage === stage;
            const matchesSearch = !term || rowSearch.includes(term);
            row.style.display = matchesStage && matchesSearch ? '' : 'none';
        });
    }

    function filterAllocatedRows() {
        const term = (allocSearch ? allocSearch.value : '').trim().toLowerCase();
        const status = (allocStatus && allocStatus.value !== 'Project Status') ? allocStatus.value.trim().toLowerCase() : '';
        allocRows.forEach(row => {
            const rowStatus = (row.dataset.status || '').toLowerCase();
            const rowSearch = (row.dataset.search || '').toLowerCase();
            const matchesStatus = !status || rowStatus === status;
            const matchesSearch = !term || rowSearch.includes(term);
            row.style.display = matchesStatus && matchesSearch ? '' : 'none';
        });
    }

    if (taskSearch) {
        taskSearch.addEventListener('input', filterTaskRows);
    }
    if (taskStageFilter) {
        taskStageFilter.addEventListener('change', filterTaskRows);
    }
    if (allocSearch) {
        allocSearch.addEventListener('input', filterAllocatedRows);
    }
    if (allocStatus) {
        allocStatus.addEventListener('change', filterAllocatedRows);
    }

    projectItems.forEach(item => {
        item.addEventListener('click', function () {
            projectItems.forEach(node => node.classList.remove('active'));
            item.classList.add('active');
        });
    });

    const current = new Date();
    const start = new Date(current);
    start.setDate(current.getDate() - 1);
    const end = new Date(current);
    end.setDate(current.getDate() + 5);
    const format = date => date.toLocaleDateString('en-US', { day: '2-digit', month: 'short', year: 'numeric' });
    setWeekLabel(weekRanges[activeWeekIndex]);
    syncWeekInputsFromLabel(weekRanges[activeWeekIndex]);
    const projectStart = new Date(current);
    projectStart.setDate(current.getDate() - 29);
    const projectEnd = new Date(current);
    setProjectRange(projectStart, projectEnd);

    function setProjectRange(startDate, endDate) {
        if (!(startDate instanceof Date) || isNaN(startDate.getTime())) return;
        if (!(endDate instanceof Date) || isNaN(endDate.getTime())) return;
        if (projectDateRange) {
            projectDateRange.textContent = `${format(startDate)} - ${format(endDate)}`;
        }
        if (projectRangeNote) {
            projectRangeNote.textContent = `${format(startDate)} - ${format(endDate)}`;
        }
        if (projectCalendarStart) {
            projectCalendarStart.value = startDate.toISOString().slice(0, 10);
        }
        if (projectCalendarEnd) {
            projectCalendarEnd.value = endDate.toISOString().slice(0, 10);
        }
    }

    if (projectCalendarToggle && projectCalendarPopover) {
        projectCalendarToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            projectCalendarPopover.classList.toggle('open');
            if (projectCalendarPopover.classList.contains('open')) {
                positionPopover(projectCalendarToggle, projectCalendarPopover);
            }
        });
    }

    if (projectCalendarApply) {
        projectCalendarApply.addEventListener('click', function () {
            const startDate = projectCalendarStart ? new Date(projectCalendarStart.value) : null;
            const endDate = projectCalendarEnd ? new Date(projectCalendarEnd.value) : null;
            if (startDate && endDate && !isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                setProjectRange(startDate, endDate);
            }
            if (projectCalendarPopover) projectCalendarPopover.classList.remove('open');
        });
    }

    if (projectCalendarCancel) {
        projectCalendarCancel.addEventListener('click', function () {
            if (projectCalendarPopover) projectCalendarPopover.classList.remove('open');
        });
    }

    if (weekPrev) {
        weekPrev.addEventListener('click', function () {
            customWeekLabel = '';
            activeWeekIndex = (activeWeekIndex - 1 + weekRanges.length) % weekRanges.length;
            setWeekLabel(weekRanges[activeWeekIndex]);
            syncWeekInputsFromLabel(weekRanges[activeWeekIndex]);
            showToast(`Week changed to ${weekRanges[activeWeekIndex]}`);
        });
    }

    if (weekNext) {
        weekNext.addEventListener('click', function () {
            customWeekLabel = '';
            activeWeekIndex = (activeWeekIndex + 1) % weekRanges.length;
            setWeekLabel(weekRanges[activeWeekIndex]);
            syncWeekInputsFromLabel(weekRanges[activeWeekIndex]);
            showToast(`Week changed to ${weekRanges[activeWeekIndex]}`);
        });
    }

    if (weekCalendarToggle && weekCalendarPopover) {
        weekCalendarToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            weekCalendarPopover.classList.toggle('open');
            if (weekCalendarPopover.classList.contains('open')) {
                positionPopover(weekCalendarToggle, weekCalendarPopover);
            }
        });
    }

    if (weekCalendarApply) {
        weekCalendarApply.addEventListener('click', function () {
            const startDate = weekCalendarStart ? new Date(weekCalendarStart.value) : null;
            const endDate = weekCalendarEnd ? new Date(weekCalendarEnd.value) : null;
            if (startDate && endDate && !isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                const label = `${format(startDate)} - ${format(endDate)}`;
                customWeekLabel = label;
                setWeekLabel(label);
                showToast(`Showing ${label}`);
            }
            if (weekCalendarPopover) weekCalendarPopover.classList.remove('open');
        });
    }

    if (weekCalendarCancel) {
        weekCalendarCancel.addEventListener('click', function () {
            if (weekCalendarPopover) weekCalendarPopover.classList.remove('open');
        });
    }

    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            showToast('Copied last week hours into this week');
        });
    }

    if (weekLayoutToggle && timesheetPage) {
        weekLayoutToggle.addEventListener('click', function () {
            timesheetPage.classList.toggle('view-mode');
            timesheetPage.classList.toggle('compact');
            showToast(timesheetPage.classList.contains('compact') ? 'Compact view enabled' : 'Compact view disabled');
        });
    }

    document.addEventListener('click', function (event) {
        const target = event.target;
        if (projectCalendarPopover && projectCalendarPopover.classList.contains('open')) {
            if (!(target instanceof Node) || (!projectCalendarPopover.contains(target) && target !== projectCalendarToggle && !(projectCalendarToggle && projectCalendarToggle.contains(target)))) {
                projectCalendarPopover.classList.remove('open');
            }
        }
        if (weekCalendarPopover && weekCalendarPopover.classList.contains('open')) {
            if (!(target instanceof Node) || (!weekCalendarPopover.contains(target) && target !== weekCalendarToggle && !(weekCalendarToggle && weekCalendarToggle.contains(target)))) {
                weekCalendarPopover.classList.remove('open');
            }
        }
    });

    window.addEventListener('resize', function () {
        if (projectCalendarPopover && projectCalendarPopover.classList.contains('open')) {
            positionPopover(projectCalendarToggle, projectCalendarPopover);
        }
        if (weekCalendarPopover && weekCalendarPopover.classList.contains('open')) {
            positionPopover(weekCalendarToggle, weekCalendarPopover);
        }
    });

    window.addEventListener('scroll', function () {
        if (projectCalendarPopover && projectCalendarPopover.classList.contains('open')) {
            positionPopover(projectCalendarToggle, projectCalendarPopover);
        }
        if (weekCalendarPopover && weekCalendarPopover.classList.contains('open')) {
            positionPopover(weekCalendarToggle, weekCalendarPopover);
        }
    }, true);

    render('all');
});
</script>
HTML;

$pageContent = str_replace('__PROJECT_LIST_HTML__', $projectTimeListHtml, $pageContent);
$pageContent = str_replace('__TASK_ROWS_HTML__', $myTasksTableHtml, $pageContent);
$pageContent = str_replace('__ALLOC_ROWS_HTML__', $projectsAllocatedTableHtml, $pageContent);

include __DIR__ . '/includes/myteam-shell.php';
