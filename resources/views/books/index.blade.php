@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ config('app.name') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('My Books') }}
                    </h2>
                    <h3><a href="{{ route('books.create') }}" class="text-primary ">Add more!</a></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-2">
                <div class="card cardhov my-2">

                    <img src="{{ $book->image }}" alt="" width="100%">

                    <div class="card-body">
                        <h5 class="card-title">{{ $book['name'] }}</h5>
                        <a href="{{ route('books.show', $book) }}" class="text-primary"> show more
                            info
                        </a>
                        <div class="row my-2">
                            <div class="col">
                                <a class="btn ma-2" href="{{ route('books.edit', $book->id) }}"
                                    style="background-color: #161C34; color:white;">
                                    Edit
                                </a>
                            </div>
                            <div class="col">

                                <!-- Trigger the modal with a button -->
                                <form action="{{ route('books.destroy', $book) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background-color: #F36B2A; color:white;" class="btn mb-2"
                                        type="submit" data-toggle="modal" data-target="#exampleModal">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $books->withQueryString() }}
    </div>
@endsection
@push('css')
    <style>
        .card:hover {
            border-radius: 0.75rem;
            border-color: #161C34;
            transition-delay: 0.1s
        }

        h1 {
            color: #161C34;
        }
    </style>
@endpush
