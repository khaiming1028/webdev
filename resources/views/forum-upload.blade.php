<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Forum</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/0d113d0983.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="index.html">
                    <img src="img/inti.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('main') }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('forum.view') }}">Forum</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('view.profile') }}">Profile</a></li>
                    <li>
                        <a class="nav-link scrollto" href="{{ Auth::check() && Auth::user()->student ? route('student.applied-jobs', ['studentId' => Auth::user()->student->id]) : '#' }}">
                            Applied Jobs
                        </a>
                    </li>
                    @if(Auth::check())
                    <li>
                        <a class="nav-link scrollto" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li><a class="nav-link scrollto" href="{{ route('register') }}">Sign up</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Log in</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container" style="margin-top: 120px;">
            <form method="POST" action="{{ route('forum.store') }}" class="edit" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="forums_title">Forum Title</label>
                    <input type="text" name="forums_title" id="forums_title" placeholder="Forum Title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="forums_content">Forum Content</label>
                    <textarea name="forums_content" id="forums_content" placeholder="Forum Content" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Create Forum</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
