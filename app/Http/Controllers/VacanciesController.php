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

}
