<?php 

include_once 'config/config.php';

class Auth extends Config {
    private $dbase, $error;
    
    public function __construct()
    {
        // Mengambil properti dbase dari file Config
        $Connection = new Config('gtask_apps');
        $this->dbase = $Connection->dbased();
        session_start();
    }

    public function auth_register($email, $username, $password) 
    {
      try {
        // Create Password Hash
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user to Database
        // select a particular user by id
        $stmt = $this->dbase->prepare("INSERT INTO `users`(`id_user`, `username`, `email`, `password`) VALUES ('', :username, :email, :password)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hash_password);
        $stmt->execute();

        // Output hanya di tampilakan di sisi server
        // echo "Regisrasi Berhasil";
        return true;

      } catch (PDOException $e) {
        // if Error
        if($e->errorInfo[0] == 23000) {
            // errorInfo[0] berisi informasi error tentang query sql yang baru di jalankan
            // 23000 = kode error ketika data yang sama pada kolom yang di set unique
            $this->error = "Email sudah Terdaftar!"; // kedepanya ubah output error dengan kode status

            return false;
        } else {
            echo $e->getMessage();     // Temporary
            
            return false;
        }
      }
    }

    public function auth_login($email, $password)
    {
      try {
        // Ambil baris data dari database berdasarkan email
        $stmt = $this->dbase->prepare('SELECT * FROM `users` WHERE email = :email');
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $data = $stmt->fetch();
        // cek jika jumlah baris lebih dari 0
        if ($stmt->rowCount() > 0) {
          // Jika Password yang di masukkan sesuai dengan data user
          if (password_verify($password, $data['password'])) {
            // Buat session dengan key 'user_session'
            $_SESSION['user_session'] = $data['id_user'];

            // Kembalikan nilai true jika password yang diinputkan user sesuai
            return true;
          } else {
            $this->error = "Email atau Password Salah!"; // Temporary

            // Kembalikan nilai false jika password tidak sesuai
            return false;
          }
        } else {

          // print Output jika data tidak cocok dengan email yang dimasukkan
          $this->error = "Email Anda belum terdaftar";
          return false;

        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function isLoggedIn()
    {
      // Menghasilkan nilai true jika user sudah login, dengan mengambil data dari session
      if (isset($_SESSION['user_session'])) {
        return true;
      }
    }

    // Pastikan  method ini dipanggil setelah session di jalankan
    public function getUserData() 
    {
      // cek apakah user sudah login
      if (!$this->isLoggedIn()) {
        return false;
      }

      try {
        
        $stmt = $this->dbase->prepare('SELECT * FROM `users` WHERE id_user = :id');
        $stmt->bindParam(':id', $_SESSION['user_session']);
        $stmt->execute();

        return $stmt->fetch();

      } catch (PDOException $e) {
        echo $e->getMessage();

        return false;
      }

    }

    public function logoutUser()
    {
      
      // Hapus Session
      session_destroy();
      // Hapus user_session
      unset($_SESSION['user_session']);

      return true;

    }

    public function getLastError()
    { 
      echo $this->error;
    }

}
