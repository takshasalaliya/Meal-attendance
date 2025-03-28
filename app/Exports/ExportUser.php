<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Qrdetail;


class ExportUser implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Qrdetail::all();
    }
   public function map($user):array{
  
        return[
            $user->id,
            $user->name,
            $user->mobile,
            $user->category,
            $user->breakfast,
            $user->lunch,
            
        ];
    
           
      }
    public function headings():array{
        return[
            'id',
            'Name',
            'Phone No.',
            'Category',
            'Breakfast',
            'Lunch',
        ];
    }
}
