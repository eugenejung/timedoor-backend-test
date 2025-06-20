<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author</title>
</head>
<body>
    <main>
        <a href="{{route('home')}}">Back</a>
        <center>
            <h1>Top 10 Most Famous Author</h1>
            <br>
            <table border="1">
                <thead>
                    <th>No</th>
                    <th>Author Name</th>
                    <th>Voter</th>
                </thead>
                <tbody>
                    @foreach ($data as $key => $author)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$author->name}}</td>
                            <td>{{$author->voter}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </center>
    </main>
</body>
</html>