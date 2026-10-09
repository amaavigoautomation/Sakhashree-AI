<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class EnquiriesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithCustomStartCell, WithEvents
{
    public function collection()
    {
        return DB::table('enquiries')
            ->leftJoin('countries', 'enquiries.country_id', '=', 'countries.id')
            ->leftJoin('subjects', 'enquiries.subject_id', '=', 'subjects.id')
            ->select([
                'subjects.name as subject_name',
                'enquiries.full_name',
                'enquiries.calling_code',
                'enquiries.phone',
                'enquiries.email',
                'countries.name as country_name',
                'enquiries.description',
                'enquiries.created_at',
            ])->orderByDesc('enquiries.id')->get();
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        return ['Subject', 'Full Name', 'Mobile', 'Email', 'Country', 'Description', 'Enquiry Date',];
    }

    public function map($enquiry): array
    {
        return [
            $enquiry->subject_name ?? '-',
            $enquiry->full_name ?? '-',
            trim(($enquiry->calling_code ?? '') . ' ' . ($enquiry->phone ?? '')),
            $enquiry->email ?? '-',
            $enquiry->country_name ?? '-',
            $enquiry->description ?? '-',
            $enquiry->created_at
                ? Carbon::parse($enquiry->created_at)
                ->format('d-m-Y h:i A') : '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Column headings in row 2
        $sheet->getStyle('A2:G2')->getFont()->setBold(true)->setSize(12);

        $sheet->getStyle('A2:G2')->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER)
            ->setWrapText(true);

        $sheet->getRowDimension(2)->setRowHeight(25);
        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Add title
                $sheet->mergeCells('A1:G1');
                $sheet->setCellValue('A1', 'General Enquiries');

                // Title formatting
                $sheet->getStyle('A1:G1')->getFont()->setBold(true)->setSize(16);

                $sheet->getStyle('A1:G1')->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                $sheet->getRowDimension(1)->setRowHeight(32);

                // Style column headings
                $sheet->getStyle('A2:G2')->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFE8EEF7');

                // Add borders to the complete report
                $lastRow = $sheet->getHighestRow();

                $sheet->getStyle("A1:G{$lastRow}")
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    );

                // Freeze title and headings
                $sheet->freezePane('A3');
            },
        ];
    }
}
