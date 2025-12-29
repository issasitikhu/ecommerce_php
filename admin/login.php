<?php
session_start();
include("../config/db_connect.php");
include("header.php");

if (isset($_POST['admin_login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement (secure)
    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE email = ? AND role = 'admin' LIMIT 1"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $admin = $result->fetch_assoc();

        if (password_verify($password, $admin['password'])) {

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['f_name'];

            echo "<script>alert('Login successful')</script>";
            echo "<script>window.location.href='index.php'</script>";
            exit;

        } else {
            echo "<script>alert('Invalid email or password')</script>";
        }

    } else {
        echo "<script>alert('Invalid email or password')</script>";
    }
}
?>

<!-- ================= LOGIN FORM ================= -->

<div style="max-width:400px; margin:60px auto;">
    <h2 style="text-align:center;">Admin Login</h2>

    <form method="POST" action="">

        <div style="margin-bottom:15px;">
            <label>Email</label>
            <input
                type="email"
                name="email"
                required
                style="width:100%; padding:10px;"
            >
        </div>

        <div style="margin-bottom:15px;">
            <label>Password</label>
            <input
                type="password"
                name="password"
                required
                style="width:100%; padding:10px;"
            >
        </div>

        <button
            type="submit"
            name="admin_login"
            style="width:100%; padding:10px; cursor:pointer;"
        >
            Login
        </button>

    </form>
</div>

<?php include("footer.php"); ?>
