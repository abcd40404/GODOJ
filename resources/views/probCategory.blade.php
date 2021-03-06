@extends('layout')

@section('head')
    <link rel="stylesheet" href="css/category.css" type="text/css">
    <script src="/js/category.js"></script>
@stop


@section('content')
    <div class="toolbar">
        <div class="contest-page"> Contests </div>
        <div class="category-page"> Category </div>
    </div>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="dp col-lg-4"><img src="/img/DP.png"></div>
                <div class="greedy col-lg-4"><img src="/img/GREEDY.png"></div>
                <div class="graph col-lg-4"><img src="/img/GRAPH.png"></div>
            </div>
            <div class="row">
                <div class="math col-lg-4"><img src="/img/MATH.png"></div>
                <div class="string col-lg-4"><img src="/img/STRING.png"></div>
                <div class="other col-lg-4"><img src="/img/OTHER.png"></div>
            </div>
        </div>
    </main>

@stop
