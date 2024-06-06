<!DOCTYPE html>
<html>
  <head>
  <style>
    body {
      font-family: Arial;
    }

    .overlay {
      background-color: rgba(0,0,0,0.6);
      position: fixed;
      right: 0;
      left: 0;
      bottom: 0;
      top: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .page-hasil {
      width: 400px;
      border-radius: 10px;
      box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.2);
      padding: 30px;
      background-color: antiquewhite;
    }

    .page-hasil h2 {
      font-size: 24px;
      text-align: center;
      margin-top: 0;
      margin-bottom: 20px;
    }

    .elemen-hasil {
      margin-bottom: 10px;
    }

    .element-hasil strong {
      font-weight: bold;
    }

    .error {
      margin-bottom: 10px;
    }

    .btn-kembali {
      display: block;
      margin-top: 20px;
      padding: 10px;
      background-color: rgb(218, 33, 33);
      color: white;
      text-align: center;
      text-decoration: none;
      border-radius: 10px;
      transition: opacity 0.2s, 
          background-color 0.2s;
    }

    .btn-kembali:hover {
      cursor: pointer;
      background-color: rgb(255, 58, 58);
    }

    .btn-kembali:active {
      opacity: 0.8;
    }

    .tombol-lanjut {
      display: block;
      margin-top: 20px;
      padding: 10px;
      background-color: rgb(41, 155, 255);
      color: white;
      text-align: center;
      text-decoration: none;
      border-radius: 10px;
      transition: opacity 0.2s, 
          background-color 0.2s;
    }

    .tombol-lanjut:hover {
      cursor: pointer;
      background-color: rgb(42, 140, 226);
    }

    .tombol-lanjut:active {
      opacity: 0.8;
    }

    .tidak-sesuai {
      color: red;
      font-weight: bold;
    }

    .data-sesuai {
      color: green;
      font-weight: bold;
    }
      
  </style>
  </head>

  <body background="pictures/GEDUNG-B24-scaled-e1613012398603-600x630.jpg">
  <?php
    // variabel dibuat kosongan dulu
    $email = $nama = $nim = "";
    $emailErr = $namaErr = $nimErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST['email'];
      $nama = $_POST['nama'];
      $nim = $_POST['nim'];

      // validasi 
      if (!validateInput($email)) {
        $emailErr = "*Alamat Email harus diisi!";
      }
      

      if (!validateInput($nama)) {
        $namaErr = "*Nama mahasiswa harus diisi!";
        }
        else if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
          $namaErr = "*Nama mahasiswa hanya boleh menggunakan huruf!";
        }

      if (!validateNIM($nim)) {
          $nimErr = "*NIM harus terdiri dari 12 karakter!";
        }
        
      }

      function validateNIM($nim) {
        return (strlen($nim) == 12);
      }

      function validateInput($input) {
        return !empty($input);
      } 
  ?>
  <div class="overlay">
    <div class="page-hasil">
      <?php if (empty($emailErr) && empty($namaErr) && empty($nimErr)) {
        echo '<h2>Data Anda</h2>';
        echo '<div class="elemen-hasil">Email: <strong>' . 
        $email . '</strong></div>';
        echo '<div class="elemen-hasil">Nama Mahasiswa: <strong>' . 
        $nama . '</strong></div>';
        echo '<div class="elemen-hasil">NIM: <strong>' . 
        $nim . '</strong></div>';
        echo '<div class="elemen-hasil"> <span class="data-sesuai">Data telah terisi!</span> Silahkan klik tombol di bawah ini untuk lanjut ke halaman beranda</div>';
        echo '<a href="Home-WEB.HTML" class="tombol-lanjut">Lanjut ke Beranda</a>';
        } else {
          echo '<span class="error">' . $emailErr . '</span><br><br>';
          echo '<span class="error">' . $namaErr . '</span><br><br>';
          echo '<span class="error">' . $nimErr . '</span><br><br>';
          echo '<div class="elemen-hasil">Data yang Anda masukkan <span class="tidak-sesuai">BELUM SESUAI</span> format. Silahkan klik tombol di bawah untuk mengisi ulang!</div>';
          echo '<a href="index.html" class="btn-kembali">Kembali</a>';
        }
      ?>
    </div>
  </div>
  </body>
</html>