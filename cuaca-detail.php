<?php 
    require "session.php";
    require "koneksi.php";

    $id = $_GET['p'];
    $query= mysqli_query($con, "SELECT * FROM cuaca WHERE id='$id'");
    $data = mysqli_fetch_array($query);

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
    <title>Detail Prakiraan Cuaca</title>
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
            <li><a href="listcuaca.php" class="hover:text-amber-600">Data Cuaca</a></li>
            <li>/</li>
            <li class="text-amber-600 font-medium">Detail #<?= $data['id'] ?></li>
        </ol>
    </nav>

    <!-- heading -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <h1 class="text-2xl md:text-3xl font-extrabold">Detail Prakiraan Cuaca</h1>
        <span class="text-sm text-gray-500 mt-2 md:mt-0">Kode: #<?= $data['id'] ?></span>
    </div>

    <!-- current photo -->
    <?php if($data['foto']): ?>
        <div class="mb-6">
            <img src="images/<?= htmlspecialchars($data['foto']) ?>" alt="Foto prakiraan" class="w-full max-w-2xl rounded-2xl shadow-md">
        </div>
    <?php endif; ?>

    <!-- edit form -->
    <div class="bg-white rounded-2xl shadow-md p-6 space-y-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama" class="block text-sm font-semibold mb-1">Nama Prakiraan</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
            </div>

            <!-- file upload with preview -->
            <div>
                <label for="foto" class="block text-sm font-semibold mb-1">Ganti Foto</label>
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
                <button type="submit" name="kembali"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold transition">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>Kembali
                </button>
            </div>

            <!-- alerts -->
            <?php 
            if(isset($_POST['simpan'])){
                $nama= htmlspecialchars($_POST['nama']);                   
                $target_dir = "images/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString (20);
                $new_name = $random_name . "." . $imageFileType;

                if($nama==''){
                    echo '<div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-lg">
                            Nama wajib diisi
                          </div>';
                } else {
                    // update nama terlebih dahulu
                    mysqli_query ($con, "UPDATE cuaca SET nama='$nama' WHERE id=$id");

                    if($nama_file!=''){
                        if($image_size > 5000000){
                            echo '<div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-lg">
                                    File tidak boleh lebih dari 5 Mb
                                  </div>';
                        } elseif($imageFileType!='jpg' && $imageFileType !='png' && $imageFileType !='gif'){
                            echo '<div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-lg">
                                    File foto wajib bertipe JPG / PNG / GIF
                                  </div>';
                        } else {
                            // hapus file lama
                            $oldFile = $data['foto'];
                            if($oldFile && file_exists($target_dir . $oldFile)){
                                unlink($target_dir . $oldFile);
                            }

                            // upload file baru
                            move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $new_name);

                            // update database dengan foto baru
                            $queryUpdate = mysqli_query($con, "UPDATE cuaca SET foto='$new_name' WHERE id='$id'");
                            if($queryUpdate){
                                echo '<div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg">
                                        Kejadian berhasil diupdate
                                      </div>';
                                echo '<meta http-equiv="refresh" content="2; url=list-cuaca.php" />';
                            } else {
                                echo mysqli_error ($con);
                            }
                        }
                    } else {
                        echo '<div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg">
                                Kejadian berhasil diupdate
                              </div>';
                        echo '<meta http-equiv="refresh" content="2; url=listcuaca.php" />';
                    }
                }
            }

            if(isset ($_POST['kembali'])){
                echo '<meta http-equiv="refresh" content="0; url=listcuaca.php" />';
            }
            ?>
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