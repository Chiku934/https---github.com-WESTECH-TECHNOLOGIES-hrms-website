<?php

declare(strict_types=1);

$title = 'HRMS - PIP';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Performance', 'url' => 'user-performance.php', 'active' => true],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Helpdesk', 'url' => 'user-support.php'],
];
$subNavItems = [
    ['label' => 'KRAs', 'url' => 'user-performance.php'],
    ['label' => '1:1 Meetings', 'url' => 'user-performance-meetings.php'],
    ['label' => 'Feedback', 'url' => 'user-performance-feedback.php'],
    ['label' => 'PIP', 'url' => 'user-performance-pip.php', 'active' => true],
    ['label' => 'Reviews', 'url' => 'user-performance-reviews.php'],
    ['label' => 'Skills', 'url' => 'user-performance-skills.php'],
    ['label' => 'Competencies & Core values', 'url' => 'user-performance-competencies.php'],
];

ob_start();
$performanceTitle = 'PIP';
$performanceSubtitle = 'Review active improvement plans, milestones, and next actions.';
$performanceAction = '<a class="action" href="#">Create PIP</a>';
$performanceBody = '
<div class="content-panel">
    <div class="empty-state" id="pip-empty-state">
        <div>
            <div class="icon"><i class="fa-regular fa-clipboard"></i></div>
            <strong>No active PIPs found.</strong>
            <small>When a performance improvement plan is created, the milestones and progress will appear here.</small>
        </div>
    </div>
    <div id="pip-demo-state" style="display:none;padding:16px 18px;">
        <div class="grid three" style="margin-bottom:12px;">
            <div class="card">
                <div class="card-title">Plan Overview</div>
                <div class="soft-list">
                    <div class="soft-item">Owner: Goutham Kurangi</div>
                    <div class="soft-item">Start: 01 Mar 2026</div>
                    <div class="soft-item">Target Review: 30 Apr 2026</div>
                </div>
            </div>
            <div class="card">
                <div class="card-title">Milestones</div>
                <div class="soft-list">
                    <div class="soft-item">Week 1 - Documentation cleanup</div>
                    <div class="soft-item">Week 2 - UAT defect closure</div>
                    <div class="soft-item">Week 3 - Peer review follow-up</div>
                </div>
            </div>
            <div class="card">
                <div class="card-title">Status</div>
                <div class="empty-state" style="min-height:170px;">
                    <div>
                        <div class="icon"><i class="fa-regular fa-chart-line"></i></div>
                        <strong>In progress</strong>
                        <small>Progress is on track with weekly check-ins and action items logged.</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="soft-list">
            <div class="soft-item">Next check-in scheduled for 04 Apr 2026.</div>
            <div class="soft-item">Manager note: keep defect closure speed above 90% this cycle.</div>
        </div>
    </div>
</div>';
 $performanceScript = <<<'JS'
    const pipEmpty = document.getElementById('pip-empty-state');
    const pipDemo = document.getElementById('pip-demo-state');
    document.querySelector('.performance-section .action')?.addEventListener('click', function () {
        if (pipEmpty) pipEmpty.style.display = 'none';
        if (pipDemo) pipDemo.style.display = 'block';
    });
JS;
include __DIR__ . '/includes/performance-section.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
