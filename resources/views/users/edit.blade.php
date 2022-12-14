@extends('layouts.app')

@section('title', 'Edit User')
@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" @endpush
    @push('js') <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 100
            });
        });
    </script> @endpush
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
                            {{ __('Edit User') }}
                        </h2>
                </div>
            </div>
        </div>
        <div class="justify-content-end">
            <form action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
            </form>
        </div>
    </div>


    <div class="page-body">
        <div class="container-xl">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        {{ $message }}
                    </div>
                  </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div> @endif
    <form action="{{ route('users.update', $user) }}" method="POST" class="card" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">

        <div class="mb-3">
            <label class="form-label required">{{ 'First Name' }}</label>
            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                placeholder="{{ 'First Name' }}" value="{{ old('first_name', $user->first_name) }}" required>
        </div>
        @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label required">{{ 'Last Name' }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                placeholder="{{ 'Last Name' }}" value="{{ old('last_name', $user->last_name) }}" required>
        </div>
        @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label required">{{ 'Phone Number' }}</label>
            <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                placeholder="{{ 'Phone Number' }}" value="{{ old('phone', $user->phone) }}" required>
        </div>
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label required">{{ 'Address' }}</label>
            <input type="address" name="address" class="form-control @error('address') is-invalid @enderror"
                placeholder="{{ 'Address' }}" value="{{ old('address', $user->address) }}" required>
        </div>
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <div class="mb-3">

            <div class="mb-3">
                <label class="form-label required">{{ __('Image') }}</label>
                <div class="col-md-3 pb-3">
                    {{ $user->GetFirstMedia() }}
                </div>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                    id="image" accept="image/*" value="{{ old('image') }}" multiple>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </form>


</div>
</div>
@endsection
