<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book_item;
use App\Models\Book;

class BookshopHomeController extends Controller
{
    //
    public function index()
    {
        $listBook = Book_item::where('isbn13', '!=', 'null')->paginate(8); // Phân trang, mỗi trang 8 sản phẩm
        return view('welcome', compact('listBook'));
    }


    public function bookDetails($isbn13)
    {
        $book = Book_item::where('isbn13', $isbn13)->first();

        // Kiểm tra nếu không tìm thấy sách
        if (!$book) {
            abort(404); // Hoặc bạn có thể chuyển hướng hoặc hiển thị thông báo tùy ý
        }

        // Lấy sách liên quan từ bảng books
        $relatedIsbns = Book::where('isbn', $isbn13)->first([
            'rcmd1_isbns',
            'rcmd2_isbns',
            'rcmd3_isbns',
            'rcmd4_isbns',
            'rcmd5_isbns',
            'rcmd6_isbns',
            'rcmd7_isbns',
            'rcmd8_isbns',
            'rcmd9_isbns',
            'rcmd10_isbns',
            'rcmd11_isbns',
            'rcmd12_isbns',
            'rcmd13_isbns',
            'rcmd14_isbns',
            'rcmd15_isbns',
            'rcmd16_isbns',
            'rcmd17_isbns',
            'rcmd18_isbns',
            'rcmd19_isbns',
            'rcmd20_isbns'
        ]);

        // Chuyển ISBNs liên quan vào mảng và loại bỏ khoảng trắng
        $relatedIsbnsArray = array_map('trim', $relatedIsbns->toArray());

        // Lọc bỏ các giá trị rỗng (nếu có)
        $relatedIsbnsArray = array_filter($relatedIsbnsArray);

        // Lấy sách liên quan từ bảng Book_item
        $relatedBooks = Book_item::whereIn('isbn13', $relatedIsbnsArray)->get();

        // Trả về view 'BookDetails' với dữ liệu của sách và sách liên quan
        return view('BookDetails', compact('book', 'relatedBooks'));
    }
}
