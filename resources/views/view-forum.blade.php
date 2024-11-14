<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - Internship Vacancy Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Reddit-like styling for posts */
        .post-card {
            display: flex;
            background: #fff;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .post-sidebar {
            width: 60px;
            text-align: center;
            padding-right: 15px;
            border-right: 1px solid #ddd;
        }
        .post-body {
            flex-grow: 1;
            padding-left: 15px;
        }
        .post-actions {
            font-size: 0.9rem;
            color: #888;
            display: flex;
            gap: 15px;
        }
        .post-actions a, .post-actions form {
            display: inline-block;
        }
        .post-actions button {
            border: none;
            background: none;
            color: #dc3545;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Header and Navbar -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="{{ route('main') }}"><span>LOGO</span></a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('main') }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('forum.view') }}">Forum</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('view.profile') }}">Profile</a></li>
                    <li><a class="nav-link scrollto" href="/  ">Sign up</a></li>
                    <li><a class="nav-link scrollto" href="#login">Log in</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container my-5" style="max-width: 800px;">
        <!-- Forum Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Forum Discussions</h2>
            <a href="{{ route('forum.create') }}" class="btn btn-primary">Create a New Post</a>
        </div>

        <!-- Forum Posts -->
        @forelse ($forums as $forum)
            <div class="post-card">
                <!-- Sidebar for post stats (like upvotes) -->
                <div class="post-sidebar">
                    <div style="font-size: 1.2em; font-weight: bold;">⬆</div>
                    <div>123</div> <!-- Placeholder for vote count -->
                    <div style="font-size: 1.2em; font-weight: bold;">⬇</div>
                </div>

                <!-- Post Content -->
                <div class="post-body">
                    <h5 class="card-title">{{ $forum->forums_title }}</h5>
                    <p class="card-text">{{ $forum->forums_content }}</p>

                    <!-- Actions -->
                    <div class="post-actions">
                        <a href="{{ route('forum.edit', $forum) }}" class="text-warning">Edit</a>
                        <form action="{{ route('forum.destroy', $forum) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">No posts available.</div>
        @endforelse
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl7+P4p+Zp8+NStzEwFzCBnZPUsY+5QV7kGxQEL1DkDChFXuGQZ2wzw8U7m"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGmHRQsA0iZdF2oJKGL5tW9YzJzXnEAGkPrxKQ68V4Ax0VqGZ77+Kp9v9GQ"
            crossorigin="anonymous"></script>
</body>
</html>
