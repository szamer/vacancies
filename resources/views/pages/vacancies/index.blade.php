@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row col-12 top_menu">
            <div class="col-2"></div>
            <div class="col-2 text-white .bg-info" > VACANCIES</div>
        </div>
        <div class="container d-flex">
            <div class="col-2"></div>
            <div class="col-2"> search </div>
            <div class="col-6"> 
                <div class="top_vacancies_bar d-flex justify-content-between">
                    <div class="">Available vacancies({{ count($vacancies)}})</div>
                    <div class="">pusto </div>
                    <a href="/vacancies/create">add new vacancies</a>
                </div>
                <div class="container" >
                    @foreach($vacancies as $vacancy)
                        <div class="row" ><h1>{{ $vacancy->title}}</h1></div>
                        <div class="row" >{{ $vacancy->location}} {{ $vacancy->salary}}</div>
                        <div class="row" >{{ $vacancy->description}}</div>
                        <div class="row" > 
                            <button type="button" class="btn btn-primary">
                                More details
                            </button>
                            <button type="button" class="btn btn-primary">
                                Apply
                            </button>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $vacancies->links() !!}
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

</div>
@endsection