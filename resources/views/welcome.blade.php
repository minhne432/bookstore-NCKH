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
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="logo.png" alt="Book Store"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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




    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
