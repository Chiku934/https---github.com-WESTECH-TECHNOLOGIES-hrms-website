<?php

declare(strict_types=1);

$title = 'HRMS - Performance Feedback';
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
    ['label' => 'Feedback', 'url' => 'user-performance-feedback.php', 'active' => true],
    ['label' => 'PIP', 'url' => 'user-performance-pip.php'],
    ['label' => 'Reviews', 'url' => 'user-performance-reviews.php'],
    ['label' => 'Skills', 'url' => 'user-performance-skills.php'],
    ['label' => 'Competencies & Core values', 'url' => 'user-performance-competencies.php'],
];

ob_start();
$performanceTitle = 'Feedback';
$performanceSubtitle = 'Capture feedback shared by managers, peers, and collaborators.';
$performanceAction = '<a class="action" href="#">Request feedback</a>';
$performanceBody = '
<div class="grid two">
    <div class="card">
        <div class="card-title">Received Feedback</div>
        <div class="empty-state" style="min-height:220px;" id="feedback-received-empty">
            <div>
                <div class="icon"><i class="fa-regular fa-comment-dots"></i></div>
                <strong>No feedback received yet.</strong>
                <small>Feedback shared with you will appear here once it is published.</small>
            </div>
        </div>
        <div id="feedback-received-demo" style="display:none;gap:10px;flex-direction:column;">
            <div class="soft-item">Goutham Kurangi - Helpfulness and collaboration were excellent during the release cycle.</div>
            <div class="soft-item">Sowmya Dash - Communication stayed clear while handling the UAT feedback loop.</div>
            <div class="soft-item">Jitesh Kumar Das - Delivered the module quickly and kept the team informed.</div>
        </div>
    </div>
    <div class="card">
        <div class="card-title">Feedback Requests</div>
        <div class="soft-list" id="feedback-request-empty">
            <div class="soft-item">No pending feedback requests to show.</div>
            <div class="soft-item">Request feedback from your manager or peers to keep a record.</div>
        </div>
        <div class="soft-list" id="feedback-request-demo" style="display:none;">
            <div class="soft-item">Requested from Goutham Kurangi - Due 03 Apr 2026 - Status: Pending</div>
            <div class="soft-item">Requested from Sowmya Dash - Due 05 Apr 2026 - Status: Sent</div>
            <div class="soft-item">Requested from Jitesh Kumar Das - Due 08 Apr 2026 - Status: Draft</div>
        </div>
    </div>
</div>';
$performanceScript = <<<'JS'
    const receivedEmpty = document.getElementById('feedback-received-empty');
    const receivedDemo = document.getElementById('feedback-received-demo');
    const requestEmpty = document.getElementById('feedback-request-empty');
    const requestDemo = document.getElementById('feedback-request-demo');
    document.querySelector('.performance-section .action')?.addEventListener('click', function () {
        if (receivedEmpty) receivedEmpty.style.display = 'none';
        if (requestEmpty) requestEmpty.style.display = 'none';
        if (receivedDemo) receivedDemo.style.display = 'flex';
        if (requestDemo) requestDemo.style.display = 'flex';
    });
JS;
include __DIR__ . '/includes/performance-section.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
