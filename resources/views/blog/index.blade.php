<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Blog 2</title>
</head>

<body style="background: lightblue">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3">Add Blog</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CONTENT</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td class="text-center"><img
                                                src="{{ url() . Storage::url('public/blog/' . $blog->image) }}"
                                                class="rounded" style="width: 150px" alt="" srcset=""></td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{!! $blog->content !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Are You sure') ?"
                                                action="{{ route('blog.destroy' . $blog->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('blog.edit', $blog->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        No record to display
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $blog->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
