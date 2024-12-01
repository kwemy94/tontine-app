<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with(['status'=> 'profile-updated', 'success' => 'Informations enregistrées !']);
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

    public function uploadAvatar(Request $request){
        // dd($request->all());
        $user = Auth::user();

        try {
            if (!is_null($request->avatar)) {
                $profilImage = $request->file('avatar');
                $profilName = time().'.'.$profilImage->extension();
                #$request->avatar->storeAs('dashboard-template/dist/img', $profilName);
                $request->avatar->move(public_path('images/profil'), $profilName);
                
                $oldPath = public_path('images/profil/'.$user->avatar);
                if ($user->avatar && file_exists($oldPath)) {
                    unlink($oldPath);
                }
                DB::table('users')
                ->where('id', $user->id)
                ->update(['avatar' => $profilName]);
            }
           
        } catch (\Throwable $th) {
            dd($th);
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Erreur survenue !'
            // ]);
        }
        // return response()->json([
        //     'success' => true,
        //     'path' => ''
        // ]);
        return redirect()->back()->with('success', 'Profil misee à jour !');
    }
}
