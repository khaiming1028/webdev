<div class="container">
    <h1>{{ $forum->forums_title }}</h1>
    <p>{{ $forum->forums_content }}</p>
    <p><strong>Posted by:</strong> {{ $forum->student->name }}</p>
    <a href="{{ route('forum.view') }}" class="btn btn-secondary">Back to Forum</a>
</div>
