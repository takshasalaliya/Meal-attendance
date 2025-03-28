<?php

namespace App\Imports;

use App\Models\Qrdetail;
use App\Mail\Useremail;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToCollection;
use CURLFile;


class ManuallyUser implements ToCollection, ToModel
{
    private $current = 0;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
    public function model(array $row)
    {
        $this->current++;
    
        if ($this->current > 1) {
            $valid = Qrdetail::where('mobile', $row[1])->first();

            if (empty($valid)) {
                $data = new Qrdetail();
              if(!empty($row[1])){
                $data->name = $row[0];
                $data->category = $row[3];
                $data->email = $row[2];
                $data->mobile = $row[1];
                $data->save();
              }else{
                $data->name = $row[0];
                $data->category = $row[3];
                $data->email = $row[2];
                $data->save();
              }
            }
        }
    }
}
