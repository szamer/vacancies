@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 top_menu ">
            <div class=" text-white .bg-info .text-uppercase offset-2 font-weight-bold align-middle h-100" > VACANCIES</div>
        </div>
        <div class="d-flex" id="vacancy_container">
            <div class="col-xs-12 col-md-2 offset-2" id="search_container">
                <div class="container ">
                    <form method="get" action="/search" enctype="multipart/form-data">
                    
                        <div id="filter_title">Filter Vacancies</div>
                        <div id="filter_hint">Keywords</div>
                        <input type="text" class="form-control" name="query" placeholder="Job Title, Keyword.." id="query">
                        <button class="btn btn-info text-uppercase green_button button w-100" type="submit" title="Filter results">
                            Filter results
                        </button>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-6"> 
                <div class="top_vacancies_bar d-flex justify-content-between">
                    <div id="available_count" >Available Vacancies ({{ count($vacanciesCount)}})</div>
                    <button class="btn btn-info text-uppercase button vacancy_button" type="submit">
                        <a href="/vacancies/create" class="text-uppercase">add new vacancy</a>
                    </button>
                </div>
                <div class="vacancy_container rounded" >
                    @foreach($vacancies as $vacancy)
                        <div class="vacancy_box shadow rounded" >
                            <div  ><p class="job_title">{{ $vacancy->title}}</p></div>
                            <div class="d-flex">
                                <div class="location"><i class="icon-map-marker"></i> {{ $vacancy->location}}</div>
                                <div class="salary"><i class="bi bi-currency-pound">{{ $vacancy->salary}}</i></div>
                            </div>
                            <div class=" description" >{{ $vacancy->description}}</div>
                            <div  > 
                                <button type="button" class="btn btn-primary text-uppercase grey_button button">
                                    More details
                                </button>
                                <button type="button" class="btn btn-primary text-uppercase green_button button">
                                    Apply
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                @if(isset($pagination) && !empty($pagination))
                <div class="d-flex justify-content-left mt-10">
                        {{ $pagination->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection