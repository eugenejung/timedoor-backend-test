<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rating</title>
</head>
<body>
    <main>
        <center>
            <h1>Insert Rating</h1>
        </center>
        <br>
        <div class="content">
            <form action="{{route('ratings.store')}}" method="post">
                @csrf
                <div class="author">
                    <label for="">Book Author: </label>
                    <select name="author_id" id="author_id">
                        <option value="">-- Choose Author --</option>
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class="book">
                    <label for="">Book Name: </label>
                    <select name="book_id" id="book_id">
                        {{-- <option value="">-- Choose Book --</option> --}}
                    </select>
                </div><br>
                <div class="rating">
                    <label for="">Rating: </label>
                    <select name="rating" id="">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div><br>
                <center><button type="submit">Submit</button></center>
            </form>
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#author_id').on('change', function () {
        let authorId = $(this).val();

        // Clear book dropdown
        $('#book_id').empty().append('<option value="">-- Choose Book --</option>');

        if (authorId) {
            $.ajax({
                url: '/books/by-author/' + authorId,
                type: 'GET',
                success: function (books) {
                    $.each(books, function (index, book) {
                        $('#book_id').append(
                            $('<option>', {
                                value: book.id,
                                text: book.book_name
                            })
                        );
                    });
                },
                error: function () {
                    alert('Failed to load books.');
                }
            });
        }
    });
</script>
</html>