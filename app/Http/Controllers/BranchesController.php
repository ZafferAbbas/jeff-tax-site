<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchesController extends Controller
{
    //
    public function getIncomeData()
    {
        // Fetch the income data here, for example:
        $incomeData = 4343;

        return response()->json(['income' => $incomeData]);
    }

}