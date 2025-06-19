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
        <div class="filter">

        </div>
        <div class="content">
            <table>
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
                        <td>{{$key+1}}</td>
                        <td>{{$key+1}}</td>
                        <td>{{$key+1}}</td>
                        <td>{{$key+1}}</td>
                        <td>{{$key+1}}</td>
                        <td>{{$key+1}}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
