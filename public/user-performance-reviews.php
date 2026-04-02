<?php

declare(strict_types=1);

$title = 'HRMS - Reviews';
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
    ['label' => 'PIP', 'url' => 'user-performance-pip.php'],
    ['label' => 'Reviews', 'url' => 'user-performance-reviews.php', 'active' => true],
    ['label' => 'Skills', 'url' => 'user-performance-skills.php'],
    ['label' => 'Competencies & Core values', 'url' => 'user-performance-competencies.php'],
];

ob_start();
$performanceTitle = 'Reviews';
$performanceSubtitle = 'Track review cycles, manager notes, and completion status.';
$performanceAction = '<a class="action" href="#">Start review cycle</a>';
$performanceBody = '
<div class="perf-searchbar" style="margin-top:-2px;">
    <div class="perf-field">
        <label>Review Cycle</label>
        <div class="value perf-select">
            <select id="reviews-cycle" style="border:0;background:transparent;outline:none;font:inherit;color:#334155;width:100%;">
                <option value="fy">FY 2025 - 2026</option>
                <option value="q4">Q4 2025</option>
                <option value="q1">Q1 2026</option>
            </select>
            <i class="fa-solid fa-chevron-down caret"></i>
        </div>
    </div>
    <div class="perf-field">
        <label>Reviewer</label>
        <div class="value" id="reviews-reviewer">Goutham Kurangi</div>
    </div>
    <div class="perf-toolbar-end">
        <span class="inline-pill" id="reviews-status">Demo cycle</span>
    </div>
</div>
<div class="grid three">
    <div class="card">
        <div class="card-title">Current Cycle</div>
        <div class="empty-state" style="min-height:180px;" id="reviews-current-empty">
            <div>
                <div class="icon"><i class="fa-regular fa-calendar-check"></i></div>
                <strong>No active review cycle.</strong>
                <small>Your next review cycle will appear here when scheduled.</small>
            </div>
        </div>
        <div id="reviews-current-demo" style="display:none;padding:14px;">
            <div class="soft-list">
                <div class="soft-item">Cycle: FY 2025 - 2026 - Status: In progress</div>
                <div class="soft-item">Manager: Goutham Kurangi</div>
                <div class="soft-item">Review date: 15 Apr 2026</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-title">Last Review</div>
        <div class="empty-state" style="min-height:180px;" id="reviews-last-empty">
            <div>
                <div class="icon"><i class="fa-regular fa-clock"></i></div>
                <strong>No review history yet.</strong>
                <small>Completed reviews and ratings will be listed here.</small>
            </div>
        </div>
        <div id="reviews-last-demo" style="display:none;padding:14px;">
            <div class="soft-list">
                <div class="soft-item">Q4 2025 - Rating: 4.5 / 5</div>
                <div class="soft-item">Outcome: Exceeded expectations</div>
                <div class="soft-item">Next review prep starts in 30 days.</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-title">Review Notes</div>
        <div class="soft-list" id="reviews-notes-empty">
            <div class="soft-item">Manager notes, self review, and action items will appear here.</div>
            <div class="soft-item">Use reviews to track goals and development conversations.</div>
        </div>
        <div class="soft-list" id="reviews-notes-demo" style="display:none;">
            <div class="soft-item">Self review submitted on 26 Mar 2026.</div>
            <div class="soft-item">Manager note: excellent delivery and clear communication.</div>
            <div class="soft-item">Action item: complete leadership workshop by 20 Apr 2026.</div>
        </div>
    </div>
</div>';
$performanceScript = <<<'JS'
    const reviewsCycle = document.getElementById('reviews-cycle');
    const reviewsStatus = document.getElementById('reviews-status');
    const reviewsCurrentEmpty = document.getElementById('reviews-current-empty');
    const reviewsCurrentDemo = document.getElementById('reviews-current-demo');
    const reviewsLastEmpty = document.getElementById('reviews-last-empty');
    const reviewsLastDemo = document.getElementById('reviews-last-demo');
    const reviewsNotesEmpty = document.getElementById('reviews-notes-empty');
    const reviewsNotesDemo = document.getElementById('reviews-notes-demo');

    function applyReviewCycle(value) {
        const label = value === 'q4' ? 'Q4 2025' : value === 'q1' ? 'Q1 2026' : 'FY 2025 - 2026';
        if (reviewsStatus) reviewsStatus.textContent = label;
        if (reviewsCurrentEmpty) reviewsCurrentEmpty.style.display = 'none';
        if (reviewsLastEmpty) reviewsLastEmpty.style.display = 'none';
        if (reviewsNotesEmpty) reviewsNotesEmpty.style.display = 'none';
        if (reviewsCurrentDemo) reviewsCurrentDemo.style.display = 'block';
        if (reviewsLastDemo) reviewsLastDemo.style.display = 'block';
        if (reviewsNotesDemo) reviewsNotesDemo.style.display = 'flex';
    }

    if (reviewsCycle) {
        reviewsCycle.addEventListener('change', function () {
            applyReviewCycle(reviewsCycle.value);
        });
    }

    document.querySelector('.performance-section .action')?.addEventListener('click', function () {
        applyReviewCycle(reviewsCycle ? reviewsCycle.value : 'fy');
    });
JS;
include __DIR__ . '/includes/performance-section.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
