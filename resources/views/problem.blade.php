@extends('layout')

@section('head')
    <link rel="stylesheet" href="css/problem.css" type="text/css">
@stop

@section('content')
    <div class="main">
        <div class="toolbar">
            <div class="problem-page"> Problem </div>
            <div class="submit"> Submit Code </div>
        </div>
        <div class="problem">1</div>
        <div class="header">
            <div class="timelim">Time limit</div>
            <div class="memlim">Memory limit</div>
            <div class="input">input: standard input</div>
            <div class="output">output: standard output</div>
        </div>
        <div class="content">
            <div class="statement">sdfsdfs</div>
            <div class="inp_spec">
                <div class="section-title">Input</div>
                IN
            </div>
            <div class="out_spec">
                <div class="section-title">Output</div>
                HERE
            </div>
            <div class="example">
                <div class="section-title">Example</div>
                HERE
            </div>
        </div>
    </div>
@stop
