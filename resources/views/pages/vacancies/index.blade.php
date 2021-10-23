@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row col-12 top_menu">
            <div class="col-2"></div>
            <div class="col-2 text-white .bg-info" > VACANCIES</div>
        </div>
        <div class="col-2"></div>
        <div class="col-2"> search </div>
        <div class="col-6"> 
            <div class="top_vacancies_bar d-flex justify-content-between">
                <div class="">Available vacancies(10)</div>
                <div class="">pusto </div>
                <a href="#">add new vacancies</a>
            </div>
        </div>
        <div class="col-2"></div>
    </div>

</div>
@endsection