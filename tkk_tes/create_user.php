<?php
include('./head.php');

session_start();

$dsn = 'mysql:host=localhost;dbname=tkk_crud';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name)) {
        $errors['name'] = 'Nama tidak boleh kosong';
    }

    if (empty($email)) {
        $errors['email'] = 'Email tidak boleh kosong';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid';
    }

    if (empty($password)) {
        $errors['password'] = 'Password tidak boleh kosong';
    }

    if (empty($errors)) {
        $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $pdo->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashedPassword
            ]);
            $_SESSION['success'] = "Data user berhasil disimpan!";
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } catch (PDOException $e) {
            $errors['database'] = "Terjadi kesalahan saat menyimpan data: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <h2>Tambah Data User</h2>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <form class="mt-4" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input name="name" type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" />
                <?php if (isset($errors['name'])): ?>
                    <p class="text-danger"><?php echo $errors['name']; ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" />
                <?php if (isset($errors['email'])): ?>
                    <p class="text-danger"><?php echo $errors['email']; ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" />
                <?php if (isset($errors['password'])): ?>
                    <p class="text-danger"><?php echo $errors['password']; ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>
</html>
