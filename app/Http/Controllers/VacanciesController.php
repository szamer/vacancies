<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacanciesController extends Controller
{
   
    public function index () {
        
        $vacancies = DB::table('vacancies')->get();
        return view('pages.vacancies.index', compact('vacancies'));
    }        

    public function user()
    {
        return $this->belogsTo(User::class);
    }

    public function create() 
    {
           return view('pages.vacancies.create');
    }

    public function store() 
    {
        
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'description' => ['required', 'regex:/[a-zA-Z0-9.,-]+/'],
            'location' => 'required|string|max:255',
            'salary' => ['required', 'regex:/[a-zA-Z0-9.,-]+/'],
        ]);

        auth()->user()->vacancies()->create($data);

        return redirect('/');

    }

}
