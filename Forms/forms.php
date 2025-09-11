<?php
class forms {
    public function navbar() {
        ?>
        <nav>
            <div class="flex-container">
                <div class="nav-links">
                    <a href="#">Home</a>
                    <a href="./signin.php">Sign In</a>
                    <a href="./signup.php">Sign Up</a>
                </div>
            </div>
        </nav>
        <?php
    }

    public function home() {
        ?>
        <section class="welcome-section">
            <h1>Welcome to the Scholarship Portal</h1>
            <p>Discover scholarships tailored to your profile, track your applications, and boost your chances of success with expert guidance.</p>
        </section>
        <div class="features-container">
            <div class="feature-item">
                <h3>Smart Search</h3>
                <p>Advanced filtering and AI-powered recommendations to find scholarships that match your profile perfectly.</p>
            </div>
            <div class="feature-item">
                <h3>Application Tracking</h3>
                <p>Keep track of all your applications, deadlines, and requirements in one organized dashboard.</p>
            </div>
        </div>
        <?php
    }

    public function sign_up() {
        ?>
        <section class="signup-section">
            <div class="signup-container">
                <h2>Create Your Account</h2>
                <p class="subtitle">Join today and start your scholarship journey!</p>

                <form action="handle_signup.php" method="POST" class="signup-form">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    

                    <button type="submit" class="btn-submit">Sign Up</button>

                    <p class="redirect-text">
                        Already have an account? <a href="signin.php">Sign In</a>
                    </p>
                </form>
            </div>
        </section>
        <?php
    }

    public function sign_in() {
        ?>
        <div class="form-card">
            <h1>Login</h1>
            <form action="handle_signin.php" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter your email" required name="email">

                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter password" required name="password">

                <div class="options">
                    <p>Forgot password? <a href="#" class="forgot-password">Click here</a></p>
                    <label class="remember-label">
                        <input type="checkbox">
                        <span>Remember this Device</span>
                    </label>
                </div>

                <button type="submit" class="display-btn">Login</button>

                <div class="divider"><span>or</span></div>

                <p class="display-text">
                    Don't have an account? <a href="signup.php">Sign up</a>
                </p>
            </form>
        </div>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./Assets/style.css">
    <title>Assignment Page</title>
</head>
<body>
</body>
</html>
