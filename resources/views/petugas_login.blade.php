<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>PengaduanMasyarakat.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
    </style>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            .login-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 300px;
            }

            .login-container h2 {
                text-align: center;
                color: #333;
            }

            .login-form input {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .login-form button {
                width: 100%;
                padding: 10px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            @media (max-width: 428px) {

                /* Adjust styles for smaller screens */
                .login-container {
                    width: 90%;
                }
            }
        </style>
        <title>Login Form</title>
    </head>

    <body>
        <div class="login-container">
            <h2>Login  Petugas</h2>
            <form class="login-form" action="{{url('/petugas_login')}}" method="post" style="margin-top: 1rem;">
                @method('post')
                @csrf
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Login</button>
                <h6 style="margin-top: 1rem;">Belum Punya Akun? <a href="{{'petugas_register'}}">Daftar Disini</a></h6>
            </form>
        </div>
    </body>

    </html>