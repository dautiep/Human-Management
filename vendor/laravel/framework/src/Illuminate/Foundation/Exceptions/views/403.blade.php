<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('public/css/403.style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="message">You are not authorized.
    </div>
    <div class="message2">You tried to access a page you did not have prior authorization for.

        <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>Back to login</a>   
    </div>
    
    </div>
    <div class="container">
        <div class="neon">403</div>
        <div class="door-frame">
        <div class="door">
            <div class="rectangle">
        </div>
            <div class="handle">
            </div>
            <div class="window">
            <div class="eye">
            </div>
            <div class="eye eye2">
            </div>
            <div class="leaf">
            </div> 
            </div>
        </div>  
        </div>
    </div>
</body>
</html>
