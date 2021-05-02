<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Throwable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class UsersImport implements ToCollection,WithHeadingRow, SkipsOnError
{
    use SkipsErrors;
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
       //dd($rows);
        foreach ($rows as $key=>$row) {
            if($key>3)
           { //dd(gettype($row['bty']));
            if (!empty($row['name']) && $row['clo_card_no']) {
                User::create([
                'name' => $row['name'],
                'email' => 'email'.$row['name'].$key,
                'password' => $row['clo_card_no'],
                'clo_card_no' => $row['clo_card_no'],
                'army_number' => $row['army_no'],
                'battery' => $row['bty'],
                'rank' => !empty($row['rank'])?$row['rank']:"",

            ]);
            }
            }
        }
    }

    public function onError(Throwable $error)
    {
        dd($error);
    }
}
