@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header my-3 d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle px-2">
                        {{ config('app.name') }}
                    </div>
                    <h2 class="page-title px-2">
                        {{ __('My Cart') }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="card my-3 shadow bg-white rounded">
            <div class="card-body">
                <h1 class="card-title d-inline "><span class="text-primary">User :</span> <span class="text-secondary"> {{ $user->first_name }} </span></h1>
                <h1 class="card-title d-inline px-5 "><span class="text-primary">Total :</span> <span class="text-secondary"> {{ $cart->total }} </span></h1>
                <h1 class="card-title d-inline px-5 "><span class="text-primary">Items Count :</span> <span class="text-secondary "> {{  $cart->cart_items_count  }} </span></h1>
            </div>
        </div>

        <div class="row">
            @foreach ($books as $item)
                <div class="col-md-2">
                    <div class="card cardhov my-2">

                        {{ $item->GetFirstMedia() }}

                        <div class="card-body">
                            <h5 class="card-title ">{{ $item['name'] }}</h5>
                            <h6 class="card-title">Quantity : {{ $item['quantity'] }}</h6>
                            <a href="{{ route('books.show', $item) }}" class="text-primary"> show more
                                info
                            </a>
                            <div class="row my-2">
                                <div class="col p-right-1">
                                    <a class="btn ma-2 btn-success"
                                        style="background-color: color:white;">
                                        +
                                    </a>
                                </div>
                                <div class="col">

                                    <!-- Trigger the modal with a button -->
                                    <form  method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background-color: color:white;" class="btn mb-2 btn-danger"
                                            type="submit" data-toggle="modal" data-target="#exampleModal">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </div>
        {{-- <div class="row justify-content-center">
            {{ $cart_items->withQueryString() }}
        </div> --}}
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
