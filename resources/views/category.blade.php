<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   @include('partial.css')
</head>
<body>
  @include('partial.header')
<div id="app">
    <div class="main-wrapper">
        <div class="main-content">
            <div class="container">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>List Category</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <p>
                            <a class="btn btn-primary" href="{{ route('categories.create') }}">New Category</a>
                        </p>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->nama }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="
                                            event.preventDefault();
                                            if (confirm('Do you want to remove this?')) {
                                                document.getElementById('delete-row-{{ $category->id }}').submit();
                                            }">
                                            delete
                                        </a>
                                        <form id="delete-row-{{ $category->id }}" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        No record found!
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
