<?php

namespace App\Exports;

use App\Admin\Actions\GetResultsStudentsBaseTestsAction;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportResultsStudentsBaseTests implements FromArray, ShouldAutoSize, WithHeadings, WithMapping, WithColumnFormatting, WithEvents
{
    public function array(): array
    {
        $action = new GetResultsStudentsBaseTestsAction();
        return $action->run();
    }

    public function headings(): array
    {
        return [
            '№',
            'ФИО ученика',
            'Компания',
            'Класс',
            'Статус завершенности этапа',
            'Процент завершенности тестирования',
        ];
    }

    public function map($row): array
    {
        static $i = 1;

        return [
            $i++,
            $row->name,
            $row->school,
            $row->class_title,
            $row->finished ? 'Завершил' : 'Не завершил',
            intval($row->finished_percentage) / 100,
        ];
    }

    public function columnFormats(): array
    {
        return [
            "F" => NumberFormat::FORMAT_PERCENTAGE,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $footerRowNum = ($event->sheet->getHighestRow()+1);
                $lastRow = $footerRowNum-1;

                $event->sheet->getStyle("A1:F1")->applyFromArray(config('export_styles.header'));
                $event->sheet->getStyle("A2:F{$lastRow}")->applyFromArray(config('export_styles.rows'));
            }
        ];
    }
}
