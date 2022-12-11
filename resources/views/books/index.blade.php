@extends('layouts.app')

@section('title' , 'Books')

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

        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-2">
                    <div class="card cardhov my-2">
                        {{ $book->getFirstMedia() }}

                        <div class="card-body">
                            <h5 class="card-title" >{{ $book['name'] }}</h5>

                            @if (auth()->user()->hasRole('user'))
                            <form action="{{ route('add_book_to_cart', $book) }}" method="POST">
                                @csrf
                            {{-- <h3><a href="{{ route('books.create') }}" class="text-primary ">Add more!</a></h3> --}}
                            <button type="submit" class="d-block circled btn btn-sm" style="background-color: yellow">Add To Cart</button>
                            </form>
                            @endif
                            <a href="{{ route('books.show', $book) }}" class="text-primary"> show more
                                info
                            </a>
                            <div class="row my-2">

                                @if (auth()->user()->hasRole('admin'))
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $books->withQueryString() }}
        </div>
    </div>
@endsection
@push('css')
    <style>
        .card:hover {
            border-radius: 0.75rem;
            border-color: #161C34;
            transition-delay: 0.1s
        }
        .btn-circle.btn-xl {
			width: 50px;
			height: 100px;
			padding: 0px;
			border-radius: 50%;
            display: inline-block;
			font-size: 5px;
			text-align: center;
		}
        .circled{
            border-radius: 70%;
        }
        h1 {
            color: #161C34;
        }
    </style>
@endpush
