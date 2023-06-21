<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> SORAT - @yield('title') </title>

    @hasSection('login_assets')
        @yield('login_assets')
    @endif 
    
    @hasSection('admin_assets')
        @yield('admin_assets')
    @endif     
    

    @hasSection('link_only_page')
        @yield('link_only_page')
    @endif 

</head>
    @yield('content')
</body>

</html>
