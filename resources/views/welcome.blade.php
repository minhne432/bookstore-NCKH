<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .book-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .book-card img {
            max-height: 150px;
            /* Giới hạn chiều cao hình ảnh */
            object-fit: contain;
            margin-bottom: 10px;
        }

        .book-title {
            font-size: 1.2rem;
            margin-top: 10px;
            height: 50px;
            /* Giới hạn chiều cao tiêu đề */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .book-author {
            color: #6c757d;
            margin-bottom: 10px;
        }

        .book-price {
            font-size: 1.2rem;
            color: #28a745;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-top: auto;
            /* Đẩy nút xuống cuối thẻ */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Related book */
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
</head>

<body>

    <!-- Include Navbar -->
    @include('layouts.navbar')

    <!-- Book List -->
    <div class="container mt-4">
        <div class="row">
            @foreach ($listBook as $book)
                <div class="col-md-3">
                    <div class="book-card text-center">
                        <a href="{{ route('book-details', $book->isbn13) }}"><img src="{{ $book->thumbnail }}"
                                alt="{{ $book->title }}"></a>
                        <h5 class="book-title">{{ $book->title }}</h5>
                        <p class="book-author">{{ $book->author }}</p>
                        <p class="book-price">${{ $book->price }}</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Hiển thị các liên kết phân trang -->
    <div class="d-flex justify-content-center mt-4">
        {{ $listBook->links('pagination::bootstrap-5') }}
    </div>

    @if (Session::has('viewed_isbn13'))
        <div class="container mt-5">
            <h2 class="text-center recommend-heading">Recommend books for you</h2>
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
    @endif




    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
