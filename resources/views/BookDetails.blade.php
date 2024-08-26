<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    .carousel-item {
        transition: transform 0.5s ease;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }

    .carousel-control-prev {
        left: -5%;
    }

    .carousel-control-next {
        right: -5%;
    }

    .book-card {
        position: relative;
        z-index: 1;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #000;
        border-radius: 50%;
        padding: 10px;
        z-index: 2;
    }

    .carousel-inner {
        padding: 0 15px;
    }

    .recommend-heading {
        font-size: 2rem;
        /* Kích thước chữ lớn hơn */
        font-weight: bold;
        /* Đậm hơn */
        color: #333;
        /* Màu sắc chữ */
        margin-bottom: 30px;
        /* Thêm khoảng cách phía dưới */
        text-transform: uppercase;
        /* Viết hoa toàn bộ chữ */
    }
</style>

<body>

    <!-- Navbar -->
    @include('layouts.navbar')



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
            <p id="description">
                @if(strlen($book->description) > 200)
                    {{ Str::limit($book->description, 200) }}
                    <span id="dots">...</span>
                    <span id="more" style="display:none">{{ substr($book->description, 200) }}</span>
                @else
                    {{ $book->description }}
                @endif
            </p>
            @if (strlen($book->description) > 200)
                <button onclick="toggleDescription()" id="myBtn" class="btn btn-link">Xem thêm</button>
            @endif
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>





    <div class="container mt-5">
        <h2 class="text-center recommend-heading">Similar products</h2>
        <div id="relatedBooksCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($relatedBooks->chunk(4) as $key => $chunk)
                    <div class="carousel-item @if ($key == 0) active @endif">
                        <div class="row">
                            @foreach ($chunk as $relatedBook)
                                <div class="col-md-3">
                                    <div class="book-card text-center">
                                        <a href="{{ route('book-details', $relatedBook->isbn13) }}">
                                            <img src="{{ $relatedBook->thumbnail }}" alt="{{ $relatedBook->title }}"
                                                class="img-fluid">
                                        </a>
                                        <h5 class="book-title">{{ $relatedBook->title }}</h5>
                                        <p class="book-author">{{ $relatedBook->author }}</p>
                                        <p class="book-price">${{ $relatedBook->price }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#relatedBooksCarousel" role="button" data-slide="prev"
                title="Previous">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#relatedBooksCarousel" role="button" data-slide="next"
                title="Next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>




    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        function toggleDescription() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Xem thêm";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Thu gọn";
                moreText.style.display = "inline";
            }
        }
    </script>
</body>

</html>
