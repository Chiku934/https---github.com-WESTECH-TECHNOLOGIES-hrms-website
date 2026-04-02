<?php

declare(strict_types=1);

$title = 'HRMS - Competencies & Core values';
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
    ['label' => 'Reviews', 'url' => 'user-performance-reviews.php'],
    ['label' => 'Skills', 'url' => 'user-performance-skills.php'],
    ['label' => 'Competencies & Core values', 'url' => 'user-performance-competencies.php', 'active' => true],
];

ob_start();
$performanceTitle = 'Competencies & Core values';
$performanceSubtitle = 'Keep core behavior indicators aligned with your organization values.';
$performanceAction = '<a class="action" href="#">Edit core values</a>';
$performanceBody = '
<div class="perf-searchbar" style="margin-top:-2px;">
    <div class="perf-field">
        <label>View</label>
        <div class="value perf-select">
            <select id="competencies-view" style="border:0;background:transparent;outline:none;font:inherit;color:#334155;width:100%;">
                <option value="values">Core values</option>
                <option value="behaviour">Behavior indicators</option>
            </select>
            <i class="fa-solid fa-chevron-down caret"></i>
        </div>
    </div>
    <div class="perf-field">
        <label>Published</label>
        <div class="value" id="competencies-published">4 values active</div>
    </div>
    <div class="perf-toolbar-end">
        <span class="inline-pill" id="competencies-pill">Editable demo</span>
    </div>
</div>
<div id="competencies-readonly">
    <div class="grid three">
        <div class="card">
            <div class="card-title">Ownership</div>
            <div class="soft-item">Take responsibility, follow through, and deliver outcomes with accountability.</div>
        </div>
        <div class="card">
            <div class="card-title">Collaboration</div>
            <div class="soft-item">Work across teams, share context, and keep communication clear.</div>
        </div>
        <div class="card">
            <div class="card-title">Empathy</div>
            <div class="soft-item">Listen actively, respect differences, and respond with care.</div>
        </div>
    </div>
</div>
<div id="competencies-editor" style="display:none;">
    <div class="grid three">
        <div class="card">
            <div class="card-title">Ownership</div>
            <textarea rows="4" style="width:100%;border:1px solid #e5eaf2;border-radius:2px;padding:10px;font:inherit;color:#334155;resize:vertical;">Take responsibility, follow through, and deliver outcomes with accountability.</textarea>
        </div>
        <div class="card">
            <div class="card-title">Collaboration</div>
            <textarea rows="4" style="width:100%;border:1px solid #e5eaf2;border-radius:2px;padding:10px;font:inherit;color:#334155;resize:vertical;">Work across teams, share context, and keep communication clear.</textarea>
        </div>
        <div class="card">
            <div class="card-title">Empathy</div>
            <textarea rows="4" style="width:100%;border:1px solid #e5eaf2;border-radius:2px;padding:10px;font:inherit;color:#334155;resize:vertical;">Listen actively, respect differences, and respond with care.</textarea>
        </div>
    </div>
    <div style="display:flex;justify-content:flex-end;margin-top:12px;">
        <button type="button" class="action" id="save-competencies-btn">Save changes</button>
    </div>
</div>';
 $performanceScript = <<<'JS'
    const competenciesView = document.getElementById('competencies-view');
    const competenciesReadonly = document.getElementById('competencies-readonly');
    const competenciesEditor = document.getElementById('competencies-editor');
    const competenciesPublished = document.getElementById('competencies-published');
    const saveCompetenciesBtn = document.getElementById('save-competencies-btn');

    function syncCompetenciesView() {
        const mode = competenciesView ? competenciesView.value : 'values';
        const showEditor = mode === 'behaviour';
        if (competenciesReadonly) competenciesReadonly.style.display = showEditor ? 'none' : 'block';
        if (competenciesEditor) competenciesEditor.style.display = showEditor ? 'block' : 'none';
        if (competenciesPublished) competenciesPublished.textContent = showEditor ? '3 indicators active' : '4 values active';
    }

    if (competenciesView) {
        competenciesView.addEventListener('change', syncCompetenciesView);
    }

    saveCompetenciesBtn?.addEventListener('click', function () {
        if (competenciesPublished) competenciesPublished.textContent = 'Changes saved for demo core values';
    });

    document.querySelector('.performance-section .action')?.addEventListener('click', function () {
        if (competenciesView) {
            competenciesView.value = 'behaviour';
            syncCompetenciesView();
        }
    });

    syncCompetenciesView();
JS;
include __DIR__ . '/includes/performance-section.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
