<?php

namespace App\Imports;

use App\Models\Book_item;
use Maatwebsite\Excel\Concerns\ToModel;

class BookItemsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Book_item([
            'isbn13' => $row[0],
            'isbn10' => $row[1],
            'title' => $row[2],
            'subtitle' => $row[3],
            'authors' => $row[4],
            'categories' => $row[5],
            'thumbnail' => $row[6],
            'description' => $row[7],
            'published_year' => $row[8],
            'average_rating' => is_numeric($row[9]) ? floatval($row[9]) : null, // Chuyển đổi thành số thực
            'num_pages' => is_numeric($row[10]) ? intval($row[10]) : null,
            'ratings_count' => is_numeric($row[11]) ? intval($row[11]) : null,
        ]);
    }
}
