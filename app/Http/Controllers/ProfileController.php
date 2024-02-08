<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\CompanyProfileUpdateRequest;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $fieldsToUpdate = array_intersect_key($request->validated(), [
            'name' => '',
            'patronymic' => '',
            'surname' => '',
            'phone' => '',
            'email' => '',
            'passport_series' => '',
            'passport_number' => '',
            'address' => '',
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->update($fieldsToUpdate);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function company_update(CompanyProfileUpdateRequest $request): RedirectResponse
    {
        $fieldsToUpdate = array_intersect_key($request->validated(), [
            'company_inn' => '',
            'company_kpp' => '',
            'company_address' => '',
            'company_name' => '',
        ]);

        $request->user()->update($fieldsToUpdate);

        return Redirect::route('profile.edit')->with('status', 'profile-company-update');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
