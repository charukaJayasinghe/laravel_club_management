<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('csrf')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>NC Science Society</title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}">
</head>
<style>
    @import url("https://fonts.googleapis.com/css?family=Titillium+Web");
@import url('https://fonts.googleapis.com/css?family=Lato:400,500,600,700&display=swap');
* {
    font-family: "Titillium Web", sans-serif;
}

body {
    height: 2000px;
}

.navbar .navbar-brand {
    font-size: 30px;
}

.navbar .nav-item {
    padding: 10px 20px;
}

.navbar .nav-link {
    font-size: 20px;
    margin-left: 10px;
}

.fa-bars {
    color: #010101;
    font-size: 30px;
}

.back {
    background-image: url("{{ asset('images/image.svg') }}");
    background-repeat: no-repeat;
    height: 600px;
    background-position: center;
    background-size: contain;
}

.log {
    background-repeat: no-repeat;
    background-size: contain;
    height: 200px;
    background-position: center;
    background-image: url("{{ asset('images/logo.jpeg') }}");
}

.infield {
    position: relative;
    height: 90px;
    width: 100%;
}

.infield input {
    position: absolute;
    background-color: transparent;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid;
    box-shadow: none;
    font-size: 20px;
    color: rgb(255, 255, 255);
}

.infield input:focus {
    outline: none;
    color: yellow;
}

.infield label {
    position: absolute;
    color: rgb(255, 255, 255);
    font-size: 20px;
    pointer-events: none;
    display: block;
    transition: 0.5s;
}

.infield input:focus+label,
.infield input:valid+label {
    transform: translateY(-35px);
    font-size: 18px;
    padding: 2px 6px;
    color: white;
    background-color: #ff006a;
}

.option {
    background: #fff;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin: 0 10px;
    border-radius: 5px;
    cursor: pointer;
    padding: 0 10px;
    border: 2px solid lightgrey;
    transition: all 0.3s ease;
}

.option .dot {
    height: 20px;
    width: 20px;
    background: #d9d9d9;
    border-radius: 50%;
    position: relative;
}


.loginBtn:focus{
   outline: none;
}


.gradeSelector{
    color: white;
}

.gradeSelector:focus{
  color: yellow;
  outline: none;
}

.gradeSelector option{
    color: #010101;
  text-align: ce;
}

</style>

@yield('content')

</html>
