<?php

namespace App\Exports;

use App\Models\Import;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ImportExport implements FromView
{
    protected $import;

    public function __construct(Import $import)
    {
        $this->import = $import;
    }

    public function view(): View
    {
        return view('Admin.imports.export', [
            'import' => $this->import
        ]);
    }
}
