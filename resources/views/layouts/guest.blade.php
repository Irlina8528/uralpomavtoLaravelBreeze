@extends('layouts.app')

@section('content')
        <div>
            <div>
                {{ $slot }}
            </div>
        </div>
@endsection
