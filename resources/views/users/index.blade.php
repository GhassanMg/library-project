@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Users') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Created at') }}</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td >
                                    <div class="d-flex py-1 align-items-center">
                                      <span class="avatar me-2">{{ $user->GetFirstMedia() }}</span>
                                      <div class="flex-fill">
                                        <div class="font-weight-medium"><a href="{{ route('profile.show',$user) }}" class="text-reset">{{ $user->first_name }}</a></div>
                                        <div class="text-muted"><a href="{{ route('profile.show',$user) }}" class="text-reset">{{ $user->last_name }}</a></div>
                                      </div>
                                    </div>
                                  </td>
                                <td class="text-muted">{{ $user->phone }}</td>
                                <td class="text-muted">{{ $user->address }}</td>
                                <td class="text-muted">{{ $user->created_at->diffForhumans() }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if( $users->hasPages() )
                <div class="card-footer pb-0">
                    {{ $users->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
