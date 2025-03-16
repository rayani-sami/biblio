<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>contact form</title>
</head>

<body>

<tr><td>Dear {{$name}}</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>veuillez cliquer sur fr ci-dessous pour confirmer votre compte : {{$name}}</td></tr>
<tr><td><a href="{{url('enseignant/confirm/'.$code)}}">{{url('enseignant/confirm/'.$code)}}  </a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Merci</td></tr>
</body>
