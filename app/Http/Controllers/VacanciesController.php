<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function index () {
        return view('pages.vacancies.index');
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
            'title' => 'required|max:255',
            'description' => 'required|alpha_num',
            'location' => 'required|max:255',
            'salary' => 'required|numeric'
        ]);

        auth()->user()->vacancies()->create($data);

        //\App\Models\VacanciesModel::create($data);

    }

}
