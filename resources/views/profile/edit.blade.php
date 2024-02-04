@extends('layouts.app')
@section('content')
<section class="profil">
    <div class="title-div">
        <h2 class="profil__title">Профиль</h2>
    </div>

    @include('profile.partials.update-profile-information-form')

    <!-- @include('profile.partials.update-password-form') -->

    @include('profile.partials.delete-user-form')

</section>
@endsection