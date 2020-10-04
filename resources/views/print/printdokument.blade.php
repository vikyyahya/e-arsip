<!DOCTYPE html>
<html>

<head>
    <title>Data Dokument</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <div class="embed-responsive embed-responsive-1by1">
        <iframe class="embed-responsive-item" src="http://localhost:8000/uploads/{{$dokumen}}" frameborder="0" style="width:100%;min-height:740px;"></iframe>
    </div>

</body>

</html>