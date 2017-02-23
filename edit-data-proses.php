<?php
	
	if (isset($_POST['rubah'])) {
		include ("koneksi.php");

		$user_name = $_POST['user_name'];
		$id = $_POST['id'];
		$sandi = $_POST['sandi'];		

	    $modifs = [
		    [
		        "attrib"  => "uid",
		        "modtype" => LDAP_MODIFY_BATCH_REPLACE,
		        "values"  => [$user_name],
		    ],
		    [
		        "attrib"  => "userPassword",
		        "modtype" => LDAP_MODIFY_BATCH_ADD,
		        "values"  => ['{SHA}' . base64_encode(pack('H*',sha1($sandi)))],
		    ],	  	    
		];
	    
	    //$update = mysql_query("UPDATE siswa SET siswa_nis='$nis', siswa_nama='$nama', siswa_kelas='$kelas', siswa_jurusan='$jurusan' WHERE siswa_id='$id'") or die(mysql_error());
	

	    if ($ldap_con) {
		    // bind with appropriate dn to give update access
		    $data = ldap_bind($ldap_con, $ldap_dn, $ldap_pass);
		   
		    $data = ldap_modify_batch($ldap_con, "cn=$id, $ldap_dn2", $modifs);
		    $data = ldap_rename($ldap_con, "cn=$id, $ldap_dn2", "cn=$user_name", NULL, TRUE);
		    $update = mysqli_query($koneksi, "UPDATE bejo set cn='$user_name', UserName='$user_name', Attribute= 'Password', op= '==', Value='$sandi' where cn='$id'");
		    echo "<script>alert('BERHASIL ....');</script>";
		    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}else{
			echo "<script>window.history.back()</script>";
		}
	}	
	
?>