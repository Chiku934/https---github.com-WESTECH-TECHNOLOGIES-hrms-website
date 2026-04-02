/**
 * Sidebar Flyout Handler
 * Enhanced for Premium Navigation and Viewport Resilience.
 */

function initSidebarFlyouts() {
    console.log('Initializing Premium Sidebar Flyouts...');
    
    const wrappers = document.querySelectorAll('.nav-item-wrapper');
    const normalizeRoute = (value) => {
        const raw = (value || '').split('?')[0].split('#')[0].trim();
        const lastSegment = raw.split('/').pop() || '';
        return lastSegment
            .replace(/\.php$/i, '')
            .replace(/\.html$/i, '')
            .toLowerCase();
    };

    const currentPath = normalizeRoute(window.location.pathname);
    const mePaths = new Set([
        'user-attendance',
        'timesheet',
        'user-leave',
        'user-performance',
        'user-performance-meetings',
        'user-performance-feedback',
        'user-performance-pip',
        'user-performance-reviews',
        'user-performance-skills',
        'user-performance-competencies',
        'user-expenses',
        'user-expenses-past-claims',
        'user-expenses-advance-requests',
        'user-support',
        'user-support-tickets',
        'user-support-knowledge-base',
        'user-support-requests',
        'user-support-faq',
    ]);
    const myTeamPaths = new Set([
        'myteam_leave_overview',
        'myteam_leave_approvals',
        'myteam_leave_direct',
        'myteam_leave_indirect',
        'myteam_leave_digital_services',
    ]);

    const meLink = document.getElementById('sidebar-me-link');
    const myTeamLink = document.getElementById('sidebar-my-team-link');

    if (meLink) {
        const isMeActive = mePaths.has(currentPath);
        meLink.style.backgroundColor = isMeActive ? '#1e3a5f' : 'transparent';
        meLink.style.opacity = isMeActive ? '1' : '0.8';
    }

    if (myTeamLink) {
        const isMyTeamActive = myTeamPaths.has(currentPath);
        myTeamLink.style.backgroundColor = isMyTeamActive ? '#1e3a5f' : 'transparent';
        myTeamLink.style.opacity = isMyTeamActive ? '1' : '0.8';
    }

    wrappers.forEach(wrapper => {
        const submenu = wrapper.querySelector('.submenu');
        if (!submenu) return;

        wrapper.addEventListener('mouseenter', () => {
            // Force visibility with !important to override any legacy style.css rules
            submenu.style.setProperty('display', 'flex', 'important');
            submenu.style.setProperty('visibility', 'visible', 'important');
            submenu.style.setProperty('opacity', '1', 'important');

            // Reset positioning
            submenu.style.top = '0';
            submenu.style.bottom = 'auto';

            // Calculate if it fits in viewport
            const rect = submenu.getBoundingClientRect();
            const viewportHeight = window.innerHeight;

            if (rect.bottom > viewportHeight) {
                // Shift up if it hits the bottom
                const overflow = rect.bottom - viewportHeight;
                // Add minor padding from the bottom
                submenu.style.top = `-${overflow + 10}px`;
            }
            
            // Safety: If it's still clipping at the top after shifting
            const updatedRect = submenu.getBoundingClientRect();
            if (updatedRect.top < 0) {
                submenu.style.top = '0';
            }
        });

        wrapper.addEventListener('mouseleave', () => {
            submenu.style.setProperty('display', 'none', 'important');
        });
    });

    // Handle Nested Submenus (Second Level)
    const nestedWrappers = document.querySelectorAll('.submenu-item-wrapper');
    nestedWrappers.forEach(wrapper => {
        const nestedSubmenu = wrapper.querySelector('.nested-submenu');
        if (!nestedSubmenu) return;

        wrapper.addEventListener('mouseenter', () => {
            nestedSubmenu.style.setProperty('display', 'flex', 'important');
            
            // Position nested relative to viewport
            const rect = nestedSubmenu.getBoundingClientRect();
            const vHeight = window.innerHeight;
            if (rect.bottom > vHeight) {
                nestedSubmenu.style.top = 'auto';
                nestedSubmenu.style.bottom = '0';
            }
        });

        wrapper.addEventListener('mouseleave', () => {
            nestedSubmenu.style.setProperty('display', 'none', 'important');
        });
    });

    document.querySelectorAll('.submenu-item').forEach(item => {
        const href = item.getAttribute('href') || '';
        if (!href || href.startsWith('#')) return;

        const targetPath = normalizeRoute(href);

        if (targetPath === currentPath) {
            item.classList.add('active');
            const parentWrapper = item.closest('.nav-item-wrapper');
            const parentLink = parentWrapper ? parentWrapper.querySelector(':scope > a') : null;
            if (parentLink && parentLink.id === 'sidebar-me-link') {
                parentLink.style.backgroundColor = '#1e3a5f';
                parentLink.style.opacity = '1';
            }
            if (parentLink && parentLink.id === 'sidebar-my-team-link') {
                parentLink.style.backgroundColor = '#1e3a5f';
                parentLink.style.opacity = '1';
            }
        }
    });
}

// Re-initialize if the DOM changes dynamically (Optional safety)
window.initSidebarFlyouts = initSidebarFlyouts;
