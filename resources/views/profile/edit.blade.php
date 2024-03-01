@extends('layouts.dashboard')
@section('title')
    Профиль
@endsection
@section('content')
    <div class="col">
        @include('profile.partials.update-profile-information-form')
        @if ($user->id_company)
            @include('profile.partials.update-company-information')
        @endif
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
@endsection
