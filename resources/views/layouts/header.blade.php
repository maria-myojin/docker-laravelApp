<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel BBS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header class="navbar navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index')}}">TODO App</a>
            <a href="{{ route('create_page')}}" class="btn btn-success" name="create">新規作成</a>
        </div>
    </header>

    <div>
        @yield('content')
    </div>
</body>

</html>
