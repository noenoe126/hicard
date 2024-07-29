<?php

namespace App\Exports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\Log;

class TotalCarReportsExport implements FromCollection, WithHeadings, WithEvents
{
    public function convertToBurmeseNumerals($number) {
        $burmeseNumerals = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];
        $burmeseNumber = '';
        foreach (str_split($number) as $digit) {
            $burmeseNumber .= $burmeseNumerals[$digit];
        }
        return $burmeseNumber;
    }

    public function getRegionStateName($deptCode) {
        $deptNames = [
            '66' => 'ပြည်ထောင်စုလွှတ်တော်တရားချုပ်ရုံး',
            '67' => 'ကချင်ပြည်နယ်တရားလွှတ်တော်',
            '68' => 'ကယားပြည်နယ်တရားလွှတ်တော်',
            '69' => 'ကရင်ပြည်နယ်တရားလွှတ်တော်',
            '70' => 'ချင်းပြည်နယ်တရားလွှတ်တော်',
            '71' => 'စစ်ကိုင်းတိုင်းဒေသကြီးတရားလွှတ်တော်',
            '72' => 'တနင်္သာရီတိုင်းဒေသကြီးတရားလွှတ်တော်',
            '73' => 'ပဲခူးတိုင်းဒေသကြီးတရားလွှတ်တော်',
            '74' => 'မကွေးတိုင်းဒေသကြီးတရားလွှတ်တော်',
            '75' => 'မန္တလေးတိုင်းဒေသကြီးတရားလွှတ်တော်',
            '76' => 'မွန်ပြည်နယ်တရားလွှတ်တော်',
            '77' => 'ရခိုင်ပြည်နယ်တရားလွှတ်တော်',
            '78' => 'ရန်ကုန်တိုင်းဒေသကြီးတရားလွှတ်တော်',
            '79' => 'ရှမ်းပြည်နယ်တရားလွှတ်တော်',
            '80' => 'ဧရာဝတီတိုင်းဒေသကြီးတရားလွှတ်တော်',
        ];

        return $deptNames[$deptCode] ?? $deptCode;  // Handle unexpected values
    }

    public function collection()
    {
        $reportData = Car::with(['car_addresses'])
            ->get()
            ->map(function ($car, $index) {
                return [
                    'sr_no' => $this->convertToBurmeseNumerals($index + 1),  // Auto-increment SR NO with Burmese numerals
                    'region_state' => $this->getRegionStateName($car->car_user_dept),
                    'car_count' => $car->count,
                    'remarks' => '', // Adjust as needed
                ];
            });

        Log::info('Report Data:', $reportData->toArray()); // Log the retrieved data for debugging

        return $reportData;
    }

    public function headings(): array
    {
        return [
            'စဉ်',
            'တိုင်းဒေသကြီး/ ပြည်နယ်',
            'ကားစီးရေ',
            'မှတ်ချက်',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Apply styles (bold)
                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'wrapText' => true, // Enable text wrapping
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Center text horizontally
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Center text vertically (optional)
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $event->sheet->getDelegate()->getStyle('A4:D4')->applyFromArray($styleArray);

                // Merge cells for title
                $event->sheet->mergeCells('A2:D2');
                $event->sheet->getDelegate()->getCell('A2')->setValue('ပြည်ထောင်စုတရားလွှတ်တော်ချုပ်ရှိ မော်တော်ယာဉ်Sစာရင်းချုပ်');

                // Customize column width
                foreach (range('A', 'D') as $columnID) {
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }

                // Apply border styles to all data rows excluding title
                $rowCount = $this->collection()->count() + 4; // Starting data from row 5 and adding headers and title
                $borderStyleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];
                $event->sheet->getDelegate()->getStyle("A4:D$rowCount")->applyFromArray($borderStyleArray);
            },
        ];
    }
}
