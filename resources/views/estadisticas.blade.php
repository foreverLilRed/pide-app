@extends('layouts.plantilla2')

@section('title')
    <title>Estadisticas</title>
@endsection

@section('contenido')
<div class="container">
    <div class="border border-primary mx-auto p-3">
        <h1>{{ $chart->options['chart_title'] }}</h1>
        {!! $chart->renderHtml() !!}
    </div>
    <div class="border border-primary mx-auto p-3">
        <h1>{{ $chart2->options['chart_title'] }}</h1>
        {!! $chart2->renderHtml() !!}
    </div>
    <div class="border border-primary mx-auto p-3">
        <h1>{{ $chart3->options['chart_title'] }}</h1>
        {!! $chart3->renderHtml() !!}
    </div>
</div>

@endsection

@section('scripts')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
{!! $chart2->renderChartJsLibrary() !!}
{!! $chart2->renderJs() !!}
{!! $chart3->renderChartJsLibrary() !!}
{!! $chart3->renderJs() !!}
@endsection
