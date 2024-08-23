<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Book([
            'isbn' => isset($row[0]) ? $row[0] : null,
            'rcmd1_isbns' => isset($row[1]) ? $row[1] : null,
            'rcmd2_isbns' => isset($row[2]) ? $row[2] : null,
            'rcmd3_isbns' => isset($row[3]) ? $row[3] : null,
            'rcmd4_isbns' => isset($row[4]) ? $row[4] : null,
            'rcmd5_isbns' => isset($row[5]) ? $row[5] : null,
            'rcmd6_isbns' => isset($row[6]) ? $row[6] : null,
            'rcmd7_isbns' => isset($row[7]) ? $row[7] : null,
            'rcmd8_isbns' => isset($row[8]) ? $row[8] : null,
            'rcmd9_isbns' => isset($row[9]) ? $row[9] : null,
            'rcmd10_isbns' => isset($row[10]) ? $row[10] : null,
            'rcmd11_isbns' => isset($row[11]) ? $row[11] : null,
            'rcmd12_isbns' => isset($row[12]) ? $row[12] : null,
            'rcmd13_isbns' => isset($row[13]) ? $row[13] : null,
            'rcmd14_isbns' => isset($row[14]) ? $row[14] : null,
            'rcmd15_isbns' => isset($row[15]) ? $row[15] : null,
            'rcmd16_isbns' => isset($row[16]) ? $row[16] : null,
            'rcmd17_isbns' => isset($row[17]) ? $row[17] : null,
            'rcmd18_isbns' => isset($row[18]) ? $row[18] : null,
            'rcmd19_isbns' => isset($row[19]) ? $row[19] : null,
            'rcmd20_isbns' => isset($row[20]) ? $row[20] : null,
        ]);
    }
}
