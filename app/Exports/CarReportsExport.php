<?php

namespace App\Exports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CarReportsExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Car::with(['manufacturer', 'model', 'build_type', 'fuel_type', 'township', 'state_division', 'grade', 'budget_year', 'receive', 'carremarks'])
                  ->get()
                  ->map(function ($car, $index) {
                    return [
                          $index + 1,  // Auto-increment SR NO
                          $car->plate_number,
                          ($car->manufacturer->name ?? 'N/A') . ' ' . ($car->model->name ?? 'N/A'),
                          $car->build_type->name ?? 'N/A',
                          $car->year,
                          $car->wheel . ' W',
                          $car->engine_power . ' CC',
                          $car->capacity . ' P',
                          $car->weight . ' Kg',
                          $car->fuel_type->name ?? 'N/A',
                          $car->body_no,
                          $car->engine_no,
                          $car->proc_date,
                          $car->license_exp,
                          $car->township->name ?? 'N/A',
                          $car->state_division->name ?? 'N/A',
                          $car->vehicle_use,
                          $car->condition,
                          $car->grade->name ?? 'N/A',
                          $car->budget_year->name ?? 'N/A',
                          $car->receive->name ?? 'N/A',
                          $car->carremarks->pluck('remark')->implode(', '),
                      ];
                  });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'SR NO',
            'REGISTRATION NO',
            'VEHICLE NAME',
            'TYPE OF VEHICLE',
            'MODEL YEAR',
            'NO OF WHEEL',
            'ENGINE POWER',
            'CAPACITY (PAYLOAD)',
            'WEIGHT (KG)',
            'TYPE OF FUEL',
            'CHASSIS NO',
            'ENGINE NO',
            'DATE OF PROCUREMENT',
            'LICENSE EXPIRE DATE',
            'LOCATION',
            '',
            'USE OF VEHICLE',
            'CONDITION',
            'GRADE/CLASS',
            'BUDGET YEAR',
            'RECEIVE BY',
            'REMARKS',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Define styles for headers
                $headerStyleArray = [
                    'font' => [
                        'bold' => false,
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

                // Define styles for specific bold cells
                $boldStyleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                ];

                // Apply styles to headers A4:V5 without bold
                $event->sheet->getDelegate()->getStyle('A4:V5')->applyFromArray($headerStyleArray);

                // Define as blank cells
                $cellsToBlank = [
                    'C2', 'D2', 'E2', 'I2', 'J2', 'K2', 'L2', 'M2', 'N2', 'O2', 'P2', 'Q2', 'R2', 'S2', 'T2', 'U2', 'V2',
                    'B2', 'F2', 'G2', 'H2',
                    'D3', 'E3', 'I3', 'J3', 'K3', 'L3', 'M3', 'N3', 'O3', 'P3', 'Q3', 'R3', 'S3', 'T3', 'U3', 'V3',
                    'B3', 'F3', 'G3', 'H3'
                ];
                foreach ($cellsToBlank as $cell) {
                    $event->sheet->getDelegate()->getCell($cell)->setValue('');
                }

                $event->sheet->getDelegate()->getCell('A6')->setValue('1');
                $event->sheet->getDelegate()->getCell('B6')->setValue('2');
                $event->sheet->getDelegate()->getCell('C6')->setValue('3');
                $event->sheet->getDelegate()->getCell('D6')->setValue('4');
                $event->sheet->getDelegate()->getCell('E6')->setValue('5');
                $event->sheet->getDelegate()->getCell('F6')->setValue('6');
                $event->sheet->getDelegate()->getCell('G6')->setValue('7');
                $event->sheet->getDelegate()->getCell('H6')->setValue('8');
                $event->sheet->getDelegate()->getCell('I6')->setValue('9');
                $event->sheet->getDelegate()->getCell('J6')->setValue('10');
                $event->sheet->getDelegate()->getCell('K6')->setValue('11');
                $event->sheet->getDelegate()->getCell('L6')->setValue('12');
                $event->sheet->getDelegate()->getCell('M6')->setValue('13');
                $event->sheet->getDelegate()->getCell('N6')->setValue('14');
                $event->sheet->getDelegate()->getCell('O6')->setValue('15');
                $event->sheet->getDelegate()->getCell('P6')->setValue('16');
                $event->sheet->getDelegate()->getCell('Q6')->setValue('17');
                $event->sheet->getDelegate()->getCell('R6')->setValue('18');
                $event->sheet->getDelegate()->getCell('S6')->setValue('19');
                $event->sheet->getDelegate()->getCell('T6')->setValue('20');
                $event->sheet->getDelegate()->getCell('U6')->setValue('21');
                $event->sheet->getDelegate()->getCell('V6')->setValue('22');

                // Merge cells 
                $event->sheet->mergeCells('A1:V1');
                $event->sheet->getDelegate()->getCell('A1')->setValue('မော်တော်ယာဉ်ပြန်တမ်းစာရင်း');

                 // Apply center alignment and bold style for merged cell A1
                $event->sheet->getDelegate()->getStyle('A1:V1')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                ],
                
                ]);

                $event->sheet->mergeCells('A2:B2');
                $event->sheet->getDelegate()->getCell('A2')->setValue('MINISTRY:');
                $event->sheet->getDelegate()->getCell('C2')->setValue('SUPREME COURT OF THE UNION');

                $event->sheet->mergeCells('A3:B3');
                $event->sheet->getDelegate()->getCell('A3')->setValue('DEPARTMENT:');
                $event->sheet->getDelegate()->getCell('C3')->setValue('SUPREME COURT OF THE UNION');

                // Merge cells for each header
                $event->sheet->mergeCells('A4:A5');
                $event->sheet->getDelegate()->getCell('A4')->setValue("SR\nNO");

                $event->sheet->mergeCells('B4:B5');
                $event->sheet->getDelegate()->getCell('B4')->setValue("REGISTRATION\nNO");

                $event->sheet->mergeCells('C4:C5');
                $event->sheet->getDelegate()->getCell('C4')->setValue("VEHICLE\nNAME");

                $event->sheet->mergeCells('D4:D5');
                $event->sheet->getDelegate()->getCell('D4')->setValue("TYPE OF\nVEHICLE");

                $event->sheet->mergeCells('E4:E5');
                $event->sheet->getDelegate()->getCell('E4')->setValue('MODEL YEAR');

                $event->sheet->mergeCells('F4:F5');
                $event->sheet->getDelegate()->getCell('F4')->setValue("NO OF\nWHEEL");

                $event->sheet->mergeCells('G4:G5');
                $event->sheet->getDelegate()->getCell('G4')->setValue("ENGINE\nPOWER");

                $event->sheet->mergeCells('H4:H5');
                $event->sheet->getDelegate()->getCell('H4')->setValue("CAPACITY\n(PAYLOAD)");

                $event->sheet->mergeCells('I4:I5');
                $event->sheet->getDelegate()->getCell('I4')->setValue("WEIGHT\n(KG)");

                $event->sheet->mergeCells('J4:J5');
                $event->sheet->getDelegate()->getCell('J4')->setValue("TYPE OF\nFUEL");

                $event->sheet->mergeCells('K4:K5');
                $event->sheet->getDelegate()->getCell('K4')->setValue('CHASSIS NO');

                $event->sheet->mergeCells('L4:L5');
                $event->sheet->getDelegate()->getCell('L4')->setValue('ENGINE NO');

                $event->sheet->mergeCells('M4:M5');
                $event->sheet->getDelegate()->getCell('M4')->setValue("DATE OF\nPROCUREMENT");

                $event->sheet->mergeCells('N4:N5');
                $event->sheet->getDelegate()->getCell('N4')->setValue("LICENSE\nEXPIRE DATE");

                // Merge cells for 'LOCATION' header
                $event->sheet->mergeCells('O4:P4');
                $event->sheet->getDelegate()->getCell('O4')->setValue('LOCATION');

                $event->sheet->mergeCells('Q4:Q5');
                $event->sheet->getDelegate()->getCell('Q4')->setValue("USE OF\nVEHICLE");

                $event->sheet->mergeCells('R4:R5');
                $event->sheet->getDelegate()->getCell('R4')->setValue('CONDITION');

                $event->sheet->mergeCells('S4:S5');
                $event->sheet->getDelegate()->getCell('S4')->setValue("GRADE/\nCLASS");

                $event->sheet->mergeCells('T4:T5');
                $event->sheet->getDelegate()->getCell('T4')->setValue("BUDGET\n YEAR");

                $event->sheet->mergeCells('U4:U5');
                $event->sheet->getDelegate()->getCell('U4')->setValue("RECEIVE\nBY");

                $event->sheet->mergeCells('V4:V5');
                $event->sheet->getDelegate()->getCell('V4')->setValue('REMARKS');

                // Set sub-headers for 'LOCATION'
                $event->sheet->getDelegate()->getCell('O5')->setValue('TOWNSHIP');
                $event->sheet->getDelegate()->getCell('P5')->setValue('STATE DIVISION');

                // Apply bold style to specific cells
                $boldCells = ['A1', 'A2', 'A3', 'C2', 'C3'];
                foreach ($boldCells as $cell) {
                    $event->sheet->getDelegate()->getStyle($cell)->applyFromArray($boldStyleArray);
                }

                // Apply other styles to the sub-headers
                $event->sheet->getDelegate()->getStyle('O2:P2')->applyFromArray($headerStyleArray);

                // Customize column width
                foreach (range('A', 'V') as $columnID) {
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }

                // Apply border styles to all data rows excluding A1:V3
                $rowCount = $this->collection()->count() + 6; // Starting data from row 7 and adding headers and title
                $borderStyleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];
                $event->sheet->getDelegate()->getStyle("A4:V$rowCount")->applyFromArray($borderStyleArray);

                // Remove borders from specific cells
                $noBorderStyle = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
                        ],
                    ],
                ];
                $event->sheet->getDelegate()->getStyle('A2')->applyFromArray($noBorderStyle);
                $event->sheet->getDelegate()->getStyle('A1')->applyFromArray($noBorderStyle);
                $event->sheet->getDelegate()->getStyle('C2')->applyFromArray($noBorderStyle);
                $event->sheet->getDelegate()->getStyle('C3')->applyFromArray($noBorderStyle);
                $event->sheet->getDelegate()->getStyle('O2')->applyFromArray($noBorderStyle);
                $event->sheet->getDelegate()->getStyle('P2')->applyFromArray($noBorderStyle);
                $event->sheet->getDelegate()->getStyle('A3')->applyFromArray($noBorderStyle);

                 // Add export date to top-right corner
                $exportDate = 'ရက်စွဲ- ' . now()->format('d/m/Y');
                $event->sheet->getDelegate()->getCell('V3')->setValue($exportDate);
                $event->sheet->getDelegate()->getStyle('V3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                ]);

                // Start data from row 7
                $event->sheet->getDelegate()->fromArray($this->collection()->toArray(), null, 'A7');
            },
        ];
    }
}
