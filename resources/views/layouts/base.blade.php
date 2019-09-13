<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <style>

        body {
            font-family: 'Raleway';
            margin-top: 25px;
        }

        button {
            margin-right: 6px;
        }

        a {
            margin-right: 3px;
        }

        .table-text div {
            padding-top: 6px;
        }

        .row {
            margin-top: 3px;
            margin-bottom: 3px;
        }


    </style>

    <script>
        $(function () {
            $('#book-name').focus();
        });
    </script>

</head>

<body>
    <div class="container">
        <nav class="navbar ml-auto navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">メンバーリスト</a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navbar" aria-expanded="false" aria-controls="Navbar" area-label="ナビゲーションの切替">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="Navbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/login">管理サイト</a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                ログアウト          
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
</body>
</html>
