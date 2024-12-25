<?php
include 'index.php';

$kategori_id = isset($_GET['kategori']) ? $_GET['kategori'] : '';

$sql = "SELECT 
    teman.id_teman, 
    teman.nama, 
    teman.alamat, 
    teman.jenis_kelamin, 
    teman.hobi, 
    teman.whatsapp, 
    teman.gambar,
    kategori.nama_kategori 
FROM teman
LEFT JOIN teman_sd ON teman.id_teman = teman_sd.id_teman
LEFT JOIN teman_smp ON teman.id_teman = teman_smp.id_teman
LEFT JOIN teman_sma ON teman.id_teman = teman_sma.id_teman
LEFT JOIN teman_kuliah ON teman.id_teman = teman_kuliah.id_teman
LEFT JOIN teman_desa ON teman.id_teman = teman_desa.id_teman
LEFT JOIN kategori ON (
    teman.id_kategori = kategori.id_kategori OR
    teman.id_kategori = kategori.id_kategori OR
    teman.id_kategori = kategori.id_kategori OR
    teman.id_kategori = kategori.id_kategori OR
    teman.id_kategori = kategori.id_kategori
)";

if (!empty($kategori_id)) {
    $sql .= " AND kategori.id_kategori = '$kategori_id'";
}


if (!empty($kategori_id)) {
    $sql .= " WHERE (kategori.id_kategori = '$kategori_id')";
}


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtering Teman</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<header>
<div class="page">
<nav class="navbar">
        <div class="logo">
            <span>ABI RAFDI HASBUR RAHMAN</span>
        </div>
        <div class="nav-links">
            <a href="index.html"><i class="fas fa-home"></i> Home</a>
            <div class="dropdown">
                <a>
                    <i class="fas fa-user-friends"></i> Teman 
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </a>
                <div class="dropdown-content">
                    <a href="temansd.php"><i class="fas fa-child"></i> Teman SD</a>
                    <a href="temansmp.php"><i class="fas fa-school"></i> Teman SMP</a>
                    <a href="temansma.php"><i class="fas fa-graduation-cap"></i> Teman SMA</a>
                    <a href="temansma.php"><i class="fas fa-university"></i> Teman Kuliah</a>
                    <a href="temandesa.php"><i class="fas fa-home"></i> Teman Desa</a>
                </div>
            </div>
            
            <div class="dropdown">
                <a href="kategoriteman.php" class="active">
                    <i class="fas fa-user-friends"></i> Kategori Teman
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </a>
                <div class="dropdown-content">
                    <a href="kategoriteman.php?kategori=K01"><i class="fas fa-heart"></i> Teman Dekat</a>
                    <a href="kategoriteman.php?kategori=K02"><i class="fas fa-coffee"></i> Teman Nongkrong</a>
                    <a href="kategoriteman.php?kategori=K03"><i class="fas fa-comments"></i> Teman Curhat</a>
                    <a href="kategoriteman.php?kategori=K04"><i class="fas fa-gamepad"></i> Teman Game</a>
                    <a href="kategoriteman.php?kategori=K05"><i class="fas fa-futbol"></i> Teman Main</a>
                </div>
            </div>
        </div>
        <div class="social-icons">
            <button id="menu-toggle" class="menu-button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <div id="sidebar" class="sidebar">
            <button id="close-sidebar" class="close-button">&times;</button>
            <a href="index.html"><i class="fas fa-home"></i> Home</a>
            <div class="dropdown">
                <a class="dropdown-btn">
                    <i class="fas fa-users"></i> Friends 
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </a>
                <div class="dropdown-content">
                    <a href="temansd.php"><i class="fas fa-child"></i> Teman SD</a>
                    <a href="temansmp.php"><i class="fas fa-school"></i> Teman SMP</a>
                    <a href="temansma.php"><i class="fas fa-graduation-cap"></i> Teman SMA</a>
                    <a href="temankuliah.php"><i class="fas fa-university"></i> Teman Kuliah</a>
                    <a href="temandesa.php"><i class="fas fa-home"></i> Teman Desa</a>
                </div>
            </div>
            
            <div class="dropdown">
                <a class="dropdown-btn">
                    <i class="fas fa-th-large"></i> Category 
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </a>
                <div class="dropdown-content">
                        <a href="kategoriteman.php?kategori=K01"><i class="fas fa-heart"></i> Teman Dekat</a>
                        <a href="kategoriteman.php?kategori=K02"><i class="fas fa-coffee"></i> Teman Nongkrong</a>
                        <a href="kategoriteman.php?kategori=K03"><i class="fas fa-comments"></i> Teman Curhat</a>
                        <a href="kategoriteman.php?kategori=K04"><i class="fas fa-gamepad"></i> Teman Game</a>
                        <a href="kategoriteman.php?kategori=K05"><i class="fas fa-futbol"></i> Teman Main</a>
                </div>
            </div>
        </div>
    </nav>
</div>
</header>
<body>
<div class="filter">
    <form method="GET" action="">
        <label for="kategori"><i class="fas fa-filter icon"></i>Pilih Kategori Teman: </label>
        <select name="kategori" id="kategori" onchange="this.classList.add('selected');">
            <option value="">Semua</option>
            <option value="K01" <?= $kategori_id === 'K01' ? 'selected' : '' ?>>Teman Dekat</option>
            <option value="K02" <?= $kategori_id === 'K02' ? 'selected' : '' ?>>Teman Nongkrong</option>
            <option value="K03" <?= $kategori_id === 'K03' ? 'selected' : '' ?>>Teman Curhat</option>
            <option value="K04" <?= $kategori_id === 'K04' ? 'selected' : '' ?>>Teman Game</option>
            <option value="K05" <?= $kategori_id === 'K05' ? 'selected' : '' ?>>Teman Main</option>
        </select>
        <button type="submit"><i class="fas fa-search icon"></i>Cari</button>
    </form>
</div>
    <div class="container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kategori = $row['nama_kategori'] ? $row['nama_kategori'] : "Tidak ada kategori";
            $gambar = $row['gambar'] ? $row['gambar'] : "images/default.jpg";
            echo "
            <div class='card'>
                <img src='{$gambar}' alt='{$row['nama']}' class='card-image'>
                <div class='info-box'>
                    <h3>{$row['nama']}</h3>
                    <p><strong>Alamat:</strong> {$row['alamat']}</p>
                    <p><strong>Jenis Kelamin:</strong> {$row['jenis_kelamin']}</p>
                    <p><strong>Hobi:</strong> {$row['hobi']}</p>
                    <p><strong>WhatsApp:</strong> {$row['whatsapp']}</p>
                    <p><strong>Kategori:</strong> $kategori</p>
                </div>
            </div>";
        }
    } else {
        echo "<p style='text-align: center;'>Tidak ada data teman untuk kategori ini.</p>";
    }
    ?>
</div>

<script src="javascript/script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
