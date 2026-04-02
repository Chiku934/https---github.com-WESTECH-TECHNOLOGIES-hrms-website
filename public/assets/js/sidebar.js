/**
 * Sidebar active-state helper for the expanded always-visible navigation.
 */

function initSidebarFlyouts() {
    const normalizeRoute = (value) => {
        const raw = (value || '').split('?')[0].split('#')[0].trim();
        const lastSegment = raw.split('/').pop() || '';
        return lastSegment
            .replace(/\.php$/i, '')
            .replace(/\.html$/i, '')
            .toLowerCase();
    };

    const currentPath = normalizeRoute(window.location.pathname);
    const currentHash = (window.location.hash || '').replace(/^#/, '').toLowerCase();

    document.querySelectorAll('[data-sidebar-path]').forEach((item) => {
        const path = normalizeRoute(item.getAttribute('data-sidebar-path') || '');
        const hash = (item.getAttribute('data-sidebar-hash') || '').toLowerCase();

        if (path !== currentPath) return;
        if (hash && hash !== currentHash) return;

        item.classList.add('active');
        const section = item.closest('.sidebar-section');
        if (section) section.classList.add('active');
        const expandable = item.closest('.sidebar-expandable');
        if (expandable) expandable.classList.add('active');
    });

    const sectionLinks = [
        { id: 'sidebar-me-link', paths: ['user-attendance', 'timesheet', 'user-leave', 'user-performance', 'user-performance-meetings', 'user-performance-feedback', 'user-performance-pip', 'user-performance-reviews', 'user-performance-skills', 'user-performance-competencies', 'user-expenses', 'user-support'] },
        { id: 'sidebar-my-team-link', paths: ['myteam_leave_overview', 'myteam_leave_approvals', 'myteam_leave_direct', 'myteam_leave_indirect', 'myteam_leave_digital_services'] },
    ];

    sectionLinks.forEach(({ id, paths }) => {
        const link = document.getElementById(id);
        if (!link) return;
        if (paths.includes(currentPath)) {
            link.classList.add('active');
            const section = link.closest('.sidebar-section');
            if (section) section.classList.add('active');
            const expandable = link.closest('.sidebar-expandable');
            if (expandable) expandable.classList.add('active');
        }
    });
}

window.initSidebarFlyouts = initSidebarFlyouts;
