<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login_style.css"> <!-- Assuming your CSS file is named styles.css -->
</head>
<body>

<h1>Login</h1>

<div class="container">
    <form action="login_action.php" method="POST">
        
        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <!-- Login Button -->
        <button type="submit" class="loginbtn">Login</button>
        
        <div class="signin">
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </form>
</div>

</body>
</html>
