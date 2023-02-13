@extends('layouts.app')

@section('main-app')
<main>
    <img src="{{$singleComic->thumb}}" alt="">
    <h1>{{$singleComic->title}}</h1>
    <p>{{$singleComic->description}}</p>
    <h5>Price: {{$singleComic->price}} $</h5>
    <h5>Series: {{$singleComic->series}}</h5>
    <h5>Type: {{$singleComic->type}}</h5>
    <h5>Sale Date: {{$singleComic->sale_date}}</h5>
</main>
@endsection