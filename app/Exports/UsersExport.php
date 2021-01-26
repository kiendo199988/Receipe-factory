<?php
namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'e-mail',
            'role',
            'image',
            'created at',
            'updated at'
        ];
    }

}

?>