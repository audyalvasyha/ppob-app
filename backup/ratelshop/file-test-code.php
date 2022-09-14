<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-size: 14px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        nav ul li {
            list-style: none;
            float: left;
            padding-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #222;
            background-color: #ccc;
            padding: 4px 5px;
            border-radius: 3px;
        }

        .active {
            background-color: #035AAB;
            color: #fff;

        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navecation">
            <ul id="navi">
                <li><a class="menu active">Home</a></li>
                <li><a class="menu" href="#">Profile</a></li>
                <li><a class="menu" href="#">Services</a></li>
                <li><a class="menu" href="#">Contact Us</a></li>
                <li><a class="menu" href="#">Our Blog</a></li>

                <span id="view"></span>
                <button id='subMit'>SUBMIT</button>
            </ul>
        </nav>
    </div>
    <script>
        $(document).ready(function() {
            $('ul li a').click(function() {
                $('li a').removeClass("active");
                $(this).addClass("active");

                var text = $('.active').text();
                $('span#view').html(text);

                $('#subMit').click(function() {
                    $.ajax({
                        url: 'inject.php',
                        type: 'POST',
                        data: text,
                        success: function(data) {
                            window.location = 'inject.php?to=' + text;
                        },
                        error: function() {
                            alert('Tidak dapat memproses data');
                        }
                    });
                    return false;
                })
            });
        })
    </script>
</body>

</html>