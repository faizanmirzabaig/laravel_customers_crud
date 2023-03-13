<?php

namespace App\Exports;

use App\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Log;

class CustomersExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {

        $customers = Customer::orderBy('id', 'ASC')->get();
        Log::info(['$paramList' => $customers]);

        return view('customers.excel.export', compact('customers'));

    }
    // public function collection()
    // {
    //     return Customer::all();
    // }
    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'Name',
    //         'Mobile',
    //         'Email',
    //         'Gender',
    //         'Is_Married',
    //         'Status',
    //         'Created At',
    //         'Updated At',
    //     ];
    // }
}
