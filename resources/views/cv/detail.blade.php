<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV ứng viên</title>
    <style>
        .container{padding: 30px;}
    </style>
</head>
<body>
    <div class="container">
        <embed src="{{URL::asset('upload/cv/'.$cv->job->ma_job.'/'.$cv->ten_cv)}}" type="application/pdf" width="100%" height="600px" />
    </div>
    
</body>
</html>