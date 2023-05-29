<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function index()
    {
        return view('fibonacci');
    }

    public function generateFibonacciNum(Request $Request)
    {   
        $rows = $Request->input('row');
        $columns = $Request->input('col');
         $table = [];

    // Generate the Fibonacci sequence
        $fibonacci = [0, 1];
        for ($i = 2; $i < $rows * $columns; $i++) {
            $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }

        // Fill the table with Fibonacci numbers
        $index = 0;
        for ($i = 0; $i < $rows; $i++) {
            $row = [];
            for ($j = 0; $j < $columns; $j++) {
                $row[] = $fibonacci[$index];
                $index++;
            }
            $table[] = $row;
        }

        return $table;
    }
    
}
