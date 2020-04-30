<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
//下面兩條是增加的
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Users_Excel_Export implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($data){
        $this->data=$data;
    }

    public function collection()
    {
        return collect($this->data);
        /*
        return collect([
            [
                'name' => 'Povilas',
                'surname' => 'Korop',
                'email' => 'povilas@laraveldaily.com',
                'twitter' => '@povilaskorop'
            ],
            [
                'name' => 'Taylor',
                'surname' => 'Otwell',
                'email' => 'taylor@laravel.com',
                'twitter' => '@taylorotwell'
            ]
        ]);
        */
    }

    public function headings(): array//這裡是excel上方的title
    {
        return [
            'Name',
            'create_account',
            'ACNO',
            'product_name',
            'invest_money',
            'index_year'
        ];
    }
}
