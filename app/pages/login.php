<div class="login-container">
    <div class="login-card fade-in" style="background:#1c2759;box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);">
        <div class="card-content">
            <h1>Welcome <span class="text-blue">Back</span></h1>
            <p class="subtitle">Sign in to continue Protection</p>

            <form id="adminLoginForm" novalidate>
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope icon-left"></i>
                        <input type="email" id="email" placeholder="admin@hrms.com" required autocomplete="email">
                    </div>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock icon-left" style="font-size: 14px;"></i>
                        <input type="password" id="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;" required autocomplete="current-password">
                        <i class="fa-regular fa-eye-slash icon-right" id="togglePassword"></i>
                    </div>
                </div>

                <div class="forgot-password">
                    <a href="#">Forgot Password ?</a>
                </div>

                <button type="submit" class="sign-in-btn" id="signInBtn">Sign In</button>

                <div id="messageArea" class="message-area"></div>
            </form>

            <div class="login-links">
                <a href="#" id="loginAsAdminLink">Login as Admin</a>
                <a href="#" id="loginAsUserLink">Login as User</a>
            </div>
        </div>
    </div>
</div>
