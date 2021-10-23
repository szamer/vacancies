@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 top_menu ">
            <div class=" text-white .bg-info .text-uppercase offset-1 font-weight-bold align-middle h-100" > VACANCIES</div>
        </div>
        <div class="container d-flex" id="vacancy_container">
            <div class="col-3 offset-1 d-flex">
                <div class="container ">
                    <form method="POST" action="/search" enctype="multipart/form-data">
                    @csrf
                        <div class="font-weight-bold" id="filter_title">Filter Vacancies</div>
                        <div>Keywords</div>
                        <input type="text" class="form-control" name="search" placeholder="Job Title, Keyword.." id="search">
                        <button class="btn btn-info text-uppercase green_button button font-weight-bold w-100" type="submit" title="Filter results">
                            Filter results
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-6"> 
                <div class="top_vacancies_bar d-flex justify-content-between">
                    <div class="font-weight-bold">Available Vacancies ({{ count($vacanciesCount)}})</div>
                    <button class="btn btn-info text-uppercase button font-weight-bold" type="submit">
                        <a href="/vacancies/create" class="text-uppercase">add new vacancies</a>
                    </button>
                </div>
                <div class="container" >
                    @foreach($vacancies as $vacancy)
                        <div class="vacancy_box_shadow">
                            <div class="vacancy_box" >
                                <div class="row" ><p class="font-weight-bold">{{ $vacancy->title}}</p></div>
                                <div class="row" >{{ $vacancy->location}} <i class="bi bi-currency-pound">{{ $vacancy->salary}}</i></div>
                                <div class="row" >{{ $vacancy->description}}</div>
                                <div class="row" > 
                                    <button type="button" class="btn btn-primary text-uppercase grey_button button font-weight-bold">
                                        More details
                                    </button>
                                    <button type="button" class="btn btn-primary text-uppercase green_button button font-weight-bold">
                                        Apply
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-10">
                    {!! $vacancies->links() !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection