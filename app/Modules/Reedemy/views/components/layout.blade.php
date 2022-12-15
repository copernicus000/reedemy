<!DOCTYPE html>
<html>
<head>

    <title>index</title>
    <style>

    </style>

</head>
<body>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<div>
    {{ $slot }}
</div>
</body>
</html>
