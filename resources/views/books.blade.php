<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
    <main>
        <a href="{{route('authors.list')}}">Top 10 Author</a><br>
        <a href="{{route('ratings.vote')}}">Rate Your Favorite Book</a>
        <div class="filter">
            <form action="{{route('books.filter')}}" method="post">
                @csrf
                <div class="list">
                    <label for="">List Shown: </label>
                    <select name="limit" id="">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{$i*10}}">{{$i*10}}</option>
                        @endfor
                    </select>
                </div><br>
                <div class="search">
                    <label for="">Search: </label>
                    <input type="text" name="search" id="">
                </div><br>
                <button type="submit">Submit</button>
            </form>
        </div><br>
        <div class="content">
            <table border=1>
                <thead>
                    <th>No</th>
                    <th>Book Name</th>
                    <th>Category Name</th>
                    <th>Author Name</th>
                    <th>Average Rating</th>
                    <th>Voter</th>
                </thead>
                <tbody>
                    @foreach ($data as $key => $book)
                        {{-- @dd($book); --}}
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$book->book_name}}</td>
                            <td>{{$book->category->name}}</td>
                            <td>{{$book->author->name}}</td>
                            <td>{{$book->average_rating}}</td>
                            <td>{{$book->firstRating ? $book->firstRating->voter : 0}}</td>
                            {{-- <td></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
