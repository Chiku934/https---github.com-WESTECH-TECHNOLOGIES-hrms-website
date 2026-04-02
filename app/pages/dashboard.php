<style>
    body.dashboard-page {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background: #eef2f7;
        min-height: 100vh;
    }

    .dashboard-shell {
        display: flex;
        min-height: 100vh;
    }

    .dashboard-main {
        flex: 1;
        margin-left: 260px;
        background-color: #f8fbff;
        min-width: 0;
    }

    .dashboard-content {
        padding: 12px 16px 24px;
        width: 100%;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        box-sizing: border-box;
    }

    .dashboard-content > div {
        width: 100%;
    }
</style>

<div class="dashboard-content" id="dashboard-content">
    <div class="timesheet-grid-view" id="timesheet-view" style="display: none !important;">
        <div class="timesheet-header">
            <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0;">All Timesheets</h2>
            <div style="display: flex; gap: 10px; align-items: center;">
                <span style="font-size: 12px; color: #64748b;">Submit daily time entry</span>
                <div style="width: 32px; height: 18px; background: #e2e8f0; border-radius: 10px; position: relative;">
                    <div style="width: 14px; height: 14px; background: white; border-radius: 50%; position: absolute; left: 2px; top: 2px;"></div>
                </div>
                <div style="display: flex; border: 1px solid #e2e8f0; border-radius: 4px; padding: 2px;">
                    <button style="background: #f1f5f9; border: none; padding: 4px 8px; cursor: pointer;"><i class="fa-solid fa-list"></i></button>
                    <button style="background: transparent; border: none; padding: 4px 8px; cursor: pointer;"><i class="fa-solid fa-grip-vertical"></i></button>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <div style="display: flex; gap: 10px;">
                <div style="border: 1px solid #e2e8f0; padding: 6px 12px; border-radius: 4px; font-size: 12px; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-chevron-left" style="color: #64748b; font-size: 10px;"></i>
                    <span style="font-weight: 600;">23 Mar - 29 Mar 2026</span>
                    <i class="fa-solid fa-chevron-right" style="color: #64748b; font-size: 10px;"></i>
                </div>
                <button style="border: 1px solid #e2e8f0; background: white; padding: 6px 12px; border-radius: 4px; cursor: pointer;"><i class="fa-regular fa-calendar"></i></button>
            </div>
            <div style="display: flex; gap: 10px;">
                <button style="border: 1px solid #6366f1; color: #6366f1; background: white; padding: 6px 15px; border-radius: 4px; font-size: 12px; font-weight: 600; cursor: pointer;">Copy last week hours</button>
                <button style="border: 1px solid #e2e8f0; background: white; padding: 6px 12px; border-radius: 4px; cursor: pointer;"><i class="fa-solid fa-ellipsis"></i></button>
            </div>
        </div>

        <div style="display: flex; gap: 50px; margin-bottom: 30px;">
            <div>
                <div style="font-size: 11px; color: #64748b; font-weight: 600; margin-bottom: 5px;">Total <i class="fa-solid fa-circle-info"></i></div>
                <div style="font-size: 16px; font-weight: 700; color: #1e293b;">0:00 / 40:00</div>
                <div style="width: 150px; height: 6px; background: #f1f5f9; border-radius: 3px; margin-top: 8px;"></div>
            </div>
            <div>
                <div style="font-size: 11px; color: #64748b; font-weight: 600; margin-bottom: 5px;">Time Off</div>
                <div style="display: flex; align-items: center; gap: 5px;">
                    <div style="width: 8px; height: 8px; background: #3b82f6; border-radius: 50%;"></div>
                    <span style="font-size: 14px; font-weight: 700; color: #1e293b;">0:00</span>
                </div>
            </div>
        </div>

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
                    <td style="font-size: 12px; color: #1e293b;">Total hours/day <i class="fa-solid fa-circle-info" style="color: #64748b; font-size: 10px;"></i></td>
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

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 20px; width: 100%; max-width: 1445px;">
        <div style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02); width: 350px; flex-shrink: 0; box-sizing: border-box;">
            <div style="color: #64748b; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Total Employees</div>
            <div style="font-size: 26px; font-weight: 700; color: #1e293b; margin-bottom: 5px;">245</div>
            <div style="color: #10b981; font-size: 11px; font-weight: 600;"><i class="fa-solid fa-arrow-up" style="margin-right: 3px;"></i>12% from last month</div>
        </div>
        <div style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02); width: 350px; flex-shrink: 0; box-sizing: border-box;">
            <div style="color: #64748b; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Present Today</div>
            <div style="font-size: 26px; font-weight: 700; color: #1e293b; margin-bottom: 5px;">231</div>
            <div style="color: #10b981; font-size: 11px; font-weight: 600;">94% attendance</div>
        </div>
        <div style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02); width: 350px; flex-shrink: 0; box-sizing: border-box;">
            <div style="color: #64748b; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Pending Leave</div>
            <div style="font-size: 26px; font-weight: 700; color: #1e293b; margin-bottom: 5px;">8</div>
            <div style="color: #ef4444; font-size: 11px; font-weight: 600;">Requires attention</div>
        </div>
        <div style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02); width: 350px; flex-shrink: 0; box-sizing: border-box;">
            <div style="color: #64748b; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Payroll Processed</div>
            <div style="font-size: 26px; font-weight: 700; color: #1e293b; margin-bottom: 5px;">100</div>
            <div style="color: #10b981; font-size: 11px; font-weight: 600;">Completed this month</div>
        </div>
    </div>

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 20px; width: 100%; max-width: 1445px;">
        <div style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02); width: 715px; box-sizing: border-box; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0;">
            <div>
                <div style="color: #64748b; font-size: 13px; font-weight: 500; margin-bottom: 10px;">Expense Requests</div>
                <div style="font-size: 26px; font-weight: 700; color: #1e293b; margin-bottom: 8px;">15</div>
                <div style="color: #ef4444; font-size: 11px; font-weight: 600;">Pending approval</div>
            </div>
            <div style="text-align: center;width: 300px;">
                <div style="font-size: 12px; font-weight: 600; margin-bottom: 15px; color: #1e293b;">Travel Expense</div>
                <div style="display: flex; gap: 20px; justify-content: center;">
                    <div style="text-align: center;">
                        <img src="https://ui-avatars.com/api/?name=Satish+Kumar&background=cbd5e1&color=1e293b&rounded=true" style="width: 38px; height: 38px; object-fit: cover; margin-bottom: 5px;">
                        <div style="font-size: 10px; color: #475569; font-weight: 500;">Satish Kum...</div>
                        <div style="font-size: 10px; color: #ef4444; margin-top: 2px;">Pending</div>
                    </div>
                    <div style="text-align: center;">
                        <img src="https://ui-avatars.com/api/?name=Suresh&background=cbd5e1&color=1e293b&rounded=true" style="width: 38px; height: 38px; object-fit: cover; margin-bottom: 5px;">
                        <div style="font-size: 10px; color: #475569; font-weight: 500;">Suresh...</div>
                        <div style="font-size: 10px; color: #ef4444; margin-top: 2px;">Pending</div>
                    </div>
                </div>
            </div>
        </div>

        <div style="background: white; padding: 30px 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02); width: 715px; box-sizing: border-box; position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: center; flex-shrink: 0;">
            <div style="color: #64748b; font-size: 13px; font-weight: 500; margin-bottom: 15px;">Project Time - Today</div>
            <div style="color: #475569; font-size: 12px; margin-bottom: 20px;">No entries added today</div>
            <div>
                <button style="background: #6366f1; color: white; border: none; padding: 8px 16px; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;">Add Time Entry</button>
            </div>
            <i class="fa-regular fa-clock" style="position: absolute; right: 25px; top: 50%; transform: translateY(-50%); font-size: 60px; color:black; z-index: 0;"></i>
        </div>
    </div>

    <div style="background: white; padding: 35px 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; width: 100%; max-width: 1445px; box-sizing: border-box;">
        <div style="flex: 1; min-width: 0;">
            <h3 style="font-size: 16px; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 25px;">Recent Activities</h3>

            <div style="margin-bottom: 30px;">
                <div style="font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 15px;">On leave today</div>
                <div style="display: flex; gap: 20px;">
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop" style="width: 45px; height: 45px; object-fit: cover; margin-bottom: 8px; border: 2px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 50%;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Sunil</div>
                    </div>
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop" style="width: 45px; height: 45px; object-fit: cover; margin-bottom: 8px; border: 2px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 50%;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Sasmita Behera</div>
                    </div>
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop" style="width: 45px; height: 45px; object-fit: cover; margin-bottom: 8px; border: 2px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 50%;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Partha</div>
                    </div>
                </div>
            </div>

            <div>
                <div style="font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 15px;">Working Remotely</div>
                <div style="display: flex; gap: 20px;">
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop" style="width: 45px; height: 45px; border-radius: 4px; object-fit: cover; margin-bottom: 8px;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Trideb</div>
                    </div>
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?w=100&h=100&fit=crop" style="width: 45px; height: 45px; border-radius: 4px; object-fit: cover; margin-bottom: 8px;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Mamata</div>
                    </div>
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1520813792240-56fc4a3765a7?w=100&h=100&fit=crop" style="width: 45px; height: 45px; border-radius: 4px; object-fit: cover; margin-bottom: 8px;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Smruti</div>
                    </div>
                </div>
            </div>
        </div>

        <div style="flex: 1; min-width: 0;">
            <div style="margin-bottom: 35px; margin-top: 40px;">
                <div style="font-size: 12px; font-weight: 500; color: black; margin-bottom: 15px;">Birthdays today</div>
                <div style="text-align: center; width: max-content;">
                    <div style="position: relative; display: inline-block;">
                        <img src="https://images.unsplash.com/photo-1548142813-c348350df52b?w=100&h=100&fit=crop" style="width: 45px; height: 45px; object-fit: cover; margin-bottom: 5px; border: 2px solid #a855f7; border-radius: 50%;">
                    </div>
                    <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Shreya</div>
                    <div style="font-size: 10px; color: #8b5cf6; font-weight: 500;">Wish</div>
                </div>
            </div>

            <div>
                <div style="font-size: 12px; font-weight: 500; color: black; margin-bottom: 15px;">Upcoming Birthdays</div>
                <div style="display: flex; gap: 20px;">
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?w=100&h=100&fit=crop" style="width: 45px; height: 45px; object-fit: cover; margin-bottom: 5px; border-radius: 50%;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Prashant</div>
                        <div style="font-size: 10px; color: #64748b;">29 March</div>
                    </div>
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop" style="width: 45px; height: 45px; object-fit: cover; margin-bottom: 5px; border-radius: 50%;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Dibya</div>
                        <div style="font-size: 10px; color: #64748b;">29 March</div>
                    </div>
                    <div style="text-align: center;">
                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&h=100&fit=crop" style="width: 45px; height: 45px; object-fit: cover; margin-bottom: 5px; border-radius: 50%;">
                        <div style="font-size: 11px; font-weight: 600; color: #0f172a;">Sai Aman</div>
                        <div style="font-size: 10px; color: #64748b;">30 March</div>
                    </div>
                </div>
            </div>
        </div>

        <div style="flex: 1.6; min-width: 0; display: flex; flex-direction: column; gap: 20px;">
            <div style="background: #8777bd; padding: 25px; border-radius: 8px; color: white; display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <div id="dateDisplay" style="font-size: 12px; font-weight: 500; margin-bottom: 20px; color: #e9e5f5;">Time Today - Fri, 27 Mar 2026</div>
                    <div style="font-size: 10px; font-weight: 600; letter-spacing: 1px; color: #dcd6ee; margin-bottom: 5px; text-transform: uppercase;">Current Time</div>
                    <div style="display: flex; align-items: baseline;">
                        <span id="timeDisplayHrsMin" style="font-size: 40px; font-weight: 600; line-height: 1;">09:56</span>
                        <span id="timeDisplaySec" style="font-size: 14px; margin-left: 5px;">:47 AM</span>
                    </div>
                </div>
                <div style="text-align: left;">
                    <div style="font-size: 12px; margin-bottom: 12px; font-weight: 500;">Apply</div>
                    <div style="display: flex; gap: 10px;">
                        <button style="background: white; color: #475569; border: none; padding: 6px 14px; border-radius: 4px; font-size: 11px; font-weight: 600; cursor: pointer;">Work From Home</button>
                        <button style="background: white; color: #475569; border: none; padding: 6px 14px; border-radius: 4px; font-size: 11px; font-weight: 600; cursor: pointer;">On Duty</button>
                    </div>
                </div>
            </div>

            <div style="padding: 10px 0;">
                <div style="font-size: 14px; font-weight: 600; color: #334155; margin-bottom: 20px;">Leave Balances</div>

                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; gap: 25px;">
                        <div style="text-align: center;">
                            <div class="circular-progress" data-value="100" style="position: relative; width: 64px; height: 64px; margin: 0 auto 10px;">
                                <svg width="64" height="64" viewBox="0 0 64 64">
                                    <circle cx="32" cy="32" r="28" fill="none" stroke="#e2e8f0" stroke-width="4" />
                                    <circle class="ring-fg" cx="32" cy="32" r="28" fill="none" stroke="#0ea5e9" stroke-width="4" stroke-dasharray="176" stroke-dashoffset="176" style="transition: stroke-dashoffset 1.5s ease; transform: rotate(-90deg); transform-origin: 50% 50%; stroke-linecap: round;" />
                                </svg>
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; line-height: 1.2;">
                                    <span style="font-size: 14px; font-weight: 700; color: #1e293b;">1</span>
                                    <span style="font-size: 10px; color: #64748b; font-weight: 500;">Days</span>
                                </div>
                            </div>
                            <div style="font-size: 9px; font-weight: 700; color: #64748b; text-transform: uppercase;">SICK LEAVE</div>
                        </div>

                        <div style="text-align: center;">
                            <div class="circular-progress" data-value="25" style="position: relative; width: 64px; height: 64px; margin: 0 auto 10px;">
                                <svg width="64" height="64" viewBox="0 0 64 64">
                                    <circle cx="32" cy="32" r="28" fill="none" stroke="#e2e8f0" stroke-width="4" />
                                    <circle class="ring-fg" cx="32" cy="32" r="28" fill="none" stroke="#0ea5e9" stroke-width="4" stroke-dasharray="176" stroke-dashoffset="176" style="transition: stroke-dashoffset 1.5s ease; transform: rotate(-90deg); transform-origin: 50% 50%; stroke-linecap: round;" />
                                </svg>
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; line-height: 1.2;">
                                    <span style="font-size: 14px; font-weight: 700; color: #1e293b;">0.25</span>
                                    <span style="font-size: 10px; color: #64748b; font-weight: 500;">Days</span>
                                </div>
                            </div>
                            <div style="font-size: 9px; font-weight: 700; color: #64748b; text-transform: uppercase;">EARNED LEAVE</div>
                        </div>

                        <div style="text-align: center;">
                            <div class="circular-progress" data-value="0" style="position: relative; width: 64px; height: 64px; margin: 0 auto 10px;">
                                <svg width="64" height="64" viewBox="0 0 64 64">
                                    <circle cx="32" cy="32" r="28" fill="none" stroke="#e2e8f0" stroke-width="4" />
                                    <circle class="ring-fg" cx="32" cy="32" r="28" fill="none" stroke="#0ea5e9" stroke-width="4" stroke-dasharray="176" stroke-dashoffset="176" style="transition: stroke-dashoffset 1.5s ease; transform: rotate(-90deg); transform-origin: 50% 50%; stroke-linecap: round;" />
                                </svg>
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; line-height: 1.2;">
                                    <span style="font-size: 14px; font-weight: 700; color: #1e293b;">0</span>
                                    <span style="font-size: 10px; color: #64748b; font-weight: 500;">Days</span>
                                </div>
                            </div>
                            <div style="font-size: 9px; font-weight: 700; color: #64748b; text-transform: uppercase;">CASUAL LEAVE</div>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 10px; align-items: flex-start; padding-left: 20px; border-left: 1px solid #f1f5f9;">
                        <a href="#" style="font-size: 12px; color: #6366f1; text-decoration: none; font-weight: 600;">Request Leave</a>
                        <a href="#" style="font-size: 12px; color: #6366f1; text-decoration: none; font-weight: 600;">View All Balances</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
