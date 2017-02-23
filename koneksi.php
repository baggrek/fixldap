<?php
$ldap_dn = "cn=admin,dc=tata,dc=com";
$ldap_dn2 = "cn=user-group,ou=user,dc=tata,dc=com";
$ldap_pass = "jangkrik";
$dn = "dc=tata,dc=com";

$ldap_con = ldap_connect("10.0.2.15",389);
ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);



$host = "localhost";
$user = "root";
$pass = "jangkrik";
$name = "radius";
 
$koneksi = mysqli_connect($host, $user, $pass, $name) ;

?>
