
@extends('layouts.app')

@section('content')
    <section class="profil">
        <div class="title-div">
            <h2 class="about__title">Профиль</h2>
        </div>

    <div >
        <div >
            <div >
                <div >
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- <div>
                <div >
                    @include('profile.partials.update-password-form')
                </div>
            </div> -->

            <div >
                <div >
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection