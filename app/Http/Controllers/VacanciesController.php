<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VacanciesController extends Controller
{
   
    public function index () {
        
        $vacancies = DB::table('vacancies')->paginate(2);
        $vacanciesCount = DB::table('vacancies')->get();
        $pagination = $vacancies;
        return view('pages.vacancies.index', compact('vacancies','vacanciesCount','pagination'));
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

    public function search(Request $request) 
    {
        $validatedData = Validator::make($request->all(), [
            'query' => 'alpha_num|max:5',
        ])->validate();

        $vacancies =DB::table('vacancies')->where('title','LIKE','%'.$validatedData['query'].'%')
                ->paginate(2);

        $pagination = $vacancies->appends(array(
            'query' => $validatedData['query'],
        ));
        
        $vacanciesCount = DB::table('vacancies')->get();
        return view('pages.vacancies.index', compact('vacancies','vacanciesCount','pagination'));
    }

}
