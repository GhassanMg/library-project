@extends('layouts.app')

@section('title' . ' - ' . $category->name)

@section('content')
    <section>
        <div class="container my-4">
            <div class="card my-3 shadow bg-white rounded">
                <div class="card-body">
                    <h1 class="card-title"> {{ $category->name }}</h1>
                </div>
            </div>
            <div class="card mb-3">

                {{ $category->GetFirstMedia() }}

                <div class="card-body">
                    <h1 class="card-title text-primary"> Basic Info </h1>
                    <p class="card-text">
                    <h4>Name :</h4> {{ $category->name }} <br>
                    <h4>Description :</h4> {{ $category->description }} <br>
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
