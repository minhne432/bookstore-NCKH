<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Khai báo tên bảng nếu không theo quy tắc mặc định
    protected $table = 'books';

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'isbn',
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
        'rcmd20_isbns',
    ];

    // Các trường không được gán giá trị
    protected $guarded = [];
}
