<?php
include("koneksi.php");

// Mendapatkan ID dari URL
$id = $_GET['id'];
// Inisialisasi variabel untuk mengecek apakah update berhasil atau tidak
$cek = false;
// Inisialisasi variabel untuk menyimpan data
$data = [];
// Menjalankan query update
$queryupdate = mysqli_query($conn, "UPDATE absen_pembukaan SET absen = '1' WHERE id = '" . mysqli_real_escape_string($conn, $id) . "'");
// Jika update berhasil, maka menjalankan query untuk menampilkan data
if($queryupdate) {
    $cek = true;
    // Menjalankan query untuk menampilkan data
    $querytampil = mysqli_query($conn, "SELECT absen_pembukaan.*, mwcnus.name_mwc, prnus.name_prnu FROM absen_pembukaan
                              LEFT JOIN mwcnus ON absen_pembukaan.mwcnu_id = mwcnus.id
                              LEFT JOIN prnus ON absen_pembukaan.prnu_id = prnus.id
                              WHERE absen_pembukaan.id = '" . mysqli_real_escape_string($conn, $id) . "'");
    // Menyimpan hasil query ke dalam array
    while($row = mysqli_fetch_assoc($querytampil)){
        $data[] = $row;
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-200">

<?php foreach($data as $d): ?>
    <?php if($d['jabatan'] == 'Rois') { ?>
        <div class="flex justify-center my-10">
            <div class="bg-gradient-to-br from-green-400 to-green-600 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="#">
                    <div id="toast-default" class="flex items-center p-2 text-gray-500 bg-white rounded-lg shadow dark:text-gray-600 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="ml-3 text-sm font-normal">Terimakasih Melakukan Absen</div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="w-full bg-cover relative inline-flex items-center">
                        <img srcset="<?php echo $d['photo']; ?>" class="w-full bg-cover bg-center rounded-lg" alt="image description">
                        <img srcset="logo.png" class="w-12 h-12 bg-white absolute inline-flex items-center justify-center w-full bg-cover bg-center rounded-full border-2 border-white -top-2 -right-2" alt="image description">
                    </div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['jabatan']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['komisi']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_mwc']; ?></div>
                    <?php if($d['name_prnu'] == null) { ?>
                        
                        <?php } else { ?>
                            <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_prnu']; ?></div>
                        <?php } ?>
                </form>
            </div>
        </div>
    <?php } else if($d['jabatan'] == 'Ketua') { ?>
        <div class="flex justify-center my-10">
            <div class="bg-gradient-to-br from-teal-400 to-teal-600 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="#">
                    <div id="toast-default" class="flex items-center p-2 text-gray-500 bg-white rounded-lg shadow dark:text-gray-600 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="ml-3 text-sm font-normal">Terimakasih Melakukan Absen</div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="w-full bg-cover relative inline-flex items-center">
                        <img srcset="<?php echo $d['photo']; ?>" class="w-full bg-cover bg-center rounded-lg" alt="image description">
                        <img srcset="logo.png" class="w-12 h-12 bg-white absolute inline-flex items-center justify-center w-full bg-cover bg-center rounded-full border-2 border-white -top-2 -right-2" alt="image description">
                    </div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['jabatan']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['komisi']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_mwc']; ?></div>
                    <?php if($d['name_prnu'] == null) { ?>
                        
                        <?php } else { ?>
                            <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_prnu']; ?></div>
                        <?php } ?>
                </form>
            </div>
        </div>
        <?php } else if($d['jabatan'] == 'Katib') { ?>
        <div class="flex justify-center my-10">
            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="#">
                    <div id="toast-default" class="flex items-center p-2 text-gray-500 bg-white rounded-lg shadow dark:text-gray-600 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="ml-3 text-sm font-normal">Terimakasih Melakukan Absen</div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="w-full bg-cover relative inline-flex items-center">
                        <img srcset="<?php echo $d['photo']; ?>" class="w-full bg-cover bg-center rounded-lg" alt="image description">
                        <img srcset="logo.png" class="w-12 h-12 bg-white absolute inline-flex items-center justify-center w-full bg-cover bg-center rounded-full border-2 border-white -top-2 -right-2" alt="image description">
                    </div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['jabatan']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['komisi']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_mwc']; ?></div>
                    <?php if($d['name_prnu'] == null) { ?>
                        
                        <?php } else { ?>
                            <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_prnu']; ?></div>
                        <?php } ?>
                </form>
            </div>
        </div>
        <?php } else if($d['jabatan'] == 'Sekretaris') { ?>
        <div class="flex justify-center my-10">
            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="#">
                    <div id="toast-default" class="flex items-center p-2 text-gray-500 bg-white rounded-lg shadow dark:text-gray-600 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="ml-3 text-sm font-normal">Terimakasih Melakukan Absen</div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="w-full bg-cover relative inline-flex items-center">
                        <img srcset="<?php echo $d['photo']; ?>" class="w-full bg-cover bg-center rounded-lg" alt="image description">
                        <img srcset="logo.png" class="w-12 h-12 bg-white absolute inline-flex items-center justify-center w-full bg-cover bg-center rounded-full border-2 border-white -top-2 -right-2" alt="image description">
                    </div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['jabatan']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['komisi']; ?></div>
                    <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_mwc']; ?></div>
                    <?php if($d['name_prnu'] == null) { ?>
                        
                        <?php } else { ?>
                            <div class="w-full text-gray-900 bg-gray-100 font-bold rounded-lg text-lg px-5 py-1 text-center shadow"><?php echo $d['name_prnu']; ?></div>
                        <?php } ?>
                </form>
            </div>
        </div>
    <?php } ?>
<?php endforeach; ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>