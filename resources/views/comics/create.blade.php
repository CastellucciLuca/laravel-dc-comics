@extends('layouts.app')

@section('title', "Create new product")

@section('main-app')
    <div>
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12">
                    <form action="{{ route('comics.store') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error )
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">
                                Title
                            </label>
                            <input type="text" class="form-control" name="title" value="{{$comic->title ?? old('title')}}" >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Description
                            </label>
                            <textarea name="description" class="form-control" value="{{$comic->description ?? old('description')}}"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Thumb
                            </label>
                            <input type="text" class="form-control" name="thumb" value="{{$comic->thumb ?? old('thumb')}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Price
                            </label>
                            <input type="text" class="form-control" name="price" value="{{$comic->price ?? old('price')}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Series
                            </label>
                            <input type="text" class="form-control" name="series" value="{{$comic->series ?? old('series')}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Sale Date
                            </label>
                            <input type="text" class="form-control" name="sale_date" value="{{$comic->sale_date ?? old('sale_date')}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Type
                            </label>
                            <input type="text" class="form-control" name="type" value="{{$comic->type ?? old('type')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection