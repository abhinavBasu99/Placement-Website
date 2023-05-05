<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('mycss')
    @stack('mycss2')
    @stack('mytitle')
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <ul>
                <li><a href="/" class="navigations">Home</a></li>
                <li><a href="/studentlogin" class="navigations">Student<br>Login/Register</a></li>
                <li><a href="/adminlogin" class="navigations">Admin<br>Login</a></li>
                @stack('extraheaderlink1')
                @stack('extraheaderlink2')
                @stack('extraheaderlink3')
            </ul>
        </nav>
    </header>
