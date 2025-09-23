<?php
    require "session.php";
    require "koneksi.php";
    $queryinput= mysqli_query($con, "SELECT * FROM cuaca");
    $jumlahinput = mysqli_num_rows($queryinput);

    function generateRandomString($length = 10){
        $characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <$length; $i++){
            $randomString .=$characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Prakiraan Cuaca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="bg-gray-50 text-gray-800">
<?php require "navbar-dashboard.php"; ?>

<main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-12">
    <!-- breadcrumb -->
    <nav class="text-sm text-gray-500 mb-6">
        <ol class="flex items-center space-x-2">
            <li class="flex items-center gap-1">
                <i data-lucide="home" class="w-4 h-4"></i>
                <a href="dashboard.php" class="hover:text-amber-600">Dashboard</a>
            </li>
            <li>/</li>
            <li class="text-amber-600 font-medium">Update Prakiraan Cuaca Wilayah Perairan</li>
        </ol>
    </nav>

    <!-- heading -->
    <h1 class="text-2xl md:text-3xl font-extrabold mb-6">Update Prakiraan Cuaca Wilayah Perairan</h1>

    <!-- card form -->
    <div class="bg-white rounded-2xl shadow-md p-6 space-y-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama" class="block text-sm font-semibold mb-1">1. Nama prakiraan</label>
                <input type="text" id="nama" name="nama" required
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
            </div>

            <!-- file upload with preview -->
            <div>
                <label for="foto" class="block text-sm font-semibold mb-1">2. Foto Prakiraan</label>
                <input type="file" name="foto" id="foto" accept="image/*"
                       onchange="preview(event)"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                <img id="preview-img" class="mt-3 hidden max-h-64 rounded-lg shadow">
            </div>

            <!-- buttons -->
            <div class="flex flex-wrap gap-4 pt-4">
                <button type="submit" name="simpan"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">
                    <i data-lucide="save" class="w-4 h-4"></i>Simpan
                </button>
                <a href="list-cuaca.php"
                   class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold transition">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>Kembali
                </a>
            </div>

            <!-- alerts -->
            <?php if(isset($_POST['simpan'])):
    $nama = htmlspecialchars($_POST['nama']);
    $target_dir = "images/";
    $nama_file = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_size = $_FILES["foto"]["size"];
    $random_name = generateRandomString(20);
    $new_name = $random_name . "." . $imageFileType;

    // ambil foto lama
    $result = mysqli_query($con, "SELECT foto FROM cuaca LIMIT 1"); 
    $row = mysqli_fetch_assoc($result);
    $old_foto = $row['foto'] ?? '';

    if ($nama == ''): ?>
        <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-lg">
            Nama wajib diisi
        </div>
    <?php else: 
        if ($nama_file != '') {
            if ($image_size > 5000000): ?>
                <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-lg">
                    File tidak boleh lebih dari 5 Mb
                </div>
            <?php elseif ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'): ?>
                <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-lg">
                    File foto Wajib bertipe jpg/png/gif
                </div>
            <?php else:
                // hapus foto lama
                if ($old_foto && file_exists($target_dir . $old_foto)) {
                    unlink($target_dir . $old_foto);
                }

                // upload foto baru
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                $queryUpdate = mysqli_query(
                    $con,
                    "UPDATE cuaca SET nama='$nama', foto='$new_name'"
                );
            endif;
        } else {
            // jika tidak upload foto baru, tetap update nama saja
            $queryUpdate = mysqli_query(
                $con,
                "UPDATE cuaca SET nama='$nama'"
            );
        }

        if (isset($queryUpdate) && $queryUpdate): ?>
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg">
                Data Prakiraan Cuaca Berhasil Diperbaharui
            </div>
            <meta http-equiv="refresh" content="2; url=input-cuaca.php" />
        <?php else: ?>
            <?= mysqli_error($con) ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

        </form>
    </div>
</main>

<script>
    function preview(e){
        const img = document.getElementById('preview-img');
        img.src = URL.createObjectURL(e.target.files[0]);
        img.classList.remove('hidden');
    }
    lucide.createIcons();
</script>
</body>
</html>