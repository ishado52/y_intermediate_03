<!DOCTYPE html>
<html>

<head>
    <title>todoアプリ</title>
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



    <div class="container mb-4 mt-5" style="max-width: 500px">
        <h2 class="text-center mb-4" style="font-size:1.5rem">やることリスト</h2>
        <form action="{{ route('posts.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="text" name="content" class="form-control mb-2" value="{{ old('content') }}"
                placeholder="新しいタスクを追加" required>
            {{-- バリデーションエラーメッセージ --}}
            @if ($errors->any())
                <div class="small">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            {{-- /バリデーションエラーメッセージ --}}
            <button type="submit" class="btn btn-primary btn-sm py-2 w-100">追加</button>
        </form>

        <ul class="list-group list-group-flush">
            @if ($posts->isEmpty())
                <li class="list-group-item text-center">タスクはありません</li>
            @else
                @foreach ($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                        <div class="flex-grow-1">
                            <p class="mb-1">{{ $post->content }}</p>
                        </div>
                        <div>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn"><i
                                    class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="fa-solid fa-trash"
                                        style="color: #484848"></i></button>
                            </form>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</body>

</html>
