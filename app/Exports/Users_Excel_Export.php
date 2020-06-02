<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
//下面是增加的，要implement
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;//Auto column size

//excel class從這裡，都是要添加，並且填寫的
use \Maatwebsite\Excel\Writer;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

Sheet::macro('setOrientation', function (Sheet $sheet, $orientation) {
    $sheet->getDelegate()->getPageSetup()->setOrientation($orientation);
});

Writer::macro('setCreator', function (Writer $writer, string $creator) {
    $writer->getDelegate()->getProperties()->setCreator($creator);
});

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});
//excel class到這裡


// use Maatwebsite\Excel\Concerns\WithDrawings;//Don't know what this doing

// use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;//這個不用implement,also don't know what's this doing

class Users_Excel_Export implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($data){
        $this->data=$data;
    }

    //this function is the column class setting function
    public function registerEvents(): array{
        return [
            BeforeExport::class  => function(BeforeExport $event) {
                $event->writer->setCreator('JamesLin');
            },
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                //這樣一組
                $event->sheet->styleCells(
                    'A1:A6',
                    [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => 'FFFF0000'],
                            ],
                        ]
                    ]
                );
                //一組結束
                

            },
        ];
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
