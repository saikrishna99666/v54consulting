<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display the public branches page.
     */
    public function index()
    {
        // Get regular counselling branches
        $branches = Branch::where('is_head_office', false)->orderBy('name', 'asc')->get();
        
        return view('branches', compact('branches'));
    }
}
