<?php

declare(strict_types=1);

$title = 'HRMS - Skills';
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
    ['label' => 'Skills', 'url' => 'user-performance-skills.php', 'active' => true],
    ['label' => 'Competencies & Core values', 'url' => 'user-performance-competencies.php'],
];

ob_start();
$performanceTitle = 'Skills';
$performanceSubtitle = 'Track key skills and progress against the role expectations.';
$performanceAction = '<a class="action" href="#">Add skill</a>';
$performanceBody = '
<div class="perf-searchbar" style="margin-top:-2px;">
    <div class="perf-field">
        <label>Skill Group</label>
        <div class="value perf-select">
            <select id="skills-group" style="border:0;background:transparent;outline:none;font:inherit;color:#334155;width:100%;">
                <option value="all">All skills</option>
                <option value="core">Core skills</option>
                <option value="role">Role skills</option>
            </select>
            <i class="fa-solid fa-chevron-down caret"></i>
        </div>
    </div>
    <div class="perf-field">
        <label>Progress</label>
        <div class="value" id="skills-progress-label">3 active skills</div>
    </div>
    <div class="perf-toolbar-end">
        <span class="inline-pill" id="skills-pill">Demo skill matrix</span>
    </div>
</div>
<div class="grid three">
    <div class="card">
        <div class="card-title">Top Skills</div>
        <div class="soft-list" id="skills-list">
            <div class="soft-item skill-row" data-group="core">JavaScript <strong style="float:right;color:#6b55bc;">90%</strong></div>
            <div class="soft-item skill-row" data-group="core">PHP <strong style="float:right;color:#6b55bc;">85%</strong></div>
            <div class="soft-item skill-row" data-group="role">Communication <strong style="float:right;color:#6b55bc;">95%</strong></div>
        </div>
    </div>
    <div class="card">
        <div class="card-title">Learning Goals</div>
        <div class="empty-state" style="min-height:180px;" id="skills-goals-empty">
            <div>
                <div class="icon"><i class="fa-regular fa-compass"></i></div>
                <strong>No learning goals added.</strong>
                <small>Add learning goals to track the skills you want to build this cycle.</small>
            </div>
        </div>
        <div id="skills-goals-demo" style="display:none;padding:14px;">
            <div class="soft-list">
                <div class="soft-item">Learn advanced PHP patterns by 20 Apr 2026.</div>
                <div class="soft-item">Improve meeting facilitation by running two demos this month.</div>
                <div class="soft-item">Complete one backend refactor exercise per week.</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-title">Skill Gaps</div>
        <div class="soft-list" id="skills-gaps-empty">
            <div class="soft-item">No skill gaps identified.</div>
            <div class="soft-item">Assessments will appear here after a review or manager update.</div>
        </div>
        <div class="soft-list" id="skills-gaps-demo" style="display:none;">
            <div class="soft-item">Leadership: developing through quarterly project ownership.</div>
            <div class="soft-item">Testing: improve automation coverage for core flows.</div>
            <div class="soft-item">Documentation: standardize release notes and handoffs.</div>
        </div>
    </div>
</div>';
 $performanceScript = <<<'JS'
    const skillsGroup = document.getElementById('skills-group');
    const skillsRows = Array.from(document.querySelectorAll('.skill-row'));
    const skillsGoalsEmpty = document.getElementById('skills-goals-empty');
    const skillsGoalsDemo = document.getElementById('skills-goals-demo');
    const skillsGapsEmpty = document.getElementById('skills-gaps-empty');
    const skillsGapsDemo = document.getElementById('skills-gaps-demo');
    const skillsProgressLabel = document.getElementById('skills-progress-label');
    let skillCount = 3;
    const skillCatalog = [
        { name: 'Node.js', value: '80%', group: 'core' },
        { name: 'Mentoring', value: '82%', group: 'role' },
        { name: 'API Design', value: '88%', group: 'core' },
        { name: 'Presentation', value: '86%', group: 'role' }
    ];
    let skillIndex = 0;

    function applySkillFilter() {
        const value = skillsGroup ? skillsGroup.value : 'all';
        skillsRows.forEach(row => {
            const rowGroup = row.dataset.group || 'all';
            row.style.display = value === 'all' || value === rowGroup ? '' : 'none';
        });
    }

    if (skillsGroup) {
        skillsGroup.addEventListener('change', applySkillFilter);
    }

    document.querySelector('.performance-section .action')?.addEventListener('click', function () {
        const next = skillCatalog[skillIndex % skillCatalog.length];
        skillIndex += 1;
        skillCount += 1;
        if (skillsProgressLabel) skillsProgressLabel.textContent = skillCount + ' active skills';
        if (skillsGoalsEmpty) skillsGoalsEmpty.style.display = 'none';
        if (skillsGoalsDemo) skillsGoalsDemo.style.display = 'block';
        if (skillsGapsEmpty) skillsGapsEmpty.style.display = 'none';
        if (skillsGapsDemo) skillsGapsDemo.style.display = 'flex';
        if (skillsRows[0]) {
            const row = document.createElement('div');
            row.className = 'soft-item skill-row';
            row.dataset.group = next.group;
            row.innerHTML = next.name + ' <strong style="float:right;color:#6b55bc;">' + next.value + '</strong>';
            document.getElementById('skills-list')?.prepend(row);
            skillsRows.unshift(row);
        }
        applySkillFilter();
    });

    applySkillFilter();
JS;
include __DIR__ . '/includes/performance-section.php';
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
