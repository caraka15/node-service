<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  
  // Simpan email ke file Excel
  $file = 'subscribers.xlsx'; // Ganti dengan nama file yang diinginkan
  $data = array($email, date("Y-m-d H:i:s")); // Data yang akan disimpan
  $row = implode("\t", $data) . "\n"; // Format baris data

  // Menambahkan baris ke file Excel
  if (file_exists($file)) {
    $fp = fopen($file, 'a');
    fwrite($fp, $row);
    fclose($fp);
  } else {
    $fp = fopen($file, 'w');
    fwrite($fp, "Email\tDate\n"); // Header kolom
    fwrite($fp, $row);
    fclose($fp);
  }

}
?>