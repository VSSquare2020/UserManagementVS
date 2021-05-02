<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;


class UsersImport implements ToModel,WithHeadingRow, SkipsOnError
{
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row,"hhh");
       // return $row;
        return new User([
                'name'     => $row[0],
                'email'    => $row[1], 
                'password' => Hash::make($row[2]),
        ]);
    }

    public function onError(Throwable $error)
    {
        dd($error);
    }
}
