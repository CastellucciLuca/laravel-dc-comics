@extends('layouts.app')

@section('main-app')
<main>
    <h1>Dc Comics</h1>
    <table class="table table-hover">
        <div class="d-flex">
            <a class="ms-auto me-5 btn btn-primary" href="{{route('comic.create')}}">
                Create new product
            </a>
        </div>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Series</th>
            <th scope="col">Release Date</th>
            <th scope="col">Type</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @forelse ($comicList as $comic)
            <tr>
                <th scope="row">{{$comic->id}}</th>
                <td>{{$comic->title}}</td>
                <td>{{$comic->description}}</td>
                <td>{{$comic->price}}</td>
                <td>{{$comic->series}}</td>
                <td>{{$comic->sale_date}}</td>
                <td>{{$comic->type}}</td>
                <td>
                    <a href=" {{route('comic.show', $comic->id)}} " class="btn btn-primary">View</a>
                </td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</main>
@endsection