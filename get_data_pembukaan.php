<?php  
	include('koneksi.php');
 
	$query = mysqli_query($conn, "SELECT absen_pembukaan.*, mwcnus.name_mwc, prnus.name_prnu FROM absen_pembukaan
                            LEFT JOIN mwcnus ON absen_pembukaan.mwcnu_id = mwcnus.id
                            LEFT JOIN prnus ON absen_pembukaan.prnu_id = prnus.id
                            WHERE absen = 1 ORDER BY id DESC LIMIT 5");
 
	if(mysqli_num_rows($query) > 0){
		while($row = mysqli_fetch_array($query)){
			echo '<tr>';
			echo '<td scope="col" width="5%">
					<div class="d-flex align-items-center">
						<div class="avatar avatar-md">
							<img src="' . $row['photo'] . '">
						</div>
					</div>
				</td>';
			echo '<td scope="col" width="25%">' . $row['name'] . '</td>';
			echo '<td scope="col" width="15%">' . $row['jabatan'] . '</td>';
			echo '<td scope="col" width="20%">' . $row['name_mwc'] . '</td>';
			echo '<td scope="col" width="15%">' . $row['name_prnu'] . '</td>';
			echo '</tr>';
		}
	}
?>