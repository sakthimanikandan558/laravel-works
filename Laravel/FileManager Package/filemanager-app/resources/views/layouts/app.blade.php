<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @filemanagerStyles
</head>
<body>
    {{ $slot }}
    @filemanagerScripts
</body>

</html>
