<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Book Store</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }
        .book-card {
            background-color: #fff;
            border: none;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            height: 450px; /* Set a fixed height for all cards */
            display: flex;
            flex-direction: column;
        }
        .book-card:hover {
            transform: translateY(-5px);
        }
        .book-image-container {
            height: 200px; /* Fixed height for image container */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .book-card img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
        .book-details {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .book-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 10px;
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .book-author {
            color: #6c757d;
            margin-bottom: 10px;
            font-style: italic;
        }
        .book-price {
            font-size: 1.2rem;
            color: #28a745;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: auto; /* Push button to bottom of card */
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
            transform: scale(1.05);
        }
        .recommend-heading {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
            text-transform: uppercase;
            text-align: center;
            position: relative;
        }
        .recommend-heading::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: #007bff;
            margin: 10px auto;
        }
        #relatedBooksCarousel {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            opacity: 0.8;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #007bff;
            border-radius: 50%;
            padding: 15px;
        }
        .pagination {
            justify-content: center;
            margin-top: 30px;
        }
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <div class="container mt-5">
        <h1 class="text-center mb-5">Discover Your Next Favorite Book</h1>
        <div class="row">
            @foreach ($listBook as $book)
                <div class="col-md-3 col-sm-6">
                    <div class="book-card">
                        <div class="book-image-container">
                            <a href="{{ route('book-details', $book->isbn13) }}">
                                <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="book-details">
                            <h5 class="book-title">{{ $book->title }}</h5>
                            <p class="book-author">{{ $book->author }}</p>
                            <p class="book-price">${{ $book->price }}</p>
                            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $listBook->links('pagination::bootstrap-5') }}
    </div>

    @if (Session::has('viewed_isbn13'))
        <div class="container mt-5">
            <h2 class="recommend-heading">Recommended for You</h2>
            <div id="relatedBooksCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($relatedBooks->chunk(4) as $key => $chunk)
                        <div class="carousel-item @if ($key == 0) active @endif">
                            <div class="row">
                                @foreach ($chunk as $relatedBook)
                                    <div class="col-md-3">
                                        <div class="book-card">
                                            <div class="book-image-container">
                                                <a href="{{ route('book-details', $relatedBook->isbn13) }}">
                                                    <img src="{{ $relatedBook->thumbnail }}" alt="{{ $relatedBook->title }}" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="book-details">
                                                <h5 class="book-title">{{ $relatedBook->title }}</h5>
                                                <p class="book-author">{{ $relatedBook->author }}</p>
                                                <p class="book-price">${{ $relatedBook->price }}</p>
                                                <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#relatedBooksCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#relatedBooksCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>