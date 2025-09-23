<?php
    require "session.php";
    require "koneksi.php";
    $queryKejadian= mysqli_query($con, "SELECT * FROM kejadian");
    $jumlahKejadian = mysqli_num_rows($queryKejadian);
   
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
    <title>Input Data Kejadian dan Dampak Bencana</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .no-decoration {
            text-decoration: none;
        }
        .multi-select-container {
            position: relative;
        }
        .selected-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 10px;
            min-height: 35px;
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            background-color: #fff;
        }
        .pill {
            display: inline-flex;
            align-items: center;
            background-color: #0d6efd;
            color: white;
            padding: 4px 8px;
            border-radius: 15px;
            font-size: 0.875rem;
            margin: 2px;
        }
        .pill-remove {
            background: none;
            border: none;
            color: white;
            margin-left: 5px;
            cursor: pointer;
            font-size: 0.75rem;
        }
        .pill-remove:hover {
            color: #ffcccc;
        }
        .dropdown-container {
            position: relative;
        }
        .custom-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ced4da;
            border-top: none;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }
        .dropdown-item-custom {
            padding: 8px 12px;
            cursor: pointer;
            border-bottom: 1px solid #f0f0f0;
        }
        .dropdown-item-custom:hover {
            background-color: #f8f9fa;
        }
        .dropdown-item-custom.selected {
            background-color: #e3f2fd;
        }
        .search-input {
            width: 100%;
            border: none;
            outline: none;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="my-5 col-12 col-md-8">
            <h3>B.1 Data Kejadian Bencana</h3>
            <form action="" method="post" class="mt-3" enctype="multipart/form-data" id="disasterForm">
                <!-- Nama Kejadian - Multi-select -->
                <div class="mb-3">
                    <label for="nama" class="fw-semibold">1. Nama Kejadian</label>
                    <div class="multi-select-container">
                        <div class="selected-pills" id="nama-pills">
                            <input type="text" class="search-input" placeholder="Pilih kejadian..." id="nama-search">
                        </div>
                        <div class="dropdown-container">
                            <div class="custom-dropdown" id="nama-dropdown">
                                <div class="dropdown-item-custom" data-value="Banjir rob">Banjir rob</div>
                                <div class="dropdown-item-custom" data-value="Banjir bandang">Banjir bandang</div>
                                <div class="dropdown-item-custom" data-value="Banjir dan tanah longsor">Banjir dan tanah longsor</div>
                                <div class="dropdown-item-custom" data-value="Banjir drainase dan selokan">Banjir drainase dan selokan</div>
                                <div class="dropdown-item-custom" data-value="Banjir waduk">Banjir waduk</div>
                                <div class="dropdown-item-custom" data-value="Banjir genangan">Banjir genangan</div>
                                <div class="dropdown-item-custom" data-value="Tanggul jebol">Tanggul jebol</div>
                                <div class="dropdown-item-custom" data-value="Longsor">Longsor</div>
                                <div class="dropdown-item-custom" data-value="Gerakan tanah">Gerakan tanah</div>
                                <div class="dropdown-item-custom" data-value="Gelombang pasang">Gelombang pasang</div>
                                <div class="dropdown-item-custom" data-value="Abrasi Pantai">Abrasi Pantai</div>
                                <div class="dropdown-item-custom" data-value="Puting beliung">Puting beliung</div>
                                <div class="dropdown-item-custom" data-value="Angin kencang">Angin kencang</div>
                                <div class="dropdown-item-custom" data-value="Angin topan">Angin topan</div>
                                <div class="dropdown-item-custom" data-value="Hujan es">Hujan es</div>
                                <div class="dropdown-item-custom" data-value="Siklon tropis">Siklon tropis</div>
                                <div class="dropdown-item-custom" data-value="Suhu udara ekstrem">Suhu udara ekstrem</div>
                                <div class="dropdown-item-custom" data-value="Kekeringan meteorologis">Kekeringan meteorologis</div>
                                <div class="dropdown-item-custom" data-value="Kekeringan hidrologis">Kekeringan hidrologis</div>
                                <div class="dropdown-item-custom" data-value="Kekeringan pertanian">Kekeringan pertanian</div>
                                <div class="dropdown-item-custom" data-value="Kebakaran hutan">Kebakaran hutan</div>
                                <div class="dropdown-item-custom" data-value="Kebakaran lahan">Kebakaran lahan</div>
                                <div class="dropdown-item-custom" data-value="Kebakaran lahan gambut">Kebakaran lahan gambut</div>
                                <div class="dropdown-item-custom" data-value="Gempa tektonik">Gempa tektonik</div>
                                <div class="dropdown-item-custom" data-value="Gempa vulkanik">Gempa vulkanik</div>
                                <div class="dropdown-item-custom" data-value="Gempabumi runtuhan">Gempabumi runtuhan</div>
                                <div class="dropdown-item-custom" data-value="Tsunami seismogenik">Tsunami seismogenik</div>
                                <div class="dropdown-item-custom" data-value="Tsunami nonseismik">Tsunami nonseismik</div>
                                <div class="dropdown-item-custom" data-value="Tsunami lokal">Tsunami lokal</div>
                                <div class="dropdown-item-custom" data-value="Tsunami regional">Tsunami regional</div>
                                <div class="dropdown-item-custom" data-value="Tsunami jarak">Tsunami jarak</div>
                                <div class="dropdown-item-custom" data-value="Tsunami meteorologi">Tsunami meteorologi</div>
                                <div class="dropdown-item-custom" data-value="Mikrotsunami">Mikrotsunami</div>
                                <div class="dropdown-item-custom" data-value="Awan panas guguran-aliran piroklastik guguran">Awan panas guguran-aliran piroklastik guguran</div>
                                <div class="dropdown-item-custom" data-value="Awan panas-aliran piroklastik">Awan panas-aliran piroklastik</div>
                                <div class="dropdown-item-custom" data-value="Banjir lahar">Banjir lahar</div>
                                <div class="dropdown-item-custom" data-value="Hujan abu vulkanik">Hujan abu vulkanik</div>
                                <div class="dropdown-item-custom" data-value="Gas vulkanik beracun">Gas vulkanik beracun</div>
                                <div class="dropdown-item-custom" data-value="Wabah penyakit">Wabah penyakit</div>
                                <div class="dropdown-item-custom" data-value="Epidemi">Epidemi</div>
                                <div class="dropdown-item-custom" data-value="Kebakaran gedung dan pemukiman">Kebakaran gedung dan pemukiman</div>
                                <div class="dropdown-item-custom" data-value="Kegagalan industri">Kegagalan industri</div>
                                <div class="dropdown-item-custom" data-value="Kecelakaan industri">Kecelakaan industri</div>
                                <div class="dropdown-item-custom" data-value="Konflik Sosial">Konflik Sosial</div>
                                <div class="dropdown-item-custom" data-value="Teror">Teror</div>
                                <div class="dropdown-item-custom" data-value="Kerusuhan Sosial">Kerusuhan Sosial</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jenis Kejadian - Multi-select -->
                <div class="mb-3">
                    <label for="jenis" class="fw-semibold">2. Jenis Kejadian</label>
                    <div class="multi-select-container">
                        <div class="selected-pills" id="jenis-pills">
                            <input type="text" class="search-input" placeholder="Pilih jenis..." id="jenis-search">
                        </div>
                        <div class="dropdown-container">
                            <div class="custom-dropdown" id="jenis-dropdown">
                                <div class="dropdown-item-custom" data-value="Bencana Alam">Bencana Alam</div>
                                <div class="dropdown-item-custom" data-value="Bencana NonAlam">Bencana NonAlam</div>
                                <div class="dropdown-item-custom" data-value="Bencana Sosial">Bencana Sosial</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Regular fields -->
                <div class="mb-3">
                    <label for="tanggal" class="fw-semibold">3. Tanggal Kejadian</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="mb-3">
                    <label for="waktu" class="fw-semibold">4. Waktu Kejadian</label>
                    <input type="time" class="form-control" name="waktu" required>
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="fw-semibold">5. Lokasi</label><br>
                    <label>Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control mb-2" required>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    </select>
                    
                    <label>Kabupaten/Kota</label>
                    <select name="kabkota" id="kabkota" class="form-control mb-2" required>
                        <option value="Kota Kupang">Kota Kupang</option>
                    </select>
                    
                    <label>Kecamatan</label>
                    <div class="multi-select-container">
                        <div class="selected-pills" id="kecamatan-pills">
                            <input type="text" class="search-input" placeholder="Pilih kecamatan..." id="kecamatan-search">
                        </div>
                        <div class="dropdown-container">
                            <div class="custom-dropdown" id="kecamatan-dropdown">
                                <div class="dropdown-item-custom" data-value="Alak">Kecamatan Alak</div>
                                <div class="dropdown-item-custom" data-value="Kota Raja">Kecamatan Kota Raja</div>
                                <div class="dropdown-item-custom" data-value="Kota Lama">Kecamatan Kota Lama</div>
                                <div class="dropdown-item-custom" data-value="Oebobo">Kecamatan Oebobo</div>
                                <div class="dropdown-item-custom" data-value="Kelapa Lima">Kecamatan Kelapa Lima</div>
                                <div class="dropdown-item-custom" data-value="Maulafa">Kecamatan Maulafa</div>
                            </div>
                        </div>
                    </div>
                    
                    <label class="mt-2">Kelurahan</label>
                    <div class="multi-select-container">
                        <div class="selected-pills" id="kelurahan-pills">
                            <input type="text" class="search-input" placeholder="Pilih kelurahan..." id="kelurahan-search">
                        </div>
                        <div class="dropdown-container">
                            <div class="custom-dropdown" id="kelurahan-dropdown">
                                <div class="dropdown-item-custom" data-value="Alak">Alak</div>
                                <div class="dropdown-item-custom" data-value="Batuplat">Batuplat</div>
                                <div class="dropdown-item-custom" data-value="Fatufeto">Fatufeto</div>
                                <div class="dropdown-item-custom" data-value="Mantasi">Mantasi</div>
                                <div class="dropdown-item-custom" data-value="Manulai II">Manulai II</div>
                                <div class="dropdown-item-custom" data-value="Manutapen">Manutapen</div>
                                <div class="dropdown-item-custom" data-value="Naioni">Naioni</div>
                                <div class="dropdown-item-custom" data-value="Namosain">Namosain</div>
                                <div class="dropdown-item-custom" data-value="Nunbaun Delha">Nunbaun Delha</div>
                                <div class="dropdown-item-custom" data-value="Nunbaun Sabu">Nunbaun Sabu</div>
                                <div class="dropdown-item-custom" data-value="Nunhila">Nunhila</div>
                                <div class="dropdown-item-custom" data-value="Penkase Oeleta">Penkase Oeleta</div>
                                <div class="dropdown-item-custom" data-value="Kelapa Lima">Kelapa Lima</div>
                                <div class="dropdown-item-custom" data-value="Lasiana">Lasiana</div>
                                <div class="dropdown-item-custom" data-value="Oesapa">Oesapa</div>
                                <div class="dropdown-item-custom" data-value="Oesapa Barat">Oesapa Barat</div>
                                <div class="dropdown-item-custom" data-value="Oesapa Selatan">Oesapa Selatan</div>
                                <div class="dropdown-item-custom" data-value="Airnona">Airnona</div>
                                <div class="dropdown-item-custom" data-value="Bakunase">Bakunase</div>
                                <div class="dropdown-item-custom" data-value="Bakunase II">Bakunase II</div>
                                <div class="dropdown-item-custom" data-value="Fontein">Fontein</div>
                                <div class="dropdown-item-custom" data-value="Kuanino">Kuanino</div>
                                <div class="dropdown-item-custom" data-value="Naikoten I">Naikoten I</div>
                                <div class="dropdown-item-custom" data-value="Naikoten II">Naikoten II</div>
                                <div class="dropdown-item-custom" data-value="Nunleu">Nunleu</div>
                                <div class="dropdown-item-custom" data-value="Air Mata">Air Mata</div>
                                <div class="dropdown-item-custom" data-value="Bonipoi">Bonipoi</div>
                                <div class="dropdown-item-custom" data-value="Fatubesi">Fatubesi</div>
                                <div class="dropdown-item-custom" data-value="Lai-lai Bisi Kopan">Lai-lai Bisi Kopan</div>
                                <div class="dropdown-item-custom" data-value="Merdeka">Merdeka</div>
                                <div class="dropdown-item-custom" data-value="Nefonaek">Nefonaek</div>
                                <div class="dropdown-item-custom" data-value="Oeba">Oeba</div>
                                <div class="dropdown-item-custom" data-value="Pasir Panjang">Pasir Panjang</div>
                                <div class="dropdown-item-custom" data-value="Solor">Solor</div>
                                <div class="dropdown-item-custom" data-value="Tode Kisar">Tode Kisar</div>
                                <div class="dropdown-item-custom" data-value="Belo">Belo</div>
                                <div class="dropdown-item-custom" data-value="Fatukoa">Fatukoa</div>
                                <div class="dropdown-item-custom" data-value="Kolhua">Kolhua</div>
                                <div class="dropdown-item-custom" data-value="Maulafa">Maulafa</div>
                                <div class="dropdown-item-custom" data-value="Naikolan">Naikolan</div>
                                <div class="dropdown-item-custom" data-value="Naimata">Naimata</div>
                                <div class="dropdown-item-custom" data-value="Oepura">Oepura</div>
                                <div class="dropdown-item-custom" data-value="Penfui">Penfui</div>
                                <div class="dropdown-item-custom" data-value="Sikumana">Sikumana</div>
                                <div class="dropdown-item-custom" data-value="Fatululi">Fatululi</div>
                                <div class="dropdown-item-custom" data-value="Kayu Putih">Kayu Putih</div>
                                <div class="dropdown-item-custom" data-value="Liliba">Liliba</div>
                                <div class="dropdown-item-custom" data-value="Oebobo">Oebobo</div>
                                <div class="dropdown-item-custom" data-value="Oebufu">Oebufu</div>
                                <div class="dropdown-item-custom" data-value="Oetete">Oetete</div>
                                <div class="dropdown-item-custom" data-value="Tuak Daun Merah">Tuak Daun Merah</div>
                            </div>
                        </div>
                    </div>
                    
                    <label class="mt-2">Letak Geografis</label>
                    <input type="text" class="form-control" name="geografis" required>
                </div>

                <div class="mb-3">
                    <label for="sebab" class="fw-semibold">6. Sebab Kejadian</label>
                    <textarea name="sebab" class="form-control" id="sebab" cols="30" rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label for="kronologis" class="fw-semibold">7. Kronologis Kejadian</label>
                    <textarea name="kronologis" class="form-control" id="kronologis" cols="30" rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="fw-semibold">8. Deskripsi Kejadian</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                </div>

                <!-- Hidden inputs to store selected values -->
                <input type="hidden" name="nama_selected" id="nama-hidden">
                <input type="hidden" name="jenis_selected" id="jenis-hidden">
                <input type="hidden" name="kecamatan_selected" id="kecamatan-hidden">
                <input type="hidden" name="kelurahan_selected" id="kelurahan-hidden">

                <div class="mb-3">
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        class MultiSelect {
            constructor(containerId, hiddenInputId) {
                this.container = document.getElementById(containerId + '-pills');
                this.dropdown = document.getElementById(containerId + '-dropdown');
                this.searchInput = document.getElementById(containerId + '-search');
                this.hiddenInput = document.getElementById(hiddenInputId);
                this.selectedValues = new Set();
                this.originalOptions = Array.from(this.dropdown.querySelectorAll('.dropdown-item-custom'));
                
                this.init();
            }
            
            init() {
                // Search input events
                this.searchInput.addEventListener('focus', () => {
                    this.showDropdown();
                });
                
                this.searchInput.addEventListener('input', (e) => {
                    this.filterOptions(e.target.value);
                });
                
                // Dropdown item clicks
                this.dropdown.addEventListener('click', (e) => {
                    if (e.target.classList.contains('dropdown-item-custom')) {
                        const value = e.target.getAttribute('data-value');
                        this.addValue(value);
                        this.searchInput.value = '';
                        this.filterOptions('');
                        this.searchInput.focus();
                    }
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', (e) => {
                    if (!this.container.parentElement.contains(e.target)) {
                        this.hideDropdown();
                    }
                });
            }
            
            showDropdown() {
                this.dropdown.style.display = 'block';
                this.updateDropdownOptions();
            }
            
            hideDropdown() {
                this.dropdown.style.display = 'none';
            }
            
            filterOptions(searchTerm) {
                const items = this.dropdown.querySelectorAll('.dropdown-item-custom');
                items.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    const matches = text.includes(searchTerm.toLowerCase());
                    item.style.display = matches ? 'block' : 'none';
                });
            }
            
            addValue(value) {
                if (this.selectedValues.has(value)) return;
                
                this.selectedValues.add(value);
                this.createPill(value);
                this.updateHiddenInput();
                this.updateDropdownOptions();
            }
            
            removeValue(value) {
                this.selectedValues.delete(value);
                this.updateHiddenInput();
                this.updateDropdownOptions();
            }
            
            createPill(value) {
                const pill = document.createElement('div');
                pill.className = 'pill';
                pill.innerHTML = `
                    ${value}
                    <button type="button" class="pill-remove" onclick="multiSelects.get('${this.container.id.replace('-pills', '')}').removePill('${value}', this.parentElement)">×</button>
                `;
                
                // Insert before search input
                this.container.insertBefore(pill, this.searchInput);
            }
            
            removePill(value, pillElement) {
                pillElement.remove();
                this.removeValue(value);
            }
            
            updateHiddenInput() {
                if (this.hiddenInput) {
                    this.hiddenInput.value = Array.from(this.selectedValues).join(',');
                }
            }
            
            updateDropdownOptions() {
                const items = this.dropdown.querySelectorAll('.dropdown-item-custom');
                items.forEach(item => {
                    const value = item.getAttribute('data-value');
                    if (this.selectedValues.has(value)) {
                        item.classList.add('selected');
                        item.style.display = 'none';
                    } else {
                        item.classList.remove('selected');
                        item.style.display = 'block';
                    }
                });
            }
        }
        
        // Initialize multi-select instances
        const multiSelects = new Map();
        
        document.addEventListener('DOMContentLoaded', function() {
            multiSelects.set('nama', new MultiSelect('nama', 'nama-hidden'));
            multiSelects.set('jenis', new MultiSelect('jenis', 'jenis-hidden'));
            multiSelects.set('kecamatan', new MultiSelect('kecamatan', 'kecamatan-hidden'));
            multiSelects.set('kelurahan', new MultiSelect('kelurahan', 'kelurahan-hidden'));
        });
        
        // Form submission handler
        document.getElementById('disasterForm').addEventListener('submit', function(e) {
            // Validate that at least one option is selected for required fields
            const namaSelected = document.getElementById('nama-hidden').value;
            const jenisSelected = document.getElementById('jenis-hidden').value;
            
            if (!namaSelected) {
                e.preventDefault();
                alert('Silakan pilih minimal satu Nama Kejadian');
                return false;
            }
            
            if (!jenisSelected) {
                e.preventDefault();
                alert('Silakan pilih minimal satu Jenis Kejadian');
                return false;
            }
            
            console.log('Selected values:', {
                nama: namaSelected,
                jenis: jenisSelected,
                kecamatan: document.getElementById('kecamatan-hidden').value,
                kelurahan: document.getElementById('kelurahan-hidden').value
            });
        });
    </script>
</body>
</html>