<?php
session_start();
include 'db_connect.php'; // Pastikan file ini berisi koneksi ke database

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

// Ganti Password
if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Ambil password lama dari database
    $query = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $query->bind_param("i", $user_id);
    $query->execute();
    $query->bind_result($db_password);
    $query->fetch();
    $query->close();

    // Cek apakah password lama cocok
    if (!password_verify($current_password, $db_password)) {
        $message = "Password lama salah!";
    } elseif ($new_password !== $confirm_password) {
        $message = "Konfirmasi password tidak cocok!";
    } else {
        // Update password baru
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update->bind_param("si", $hashed_password, $user_id);
        $update->execute();
        $update->close();
        $message = "Password berhasil diperbarui!";
    }
}

// Upload Foto Profil
if (isset($_POST['upload_profile'])) {
    if ($_FILES['profile_picture']['error'] == 0) {
        $file_name = basename($_FILES['profile_picture']['name']);
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($file_ext), $allowed_ext)) {
            $new_filename = "profile_" . $user_id . "." . $file_ext;
            $upload_path = "uploads/" . $new_filename;

            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_path)) {
                // Simpan nama file ke database
                $update = $conn->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
                $update->bind_param("si", $new_filename, $user_id);
                $update->execute();
                $update->close();
                $message = "Foto profil berhasil diunggah!";
            } else {
                $message = "Gagal mengunggah foto.";
            }
        } else {
            $message = "Format file tidak didukung!";
        }
    } else {
        $message = "Pilih file terlebih dahulu!";
    }
}

// Ambil data pengguna
$query = $conn->prepare("SELECT name, email, role, profile_picture FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$query->bind_result($name, $email, $role, $profile_picture);
$query->fetch();
$query->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun</title>
</head>
<body>
    <h2>Pengaturan Akun</h2>
    <p><strong>Nama:</strong> <?= htmlspecialchars($name) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Role:</strong> <?= htmlspecialchars($role) ?></p>
    
    <!-- Menampilkan Foto Profil -->
    <p><strong>Foto Profil:</strong></p>
    <?php if ($profile_picture): ?>
        <img src="uploads/<?= htmlspecialchars($profile_picture) ?>" width="150" alt="Foto Profil">
    <?php else: ?>
        <p>Belum ada foto profil.</p>
    <?php endif; ?>

    <h3>Ganti Password</h3>
    <form method="POST">
        <label>Password Lama:</label>
        <input type="password" name="current_password" required><br>

        <label>Password Baru:</label>
        <input type="password" name="new_password" required><br>

        <label>Konfirmasi Password Baru:</label>
        <input type="password" name="confirm_password" required><br>

        <button type="submit" name="change_password">Ganti Password</button>
    </form>

    <h3>Upload Foto Profil</h3>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="profile_picture" required><br>
        <button type="submit" name="upload_profile">Upload</button>
    </form>

    <p style="color: red;"><?= htmlspecialchars($message) ?></p>
</body>
</html>
