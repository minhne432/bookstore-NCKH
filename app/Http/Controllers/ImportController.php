<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BooksImport;
use App\Imports\BookItemsImport;

class ImportController extends Controller
{
    //
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        Excel::import(new BooksImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function importBookItem(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        Excel::import(new BookItemsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
