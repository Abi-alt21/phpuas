<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teman Kuliah</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="page">
<nav class="navbar">
        <div class="logo">
            <span>ABI RAFDI HASBUR RAHMAN</span>
        </div>
        <div class="nav-links">
            <a href="index.html"><i class="fas fa-home"></i> Home</a>
            <div class="dropdown">
                <a class="active">
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
                <a href="kategoriteman.php">
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

<div class="judul">
    <h1>DAFTAR TEMAN KULIAH</h1>
</div>
    <div class="card-container">
        <?php
        include 'index.php';
        
        $sql="SELECT teman.gambar, teman.alamat,  teman_kuliah.nama_panggilan, teman_kuliah.kelas, teman_kuliah.asal_sekolah
        FROM teman
        INNER JOIN teman_kuliah ON teman.id_teman = teman_kuliah.id_teman";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">
                        <div class="card-image" style="background-image: url(\'' . $row['gambar'] . '\');"></div>
                        <div class="card-content">
                            <h2>' . $row['nama_panggilan'] . '</h2>
                            <p>Kelas: ' . $row['kelas'] . '</p>
                            <p>Asal Sekolah: ' . $row['asal_sekolah'] . '</p>
                            <p>Alamat: ' . $row['alamat'] . '</p>
                        </div>
                    </div>';
            }
        } else {
            echo '<p>No data available</p>';
        }
        ?>
    </div>
    <script src="javascript/script.js"></script>
</body>
</html>
