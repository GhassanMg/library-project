@extends('layouts.app')

@section('title' , $book->name)

@section('content')
    <section>
        <div class="container my-4">
            <div class="card my-3 shadow bg-white rounded">
                <div class="card-body">
                    <h1 class="card-title"> {{ $book->name }}</h1>
                </div>
            </div>
            <div class="card mb-3">

                <div class="col-md-3">
                    {{ $book->GetFirstMedia() }}
                </div>

                <div class="card-body">
                    <h1 class="card-title text-primary"> Basic Info </h1>
                    <p class="card-text">
                    <h4>Name :</h4> {{ $book->name }} <br>
                    <h4>DESCRIPTION :</h4> {!! $book->description !!} <br>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
<style scoped>
    h4 {
        display: inline;
    }

</style>
