<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel To-Do App</title>

    {{-- Bootstrap CSS--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    {{-- Bootstrap related JS --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>
        html,
        body {
            height: 100%
        }
    </style>
</head>
<body>

    <div class="container mt-3 | h-100 d-flex align-items-center justify-content-center">

        <div style="width: 70%;" class="px-4 pb-2">
            <div class="row mb-3 border border-dark rounded-bottom">
                <h2 class="col text-center">To-Do App</h2>
            </div>

            <form action="{{ route('todo.save') }}" method="post">
                @csrf
                <div class="row mb-3 border border-dark py-2">
                    <div class="col form-group">
                        <input class="form-control" type="text" name="new-todo" placeholder="New Item">
                    </div>

                    <div class="col d-flex justify-content-center form-group">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>

            <div class="row border border-dark py-2">
                <div class="col">
                    @foreach($todos AS $todo)
                        <div class="row mb-1">
                            <div class="col">
                                @if($todo->get("is_done"))<del> @endif
                                {{ $todo->get("name") }}
                                    @if($todo->get("is_done"))</del> @endif
                            </div>
                            <div class="col d-flex justify-content-center">
                                @if(!$todo->get("is_done"))
                                    <a href="{{ route("todo.done", ["id" => $todo->get("id")]) }}">
                                        <button class="btn btn-success mr-2">Done</button>
                                    </a>
{{--                                    <button class="btn btn-success mr-2">Done</button>--}}
                                @endif
                                <a href="{{ route("todo.delete", ["id" => $todo->get("id")]) }}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
{{--                                <button class="btn btn-danger">Delete</button>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</body>
</html>
