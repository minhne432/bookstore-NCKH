<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{ $book->title }}</h1>
            <p class="text-muted">by {{ $book->authors }}</p>
            <p><strong>ISBN13:</strong> {{ $book->isbn13 }}</p>
            <p class="text-success"><strong>Price:</strong> ${{ $book->price }}</p>
            <p>{{ $book->description }}</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>


<!-- Related Products Section -->
{{-- <div class="container mt-5">
    <h2 class="mb-4">Related Products</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="book-card text-center">
                <img src="related-book1.jpg" alt="Related Book 1" class="img-fluid">
                <h5 class="book-title mt-2">Related Book 1</h5>
                <p class="book-price">$9.99</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="book-card text-center">
                <img src="related-book2.jpg" alt="Related Book 2" class="img-fluid">
                <h5 class="book-title mt-2">Related Book 2</h5>
                <p class="book-price">$12.99</p>
            </div>
        </div>
        <!-- Add more related products as needed -->
    </div>
</div> --}}


    <div class="mt-5">
        <h2>Related Books</h2>
        <div class="row">
            @foreach($relatedBooks as $relatedBook)
                <div class="col-md-3">
                    <div class="book-card text-center">
                        <a href="{{ route('book-details', $relatedBook->isbn13) }}">
                            <img src="{{ $relatedBook->thumbnail }}" alt="{{ $relatedBook->title }}" class="img-fluid">
                        </a>
                        <h5 class="book-title">{{ $relatedBook->title }}</h5>
                        <p class="book-author">{{ $relatedBook->author }}</p>
                        <p class="book-price">${{ $relatedBook->price }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
