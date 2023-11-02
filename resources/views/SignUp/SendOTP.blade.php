<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title></title>
</head>
<body>
    <div class='bg-[green] h-screen flex '>
        <img src="/jc-backend/images/jcslogo.png" alt="">
        <h1 class='text-xl'>{{ $content['subject'] }}</h1>
        <p>{{ $content['body'] }}</p>
    </div>
</body>
</html>