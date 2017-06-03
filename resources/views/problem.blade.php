@extends('layout')

@section('head')
    <link rel="stylesheet" href="/css/problem.css" type="text/css">
@stop

@section('content')
    <div class="main">
        <div class="toolbar">
            <div class="problem-page"><a href="/probCategory"> Problem </a></div>
            <div class="submit"> Submit Code </div>
        </div>
        <div class="problem"> {{ $problem->title }}</div>
        <div class="header">
            <div class="timelim">Time limit: {{ $problem->time }} second</div>
            <div class="memlim">Memory limit: {{ $problem->memory }} megabytes</div>
            <div class="input">input: standard input</div>
            <div class="output">output: standard output</div>
        </div>
        <div class="content">
            <div class="statement">{{ $problem->content }}</div>
            <div class="inp_spec">
                <div class="section-title">Input</div>
                {{ $problem->inp_spec }}
            </div>
            <div class="out_spec">
                <div class="section-title">Output</div>
                {{ $problem->out_spec }}
            </div>
            <div class="example">
                <div class="section-title">Example</div>
                HERE
            </div>
        </div>
    </div>
@stop
