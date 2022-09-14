<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            top: -10px;
            left: 10px;
            background-color: #fff;
            color: #8B8D91;
            opacity: 1;
            -webkit-transition: .04s ease-in-out, .04s ease-in-out opacity;
            transition: .04s ease-in-out;
        }

        .daftar {
            width: 100%;
            height: 45px;
            background-color: #17b722;
            color: #fff;
            border: none;
            outline: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .js-hide-label label {

            opacity: 0;
            top: 10px;
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
    <div class="wrapper" style="height: 100vh;">
        <div class="header-top" style="z-index: 111;">
            <a href="index.php" class="far fa-arrow-left"></a>
            <h3>Masuk</h3>
            <div class="label-tag">
                <span style="color: #03ac0e;">Daftar</span>
            </div>
        </div>
        <div class="container" style="padding: 70px 0;height: 100%">
            <h1 style="text-align: center;line-height: 1rem;margin: 1.5rem 0;">Ratelku <br><span style="font-size: .8rem;font-weight: 400;">Welcome please Sign in!</span></h1>
            <?php
            session_start();
            // Jika sudah login maka akan dialihkan ke home
            if (!empty($_SESSION['login'])) {
                header("Location:skeleton.html");
            }
            include "config/database.php";
            if (isset($_POST['login'])) {
                $EmailHp = $_POST['Email'];
                $Password = $_POST['Password'];
                // Cek user terdaftar dan aktif
                $sql_cek = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $EmailHp . "' AND password='" . $Password . "' AND aktif='1'") or die(mysqli_error($conn));
                $r_cek = mysqli_fetch_array($sql_cek);
                $jmlh_data = mysqli_num_rows($sql_cek);
                if ($jmlh_data > 0) {
                    $_SESSION['login'] = md5($r_cek['email']);
                    $_SESSION['email'] = $r_cek['email'];
                    $_SESSION['nama'] = $r_cek['nama'];
                    header("Location:skeleton.html");
                } else {
                    echo "Username dan Password anda salah!";
                }
            }

            ?>
            <form action="" method="POST" style="margin: 1rem;">

                <div class="item-form" style="position: relative;margin: 0 0 1.25rem 0">
                    <div>
                        <label for="emailHp">Nomor HP atau Email</label>
                        <input type="email" id="emailHp" class="input-form" placeholder="Nomor HP atau Email" name="Email">
                    </div>
                </div>
                <div class="item-form" style="position: relative;margin: 0 0 1.25rem 0">
                    <div>
                        <label for="passWord">Password</label>
                        <input type="password" id="passWord" class="input-form" placeholder="Password" name="Password">
                    </div>
                </div>

                <div class="label-tag" style="padding: 8px 0;">
                    <span></span>
                    <span style="margin: 10px 0;">Lupa kata sandi?</span>
                </div>
                <button class="daftar" id="daf" name="login" type="submit">Masuk</button>
            </form>
            <div class="dir-l" style="border: none;">
                <span class="dir">Belum punya akun Ratelshop? <a href="index.php" style="color: #03ac0e;">Daftar</a></span>
            </div>
            <div class="dir-l" style="margin: 1.5rem 0;">
                <span class="dir" style="color: #969696;">atau masuk dengan</span>
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