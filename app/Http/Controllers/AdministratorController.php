<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Transport;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function createUsers()
    {
        $users = User::orderBy('id', 'asc')->get();
        $userTypes = UserType::all();

        return view('administrator.users', compact('users', 'userTypes'));
    }

    public function updateUsers(Request $request, $id)
    {
        $user = User::find($id);
        $user->id_usertype = $request->userType;

        $user->save();

        return redirect()->back();
    }

    public function createDrivers()
    {
        $drivers = Driver::orderBy('id', 'asc')->get();

        return view('administrator.drivers', compact('drivers'));
    }

    public function createDriver(Request $request)
    {
        Driver::create([
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'driver_license_number' => $request->driver_license_number,
            'passport_series' => $request->passport_series,
            'passport_number' => $request->passport_number,
        ]);

        return redirect()->back();
    }

    public function createTransports()
    {
        $transports = Transport::orderBy('id', 'asc')->get();

        return view('administrator.transports', compact('transports'));
    }

    public function createTransport(Request $request)
    {
        Transport::create([
            'mark' => $request->mark,
            'state_number' => $request->state_number,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'tonnage' => $request->tonnage
        ]);

        return redirect()->back();
    }
}
