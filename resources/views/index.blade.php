<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel To-Do App</title>

    {{-- Custom JS --}}
    <script src="{{ url('js/main.js')}}"></script>

    {{-- Bootstrap CSS--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    {{-- Bootstrap related JS --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>
<body>

    <div class="container mt-3 | h-100 d-flex align-items-center justify-content-center c-bg-main">

        <div style="width: 70%;" class="px-4 pb-2">
            <div class="row mb-3 border border-dark rounded-bottom">
                <h2 class="col text-center" id="h2Here">To-Do App</h2>
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

            <span id="response-place"></span>

            @if (session()->has('infoType') && session()->has('infoMsg'))
                <div class="row mb-2 border border-dark">
                    <div class="col bg-{{ session('infoType') }} text-center">
                        <h3>{{ session('infoMsg') }}</h3>
                    </div>
                </div>
            @endif

            <div class="row border border-dark py-2">
                <div class="col">
                    @foreach($todos AS $key => $todo)
                        @php /** @var \App\Models\Todo $todo */ @endphp
                        <div class="row mb-1">
                            <div class="col-1">
                                {{ $key + 1 }}
                            </div>

                            <div class="col">
                                @if($todo->is_done)<del>@endif
                                    {{ $todo->title }}
                                @if($todo->is_done)</del> @endif
                            </div>

                            <div class="col d-flex justify-content-center">
                                @if(!$todo->is_done)
                                    <button class="btn btn-success mr-2" id="done{{ $todo->id }}" value="{{ $todo->id }}">Done</button>
                                    <input type="hidden" id="doneURL{{ $todo->id }}" value="{{ route("todo.done", ["todo" => $todo->id]) }}">
                                @endif

                                <button class="btn btn-danger" id="delete{{ $todo->id }}" value="{{ $todo->id }}">Delete</button>
                                <input type="hidden" id="deleteURL{{ $todo->id }}" value="{{ route("todo.delete", ["todo" => $todo->id]) }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</body>
</html>
