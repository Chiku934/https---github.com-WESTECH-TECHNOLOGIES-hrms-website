<style>
        body.timesheet-page {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #eef2f7;
            min-height: 100vh;
        }

        .timesheet-shell {
            display: flex;
            min-height: 100vh;
        }

        .timesheet-main {
            flex: 1;
            margin-left: 150px;
            background-color: #f8fbff;
            min-width: 0;
        }

        .timesheet-content {
            padding: 12px 16px 24px;
            width: 100%;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        .timesheet-grid-view {
            background-color: white;
            width: 100%;
            padding: 25px 30px;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        .timesheet-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .timesheet-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #e2e8f0;
        }

        .timesheet-table th {
            background-color: #f8fafc;
            padding: 12px 15px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            border: 1px solid #e2e8f0;
        }

        .timesheet-table td {
            padding: 15px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }

        .timesheet-add-entry {
            color: #6366f1;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 15px;
        }

        #header-container { animation: slideDownHeaders 0.4s ease-out forwards; }
    </style>
<div class="timesheet-shell">
        <div class="sidebar"></div>
        <div class="timesheet-main">
            <div id="header-container"></div>

            <div class="timesheet-content">
                <!-- Full High-Fidelity Timesheet Grid Design -->
                <div class="timesheet-grid-view">
                    <div class="timesheet-header">
                        <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0;">All Timesheets</h2>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <span style="font-size: 12px; color: #64748b;">Submit daily time entry</span>
                            <div
                                style="width: 32px; height: 18px; background: #e2e8f0; border-radius: 10px; position: relative;">
                                <div
                                    style="width: 14px; height: 14px; background: white; border-radius: 50%; position: absolute; left: 2px; top: 2px;">
                                </div>
                            </div>
                            <div style="display: flex; border: 1px solid #e2e8f0; border-radius: 4px; padding: 2px;">
                                <button style="background: #f1f5f9; border: none; padding: 4px 8px; cursor: pointer;"><i
                                        class="fa-solid fa-list"></i></button>
                                <button
                                    style="background: transparent; border: none; padding: 4px 8px; cursor: pointer;"><i
                                        class="fa-solid fa-grip-vertical"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Bar -->
                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <div style="display: flex; gap: 10px;">
                            <div
                                style="border: 1px solid #e2e8f0; padding: 6px 12px; border-radius: 4px; font-size: 12px; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-chevron-left" style="color: #64748b; font-size: 10px;"></i>
                                <span style="font-weight: 600;">23 Mar - 29 Mar 2026</span>
                                <i class="fa-solid fa-chevron-right" style="color: #64748b; font-size: 10px;"></i>
                            </div>
                            <button
                                style="border: 1px solid #e2e8f0; background: white; padding: 6px 12px; border-radius: 4px; cursor: pointer;"><i
                                    class="fa-regular fa-calendar"></i></button>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button
                                style="border: 1px solid #6366f1; color: #6366f1; background: white; padding: 6px 15px; border-radius: 4px; font-size: 12px; font-weight: 600; cursor: pointer;">Copy
                                last week hours</button>
                            <button
                                style="border: 1px solid #e2e8f0; background: white; padding: 6px 12px; border-radius: 4px; cursor: pointer;"><i
                                    class="fa-solid fa-ellipsis"></i></button>
                        </div>
                    </div>

                    <!-- Total Row -->
                    <div style="display: flex; gap: 50px; margin-bottom: 30px;">
                        <div>
                            <div style="font-size: 11px; color: #64748b; font-weight: 600; margin-bottom: 5px;">Total <i
                                    class="fa-solid fa-circle-info"></i></div>
                            <div style="font-size: 16px; font-weight: 700; color: #1e293b;">0:00 / 40:00</div>
                            <div
                                style="width: 150px; height: 6px; background: #f1f5f9; border-radius: 3px; margin-top: 8px;">
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 11px; color: #64748b; font-weight: 600; margin-bottom: 5px;">Time Off
                            </div>
                            <div style="display: flex; align-items: center; gap: 5px;">
                                <div style="width: 8px; height: 8px; background: #3b82f6; border-radius: 50%;"></div>
                                <span style="font-size: 14px; font-weight: 700; color: #1e293b;">0:00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Grid Content -->
                    <table class="timesheet-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">PROJECTS</th>
                                <th>23 MAR<br>MON</th>
                                <th>24 MAR<br>TUE</th>
                                <th>25 MAR<br>WED</th>
                                <th>26 MAR<br>THU</th>
                                <th>27 MAR<br>FRI</th>
                                <th>28 MAR<br>SAT</th>
                                <th>29 MAR<br>SUN</th>
                                <th>TASK TOTAL<br>HRS/ WEEK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" style="padding: 0;">
                                    <div class="timesheet-add-entry" style="padding: 15px;">
                                        <i class="fa-solid fa-plus"></i> Add Time Entry
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr style="background: #f8fafc; font-weight: 700;">
                                <td style="font-size: 12px; color: #1e293b;">Total hours/day <i
                                        class="fa-solid fa-circle-info" style="color: #64748b; font-size: 10px;"></i>
                                </td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                                <td style="text-align: center; color: #1e293b;">0:00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/header.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Load Sidebar
            fetch('/HRMS/app/includes/sidebar.php?v=' + new Date().getTime())
                .then(response => response.text())
                .then(html => {
                    const sidebarContainer = document.querySelector('.sidebar');
                    if (sidebarContainer) {
                        sidebarContainer.outerHTML = html;
                        if (window.initSidebarFlyouts) window.initSidebarFlyouts();
                    }
                })
                .catch(error => console.error('Error loading sidebar:', error));

            if (window.HeaderHandler) {
                window.HeaderHandler.init({
                    title: 'Me',
                    subtitle: 'Timesheet Grid',
                    activeModule: 'me',
                    activeSecondary: 'timesheet',
                    activeTab: 'rejected', // Matches the design screenshot
                    focusMode: false // Show the module nav and tab bar
                });
            }
        });
    </script>



