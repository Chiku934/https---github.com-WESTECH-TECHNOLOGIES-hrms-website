<?php

declare(strict_types=1);

$title = 'HRMS - 1:1 Meetings';
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
    ['label' => '1:1 Meetings', 'url' => 'user-performance-meetings.php', 'active' => true],
    ['label' => 'Feedback', 'url' => 'user-performance-feedback.php'],
    ['label' => 'PIP', 'url' => 'user-performance-pip.php'],
    ['label' => 'Reviews', 'url' => 'user-performance-reviews.php'],
    ['label' => 'Skills', 'url' => 'user-performance-skills.php'],
    ['label' => 'Competencies & Core values', 'url' => 'user-performance-competencies.php'],
];

$pageContent = <<<'HTML'
<style>
    .meetings-page{color:#1f2937}
    .meetings-tabs{display:flex;align-items:center;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden;margin-bottom:14px}
    .meetings-tab{padding:10px 14px;font-size:12px;font-weight:500;color:#7b8796;text-decoration:none;border-right:1px solid #edf1f6}
    .meetings-tab.active{background:#f3eefc;color:#6b55bc;font-weight:700}
    .meetings-tab:last-child{border-right:0}
    .meetings-head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin:0 0 12px}
    .meetings-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 3px}
    .meetings-sub{font-size:12px;color:#7b8796}
    .meetings-btn{padding:7px 14px;border:1px solid #6b55bc;background:#6b55bc;color:#fff;border-radius:3px;font-size:12px;font-weight:600;cursor:pointer}
    .meetings-filters{display:flex;align-items:center;gap:12px;padding:10px 14px;border:1px solid #e5eaf2;background:#fff;border-radius:2px;margin-bottom:12px;overflow:visible;position:relative}
    .meetings-field{display:flex;flex-direction:column;gap:3px;padding-right:14px;border-right:1px solid #eef2f7;min-width:132px;position:relative;overflow:visible}
    .meetings-field:last-child{border-right:0;flex:1;min-width:240px}
    .meetings-label{font-size:9px;font-weight:700;color:#8b95a5;text-transform:uppercase;letter-spacing:.05em}
    .meetings-value{font-size:12px;font-weight:600;color:#334155;display:flex;align-items:center;gap:8px}
    .meetings-input{border:0;outline:none;background:transparent;font:inherit;width:100%}
    .meetings-page-body{display:grid;grid-template-columns:164px 1fr;gap:12px}
    .meetings-rail{width:164px;border:1px solid #e5eaf2;border-radius:2px;background:#fff;overflow:hidden}
    .meetings-rail-item{padding:11px 12px;border-bottom:1px solid #eef2f7;font-size:11px;font-weight:700;color:#6f7a8c;display:flex;align-items:center;justify-content:space-between}
    .meetings-rail-item.active{background:#f7f3ff;color:#5d58a8}
    .meetings-rail-item:last-child{border-bottom:0}
    .meetings-panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;min-height:310px}
    .meetings-empty{display:flex;align-items:center;justify-content:center;min-height:310px;text-align:center;color:#b0b8c6}
    .meetings-empty .ghost{font-size:38px;color:#d7dbe4;margin-bottom:10px}
    .meetings-empty strong{display:block;color:#334155;font-size:13px;margin-bottom:4px}
    .meetings-empty small{font-size:11px;color:#8a94a6;max-width:360px}
    .meetings-template-view{display:none;padding:14px}
    .meetings-template-view.active{display:block}
    .meetings-template-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
    .meetings-template-card{border:1px solid #e5eaf2;border-radius:2px;background:#f8fafc;padding:14px;min-height:120px}
    .meetings-template-card strong{display:block;font-size:13px;color:#334155;margin-bottom:4px}
    .meetings-template-card small{font-size:11px;color:#8b95a5;line-height:1.4}
    .meetings-chip{display:inline-flex;align-items:center;padding:3px 8px;border-radius:999px;background:#f2eefc;color:#6b55bc;font-size:10px;font-weight:700;margin-top:8px}
    .meetings-dropdown-btn{width:100%;display:flex;align-items:center;gap:8px;background:#fff;border:1px solid #e5eaf2;border-radius:2px;padding:7px 10px;color:#334155;font:inherit;font-weight:600;cursor:pointer;min-height:34px}
    .meetings-dropdown-menu{position:fixed;min-width:230px;background:#fff;border:1px solid #e5eaf2;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.12);padding:10px;display:none;z-index:1000;max-width:calc(100vw - 24px)}
    .meetings-dropdown-menu.show{display:block}
    .meetings-inline-calendar{
        display:none;
        margin-top:8px;
        padding:12px;
        border:1px solid #e5eaf2;
        border-radius:6px;
        background:#fff;
        box-shadow:0 10px 26px rgba(15,23,42,.08);
    }
    .meetings-inline-calendar.show{display:block}
    .meetings-option{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:8px 10px;border-radius:4px;font-size:12px;color:#334155;cursor:pointer}
    .meetings-option:hover{background:#f6f7fb}
    .meetings-mini-calendar{display:grid;grid-template-columns:repeat(7,1fr);gap:6px;margin-top:8px}
    .meetings-mini-calendar button{border:1px solid #e5eaf2;background:#fff;border-radius:4px;padding:8px 0;font-size:11px;color:#334155;cursor:pointer}
    .meetings-mini-calendar button.active{background:#6b55bc;color:#fff;border-color:#6b55bc}
    .meetings-demo-summary{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:14px}
    .meetings-demo-summary strong{display:block;color:#334155;font-size:13px;margin-bottom:4px}
    .meetings-demo-summary small{font-size:11px;color:#8b95a5}
    @media (max-width:1180px){
        .meetings-page-body{grid-template-columns:1fr}
        .meetings-rail{width:100%}
        .meetings-template-grid{grid-template-columns:1fr}
    }
</style>

<div class="meetings-page">

    <div class="meetings-tabs" id="meetings-tabs" style="margin-bottom:10px;">
        <a href="#" class="meetings-tab active" data-view="meetings">My Meetings</a>
        <a href="#" class="meetings-tab" data-view="templates">Agenda Templates</a>
    </div>

    <div class="meetings-head">
        <div>
            <div class="meetings-title">1:1 meetings</div>
            <div class="meetings-sub">Discover meetings you've initiated or ones where you're involved as a participant.</div>
        </div>
        <button type="button" class="meetings-btn" id="schedule-meeting-btn">Schedule 1:1 meeting</button>
    </div>

    <div class="meetings-filters">
        <div class="meetings-field" id="meetings-type-field">
            <div class="meetings-label">Meeting Type</div>
            <button type="button" class="meetings-dropdown-btn" id="meetings-type-btn">
                <span id="meetings-type-label">3 selected</span>
                <i class="fa-solid fa-chevron-down" style="font-size:9px;color:#a6aec0"></i>
            </button>
            <div class="meetings-dropdown-menu" id="meetings-type-menu">
                <div class="meetings-option" data-type="all">All meeting types <span>✓</span></div>
                <div class="meetings-option" data-type="team">Team sync <span>✓</span></div>
                <div class="meetings-option" data-type="review">Review <span>✓</span></div>
                <div class="meetings-option" data-type="manager">Manager 1:1 <span>✓</span></div>
                <div style="font-size:10px;color:#8b95a5;margin-top:8px;">Tip: click a type to toggle it in the demo list.</div>
            </div>
        </div>
        <div class="meetings-field" id="meetings-date-field">
            <div class="meetings-label">Date Range</div>
            <button type="button" class="meetings-dropdown-btn" id="meetings-date-btn">
                <span id="meetings-date-label">16 Mar 2026 - 15 Apr 2026</span>
                <i class="fa-regular fa-calendar" style="font-size:11px;color:#a6aec0"></i>
            </button>
            <div class="meetings-dropdown-menu" id="meetings-date-menu">
                <div class="meetings-option" style="cursor:default;">
                    <div style="width:100%;">
                        <div style="font-size:10px;font-weight:700;color:#8b95a5;margin-bottom:4px;">From</div>
                        <input id="meetings-date-from" type="date" value="2026-03-16" style="width:100%;border:1px solid #e5eaf2;border-radius:4px;padding:8px 10px;font:inherit;color:#334155;">
                    </div>
                </div>
                <div class="meetings-option" style="cursor:default;">
                    <div style="width:100%;">
                        <div style="font-size:10px;font-weight:700;color:#8b95a5;margin-bottom:4px;">To</div>
                        <input id="meetings-date-to" type="date" value="2026-04-15" style="width:100%;border:1px solid #e5eaf2;border-radius:4px;padding:8px 10px;font:inherit;color:#334155;">
                    </div>
                </div>
                <div class="row" style="display:flex;justify-content:flex-end;">
                    <button type="button" class="apply" id="meetings-date-apply">Apply</button>
                </div>
                <div style="font-size:10px;color:#8b95a5;margin-top:8px;">Picking a date updates the label right away.</div>
            </div>
            <div class="meetings-inline-calendar" id="meetings-inline-calendar">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
                    <strong style="font-size:12px;color:#334155;">Quick calendar</strong>
                    <span style="font-size:10px;color:#8b95a5;">Demo</span>
                </div>
                <div class="meetings-mini-calendar" id="meetings-calendar-grid">
                    <button type="button" data-day="2026-03-16">16</button>
                    <button type="button" data-day="2026-03-17">17</button>
                    <button type="button" data-day="2026-03-18">18</button>
                    <button type="button" data-day="2026-03-19">19</button>
                    <button type="button" data-day="2026-03-20">20</button>
                    <button type="button" data-day="2026-03-21">21</button>
                    <button type="button" data-day="2026-03-22">22</button>
                    <button type="button" data-day="2026-03-23">23</button>
                    <button type="button" data-day="2026-03-24">24</button>
                    <button type="button" data-day="2026-03-25">25</button>
                    <button type="button" data-day="2026-03-26">26</button>
                    <button type="button" data-day="2026-03-27">27</button>
                    <button type="button" data-day="2026-03-28">28</button>
                    <button type="button" data-day="2026-03-29">29</button>
                </div>
            </div>
        </div>
        <div class="meetings-field">
            <div class="meetings-label">Search Meetings</div>
            <div class="meetings-value">
                <div class="perf-input-wrap">
                    <input class="meetings-input" id="meetings-search" type="text" placeholder="Search meetings">
                </div>
            </div>
        </div>
        <div style="margin-left:auto;color:#b0b8c6;font-size:14px;"><i class="fa-solid fa-filter"></i></div>
    </div>

    <div class="meetings-page-body" id="meetings-body-view">
        <div class="meetings-rail">
            <div class="meetings-rail-item" data-stage="upcoming">Upcoming Meetings <i class="fa-solid fa-chevron-down"></i></div>
            <div class="meetings-rail-item" data-stage="pending">Pending Meetings <i class="fa-solid fa-chevron-down"></i></div>
            <div class="meetings-rail-item active" data-stage="completed">Completed Meetings <i class="fa-solid fa-chevron-up"></i></div>
            <div style="padding:12px;color:#8a94a6;font-size:11px;" id="meetings-empty-rail">No past meetings</div>
        </div>
        <div class="meetings-panel" id="meetings-panel">
            <div class="meetings-empty" id="meetings-empty-state">
                <div>
                    <div class="ghost"><i class="fa-regular fa-calendar"></i></div>
                    <strong>No meetings scheduled in this date range.</strong>
                    <small>Adjust the date range to view meetings.</small>
                </div>
            </div>
            <div id="meetings-demo-state" style="display:none;padding:18px 20px;">
                <div class="meetings-demo-summary">
                    <div>
                        <div style="font-size:14px;font-weight:700;color:#334155;">Upcoming 1:1 meetings</div>
                        <small id="meetings-demo-subtitle">Demo meetings for the selected date range.</small>
                    </div>
                    <span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:999px;background:#f2eefc;color:#6b55bc;font-size:11px;font-weight:700;" id="meetings-demo-count">3 meetings</span>
                </div>
                <div style="display:grid;gap:10px;">
                    <div style="border:1px solid #e5eaf2;border-radius:2px;padding:12px 14px;background:#f8fafc;">
                        <strong style="display:block;color:#334155;font-size:13px;margin-bottom:4px;">Weekly sync with Goutham Kurangi</strong>
                        <small style="color:#8b95a5;font-size:11px;">Tue, 16 Mar 2026 - 11:00 AM to 11:30 AM</small>
                    </div>
                    <div style="border:1px solid #e5eaf2;border-radius:2px;padding:12px 14px;background:#f8fafc;">
                        <strong style="display:block;color:#334155;font-size:13px;margin-bottom:4px;">Project review with Sowmya Dash</strong>
                        <small style="color:#8b95a5;font-size:11px;">Thu, 18 Mar 2026 - 3:00 PM to 3:45 PM</small>
                    </div>
                    <div style="border:1px solid #e5eaf2;border-radius:2px;padding:12px 14px;background:#f8fafc;">
                        <strong style="display:block;color:#334155;font-size:13px;margin-bottom:4px;">Quarterly check-in with Jitesh Kumar Das</strong>
                        <small style="color:#8b95a5;font-size:11px;">Mon, 22 Mar 2026 - 10:15 AM to 10:45 AM</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="meetings-template-view" id="meetings-template-view">
        <div class="meetings-template-grid">
            <div class="meetings-template-card">
                <strong>Weekly 1:1 Template</strong>
                <small>Review priorities, blockers, wins, and next week actions.</small>
                <div class="meetings-chip">Use Template</div>
            </div>
            <div class="meetings-template-card">
                <strong>Quarterly Review Template</strong>
                <small>Discuss goals, feedback, growth areas, and follow-up tasks.</small>
                <div class="meetings-chip">Use Template</div>
            </div>
            <div class="meetings-template-card">
                <strong>Manager Check-in</strong>
                <small>Use for quick updates, risks, and support requests.</small>
                <div class="meetings-chip">Use Template</div>
            </div>
            <div class="meetings-template-card">
                <strong>Project Sync Agenda</strong>
                <small>Agenda for dependency tracking, milestones, and decisions.</small>
                <div class="meetings-chip">Use Template</div>
            </div>
        </div>
    </div>
</div>
HTML;

$performanceScript = <<<'JS'
    const tabs = Array.from(document.querySelectorAll('#meetings-tabs .meetings-tab'));
    const meetingsBodyView = document.getElementById('meetings-body-view');
    const meetingsTemplateView = document.getElementById('meetings-template-view');
    const meetingsSearch = document.getElementById('meetings-search');
    const meetingsRailItems = Array.from(document.querySelectorAll('.meetings-rail-item[data-stage]'));
    const meetingsEmptyRail = document.getElementById('meetings-empty-rail');
    const meetingsEmptyState = document.getElementById('meetings-empty-state');
    const meetingsDemoState = document.getElementById('meetings-demo-state');
    const scheduleBtn = document.getElementById('schedule-meeting-btn');
    const meetingsTypeBtn = document.getElementById('meetings-type-btn');
    const meetingsTypeMenu = document.getElementById('meetings-type-menu');
    const meetingsDateBtn = document.getElementById('meetings-date-btn');
    const meetingsDateMenu = document.getElementById('meetings-date-menu');
    const meetingsDateFrom = document.getElementById('meetings-date-from');
    const meetingsDateTo = document.getElementById('meetings-date-to');
    const meetingsDateApply = document.getElementById('meetings-date-apply');
    const meetingsInlineCalendar = document.getElementById('meetings-inline-calendar');
    const meetingsCalendarGrid = document.getElementById('meetings-calendar-grid');
    const meetingsTypeLabel = document.getElementById('meetings-type-label');
    const meetingsDateLabel = document.getElementById('meetings-date-label');
    const meetingsTypeField = document.getElementById('meetings-type-field');
    const meetingsDateField = document.getElementById('meetings-date-field');
    const meetingsDemoSubtitle = document.getElementById('meetings-demo-subtitle');
    const meetingsDemoCount = document.getElementById('meetings-demo-count');
    let selectedMeetingTypes = new Set(['team', 'review', 'manager']);

    function closeMeetingMenus() {
        meetingsTypeMenu?.classList.remove('show');
        meetingsDateMenu?.classList.remove('show');
        meetingsInlineCalendar?.classList.remove('show');
    }

    function updateMeetingTypeLabel() {
        const count = selectedMeetingTypes.size;
        if (meetingsTypeLabel) meetingsTypeLabel.textContent = count === 4 ? 'All selected' : count + ' selected';
    }

    function formatMeetingDate(value) {
        const date = new Date(value + 'T00:00:00');
        return date.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
    }

    function updateMeetingDateLabel() {
        if (meetingsDateLabel && meetingsDateFrom && meetingsDateTo) {
            meetingsDateLabel.textContent = formatMeetingDate(meetingsDateFrom.value) + ' - ' + formatMeetingDate(meetingsDateTo.value);
        }
    }

    function positionMeetingMenu(menu, button) {
        if (!menu || !button) return;
        const rect = button.getBoundingClientRect();
        const top = Math.min(window.innerHeight - 20, rect.bottom + 6);
        const left = Math.min(window.innerWidth - 240, Math.max(12, rect.left));
        menu.style.left = left + 'px';
        menu.style.top = top + 'px';
        menu.style.width = Math.max(230, Math.min(320, rect.width + 30)) + 'px';
    }

    function updateMeetingsDemoPanel() {
        if (meetingsDemoSubtitle) {
            const types = selectedMeetingTypes.size === 4 ? 'all meeting types' : Array.from(selectedMeetingTypes).map(type => ({
                team: 'team sync',
                review: 'review',
                manager: 'manager 1:1'
            }[type] || type).toLowerCase()).join(', ');
            meetingsDemoSubtitle.textContent = 'Showing ' + (types || 'selected types') + ' for ' + (meetingsDateLabel ? meetingsDateLabel.textContent : 'the current range') + '.';
        }
        if (meetingsDemoCount) meetingsDemoCount.textContent = selectedMeetingTypes.size + ' selected';
    }

    function filterMeetings() {
        const term = (meetingsSearch ? meetingsSearch.value : '').trim().toLowerCase();
        meetingsRailItems.forEach(item => {
            const label = (item.textContent || '').toLowerCase();
            item.style.display = !term || label.includes(term) ? '' : 'none';
        });
        if (meetingsEmptyRail) {
            meetingsEmptyRail.style.display = meetingsRailItems.every(item => item.style.display === 'none') ? 'block' : 'none';
        }
    }

    if (meetingsSearch) meetingsSearch.addEventListener('input', filterMeetings);

    meetingsTypeBtn?.addEventListener('click', function (event) {
        event.preventDefault();
        const show = !meetingsTypeMenu?.classList.contains('show');
        closeMeetingMenus();
        if (show && meetingsTypeMenu) {
            meetingsTypeMenu.classList.add('show');
            positionMeetingMenu(meetingsTypeMenu, meetingsTypeBtn);
        }
    });

    meetingsDateBtn?.addEventListener('click', function (event) {
        event.preventDefault();
        const show = !meetingsDateMenu?.classList.contains('show');
        closeMeetingMenus();
        if (show && meetingsDateMenu) {
            meetingsDateMenu.classList.add('show');
            positionMeetingMenu(meetingsDateMenu, meetingsDateBtn);
            meetingsInlineCalendar?.classList.add('show');
        }
    });

    document.querySelectorAll('.meetings-option[data-type]').forEach(option => {
        option.addEventListener('click', function () {
            const type = option.getAttribute('data-type') || 'all';
            if (type === 'all') {
                selectedMeetingTypes = new Set(['team', 'review', 'manager']);
            } else if (selectedMeetingTypes.has(type)) {
                selectedMeetingTypes.delete(type);
            } else {
                selectedMeetingTypes.add(type);
            }
            if (selectedMeetingTypes.size === 0) selectedMeetingTypes = new Set(['team']);
            updateMeetingTypeLabel();
            updateMeetingsDemoPanel();
            if (meetingsTypeMenu && meetingsTypeBtn) positionMeetingMenu(meetingsTypeMenu, meetingsTypeBtn);
            closeMeetingMenus();
        });
    });

    meetingsDateFrom?.addEventListener('change', function () {
        updateMeetingDateLabel();
        updateMeetingsDemoPanel();
    });

    meetingsDateTo?.addEventListener('change', function () {
        updateMeetingDateLabel();
        updateMeetingsDemoPanel();
    });

    meetingsDateApply?.addEventListener('click', function () {
        updateMeetingDateLabel();
        updateMeetingsDemoPanel();
        if (meetingsDateMenu && meetingsDateBtn) positionMeetingMenu(meetingsDateMenu, meetingsDateBtn);
        closeMeetingMenus();
        if (meetingsEmptyState) meetingsEmptyState.style.display = 'none';
        if (meetingsDemoState) meetingsDemoState.style.display = 'block';
    });

    meetingsCalendarGrid?.querySelectorAll('button[data-day]').forEach(button => {
        button.addEventListener('click', function () {
            const day = button.getAttribute('data-day') || '';
            if (day && meetingsDateFrom && meetingsDateTo) {
                meetingsDateFrom.value = day;
                meetingsDateTo.value = day;
                updateMeetingDateLabel();
                updateMeetingsDemoPanel();
                if (meetingsEmptyState) meetingsEmptyState.style.display = 'none';
                if (meetingsDemoState) meetingsDemoState.style.display = 'block';
            }
        });
    });

    [meetingsTypeField, meetingsDateField].forEach(field => {
        field?.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeMeetingMenus();
        });
    });

    document.addEventListener('click', function (event) {
        if (!meetingsTypeField?.contains(event.target) && !meetingsDateField?.contains(event.target)) {
            closeMeetingMenus();
        }
    });

    window.addEventListener('resize', closeMeetingMenus);
    window.addEventListener('scroll', closeMeetingMenus, true);

    if (scheduleBtn) {
        scheduleBtn.addEventListener('click', function (event) {
            event.preventDefault();
            if (meetingsEmptyState) meetingsEmptyState.style.display = 'none';
            if (meetingsDemoState) meetingsDemoState.style.display = 'block';
            updateMeetingsDemoPanel();
            if (meetingsBodyView) meetingsBodyView.style.display = '';
            if (meetingsTemplateView) meetingsTemplateView.classList.remove('active');
            tabs.forEach(node => node.classList.toggle('active', node.dataset.view === 'meetings'));
        });
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function (event) {
            event.preventDefault();
            const view = tab.dataset.view;
            tabs.forEach(node => node.classList.toggle('active', node === tab));
            if (meetingsBodyView) meetingsBodyView.style.display = view === 'meetings' ? '' : 'none';
            if (meetingsTemplateView) meetingsTemplateView.classList.toggle('active', view === 'templates');
            if (meetingsEmptyState) meetingsEmptyState.style.display = view === 'meetings' ? 'flex' : 'none';
            if (meetingsDemoState) meetingsDemoState.style.display = 'none';
        });
    });

    updateMeetingTypeLabel();
    updateMeetingDateLabel();
    updateMeetingsDemoPanel();
    filterMeetings();
JS;

include __DIR__ . '/includes/myteam-shell.php';
