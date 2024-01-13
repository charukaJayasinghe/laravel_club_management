<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="">

    <div class="container bg-light my-auto vh-100  d-flex justify-content-center flex-column align-items-center gap-3">
        <span id="text"></span>
         <input type="text" id="email" placeholder="email" class="form-control">
         <input type="text" id="name" placeholder="name" class="form-control">
         <button class="d-block btn btn-primary w-100" onclick="sendTestEmail();">Send</button>
    </div>
    <script src="{{ asset("js/script.js") }}"></script>
</body>
</html>
