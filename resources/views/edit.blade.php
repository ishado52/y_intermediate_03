<!DOCTYPE html>
<html>

<head>
    <title>編集画面</title>
    {{-- font-awesome --}}
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container w-25 mt-5">
<h2 class="text-center mb-4" style="font-size:1.5rem">編集</h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input type="text" name="content" value="{{ old('content', $post->content) }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm py-2 w-100 mb-2">更新</button><br>
            <a href="{{ route('index') }}" class="btn btn-secondary btn-sm py-2 w-100">キャンセル</a>
        </form>
    </div>
</body>

</html>
