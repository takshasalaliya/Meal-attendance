<?php

namespace App\Imports;

use App\Models\Qrdetail;
use App\Mail\Useremail;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Mail;
use CURLFile;


class UserExcel implements ToCollection, ToModel
{
    private $current = 0;

    public function collection(Collection $collection)
    {
        //
    }

    public function model(array $row)
    {
        $this->current++;
    
        if ($this->current > 1) {
            $valid = Qrdetail::where('email', $row[2])->first();
            if (empty($valid)) {
                
                
                
                if(!empty($row[1])){
                $data = new Qrdetail();
                $data->name = $row[0];
                $data->category = $row[3];
                $data->email = $row[2];
                $data->mobile = $row[1];
                }else{
                $data = new Qrdetail();
                $data->name = $row[0];
                $data->category = $row[3];
                $data->email = $row[2];
                }
           
                $message = [
                    'name' => $row[0],
                    'email' => $row[2],
                    
                ];
    
                $subject = "International Conference";
                $email = $row[2];
                if ($data->save()) {
                    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     Mail::to($email)->send(new Useremail($message, $subject));
                        } 
                }
            }
        }
    }
}