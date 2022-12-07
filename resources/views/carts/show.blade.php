@extends('layouts.app')

@section('title' . ' - ' . $cart->name)

@section('content')
    <section>
        <div class="container my-4">
            <div class="card my-3 shadow bg-white rounded">
                <div class="card-body">
                    <h1 class="card-title d-inline "><span class="text-primary">User :</span> <span class="text-secondary"> {{ $user->first_name }} </span></h1>
                    <h1 class="card-title d-inline px-5"><span class="text-primary">Total :</span> <span class="text-secondary"> {{ $cart->total }} </span></h1>
                    <h1 class="card-title d-inline px-5 "><span class="text-primary">Items Count :</span> <span class="text-secondary"> {{  $cart->cart_items_count  }} </span></h1>
                </div>
            </div>
            <div class="card mb-3">

                {{-- {{ $cart->GetFirstMedia() }} --}}

                <div class="card-body">
                    <h1 class="card-title text-primary">  </h1>
                    <p class="card-text">
                    <h4>User :</h4> {{ $user->first_name }} <br>
                    <h4>Total :</h4> {{ $cart->total }} <br>
                    <h4>Items Count :</h4> {{  $cart->cart_items_count  }} <br>
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
