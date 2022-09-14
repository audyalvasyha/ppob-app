<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar sekarang! | Cobainaja</title>
    <link rel="stylesheet" href="css/viewshop.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        input.input-form {
            border: 1px solid #dae2ed;
            border-radius: 5px;
            width: 100%;
            padding: 12px;
            outline: none;
            font-size: .9rem;
        }

        input.input-form::-webkit-input-placeholder {
            color: #8B8D91;
        }

        label {
            font-size: .9rem;
            font-weight: 400;
            /* 13/16 */
            position: absolute;
            /* z-index: -1; */
            top: -5px;
            left: 10px;
            background-color: #fff;
            line-height: 10px;
            color: #8B8D91;
            opacity: 1;
            -webkit-transition: .04s ease-in-out, .04s ease-in-out opacity;
            transition: .04s ease-in-out;
        }

        .daftar {
            text-align: center;
            line-height: 45px !important;
            width: 100%;
            height: 45px;
            background-color: #17b722;
            color: #fff;
            border: none;
            outline: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .js-hide-label label{
            opacity: 0;
            top: 5px;
        }

        .dir {
            text-align: center;
            position: absolute;
            top: -10px;
            padding: 0 10px;
            background-color: #fff;
            font-size: .9rem;
        }

        .dir-l {
            display: flex;
            justify-content: center;
            position: relative;
            border-top: 1px solid #dae2ed;
            margin: 1rem;
        }

        .other {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 50px;
            width: 130px;
            background-color: #fff;
            margin: 0 auto;
        }
    </style>
</head>

<body>
     <div style=" display: none;position: fixed;left: 0;top: 0;width: 100%;height: 100vh;background-color: #9c9c9c8f;z-index: 999;">
         <div style="width: 90%;background-color: #fff;border-radius: 10px;display: flex;flex-direction: rows;align-items: center;justify-content: left;padding: 1.25rem 1rem;margin: 60% auto auto;">
                <div style="margin-left: 1rem;">
                    <h2 style="line-height: 1.5rem;">Selamat Pendaftaran Anda berhasil!<br><span style="font-weight: 400;font-size: .9rem;">silahkan cek email anda untuk aktifasi.</span></h2>
                    <div style="margin: 1rem 0 0;display:flex">
                        <button class="item-durasi" style="border: 1px solid #03ac0e;color: #03ac0e;" onclick="location.href='login.php'">Login</button>
                        <button class="item-durasi" id="cel-note">Cancel</button>
                    </div>
                </div>
            </div>
     </div>
    <div class="wrapper" style="height:100vh">
        <div class="header-top" style="z-index: 111;">
            <a href="login.php" class="far fa-arrow-left"></a>
            <h3>Daftar</h3>
            <div class="label-tag">
                <span style="color: #03ac0e;">Masuk</span>
            </div>
        </div>
        <div class="container" style="padding: 70px 0;height: 100vh">
            <h1 style="text-align: center;line-height: 1rem;margin: 1.5rem 0;">Ratelshop <br><span style="font-size: .8rem;font-weight: 400;">Welcome please Sign up!</span></h1>
            <?php
            include "config/database.php";
            if (isset($_POST['daftar'])) {
                // Ambil data dari form
                $Username = $_POST['Username'];
                $Email = $_POST['Email'];
                $Password = $_POST['Password'];
                // Buat Token
                $token = hash('sha256', md5(date('Y-m-d h:i:s')));
                // Cek user terdaftar
                $sql_cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$Email'");
                $r_cek = mysqli_num_rows($sql_cek);
                if ($r_cek > 0) {
                    echo '<script>alert("Email Anda sudah terdaftar!")</script>';
                } else {
                    // Jika data kosong maka insert ke tabel
                    // aktif = 0 user belum aktif
                    $insert = mysqli_query($conn, "INSERT INTO users(username, email, password, token, aktif) VALUES('" . $Username . "', '" . $Email . "', '" . $Password . "', '" . $token . "', '0')");
                    // include kirim email
                    include "mail.php";
                }
            }
            ?>
            <div id='tmpung'></div>
            <form action="" method="POST" style="margin: 1rem;">
                <div class="item-form" style="position: relative;margin: 0 0 1.25rem 0;display: flex;flex-direction: columns;">
                    <div style="margin: 0 auto 0 0;width: 100%">
                        <label for="userName">Username</label>
                        <input type="text" id="userName" class="input-form" placeholder="Username" name="Username">
                    </div>
                </div>
                <div class="item-form" style="position: relative;margin: 0 0 1.25rem 0">
                    <div>
                        <label for="emailHp">Email</label>
                        <input type="email" id="emailHp" class="input-form" placeholder="Email" name="Email">
                    </div>
                </div>
                <div class="item-form" style="position: relative;margin: 0 0 1.25rem 0">
                    <div style="margin: 0 auto 0 0;">
                        <label for="passWord">Password</label>
                        <input type="password" id="passWord" class="input-form" placeholder="Password" name="Password">
                    </div>
                </div>

                <div class="label-tag" style="padding: 8px 0;">
                    <span></span>
                    <span style="margin: 10px 0;">Lupa kata sandi?</span>
                </div>
                <button type="button" class="daftar" id="daf" style="background: #dbdbdb !important;">Daftar</button>
            </form>
            <div class="dir-l" style="border: none;">
                <span class="dir">Sudah punya akun Ratelshop? <a href="login.php" style="color: #03ac0e;">Masuk</a></span>
            </div>
            <div class="dir-l" style="margin: 1.5rem 0;">
                <span class="dir" style="color: #969696;">atau daftar dengan</span>
            </div>
            <div class="other">
                <img src="https://e7.pngegg.com/pngimages/337/722/png-clipart-google-search-google-account-google-s-google-play-google-company-text.png" alt="" width="50px" height="50px" style="border-radius: 50%;">
                <img src="https://cdn.icon-icons.com/icons2/1826/PNG/512/4202107facebookfblogosocialsocialmedia-115710_115591.png" alt="" width="35px" height="35px" style="border-radius: 50%;">
            </div>
            <div class="dir-l" style="margin: 1.5rem 1rem;">
                <span class="dir" style="font-size: .8rem;color: #969696;">
                    Dengan mendaftar, saya menyetujui
                    <span style="color: #34fd42;">Syarat dan Ketentuan</span> serta <span style="color: #34fd42;">Kebijakan Privasi.</span></span>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Validasi Form Registrasi
                var btnSubmit = $("#daf");
                var usrName = $("#userName");
                var inForm = $(".input-form");
                btnSubmit.click(function() {
                    if(usrName.val() == '') {
                       inForm.css('border', '1px solid #fd1c1c');
                    } else {
                        // Function Check Form
                        $('#passWord.input-form').on('keyup', function() {
                            $('#daf').removeAttr('style').attr('name', 'daftar');
                        });
                    }
                });
                $('#passWord.input-form').on('keyup', function() {
                     var input = $(this).val();
                     $('#daf').removeAttr('style').attr('name', 'daftar').attr('type', 'submit');
                });
                $('#userName.input-form').on('keyup', function() {
                    inForm.css('border', '1px solid #dae2ed');
                    $('#alrt').remove();
                });
                
                $('#notif').click(function() {
                    window.location.href = "login.php";
                });
                // Notifikasi Saldo
                $('#cel-note').click(function() {
                    $('#notes').css('display', 'none');
                });
                
                
                
                $.support.placeholder = (function() {
                    var i = document.createElement('input');
                    return 'placeholder' in i;
                });
                if ($.support.placeholder) {
                    
                    $('form .item-form div').each(function() {
                        $(this).addClass('js-hide-label');
                    });
                    
                    $('form .item-form div').find('input').on('keyup blur focus', function(e) {
                        var $this = $(this),
                            $parent = $this.parent();

                        if (e.type == 'keyup') {
                            if ($this.val() == '') {
                                $parent.addClass('js-hide-label');
                            } else {
                                $parent.removeClass('js-hide-label');
                            }
                        } else if (e.type == 'blur') {

                        } else if (e.type == 'focus') {

                        }
                    });
                }
            })
        </script>
</body>

</html>