<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
    public function collection(Collection $rows)
    {
      
        foreach ($rows as $row) 
        {
            Customer::updateOrCreate([
                'name' => $row[0],
                'mobile'=>$row[1],
                'email'=>$row[2],
                'gender'=>$row[3],
                'is_married'=>$row[4]=='yes'?1:0,
                'status'=>$row[5]=='active'?1:0,
            ]);
           
        }
    }
    
}
