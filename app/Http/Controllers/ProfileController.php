<?php

namespace App\Http\Controllers;

use App\Forms\Elements\ButtonElement;
use App\Forms\Elements\GroupElement;
use App\Forms\Elements\HiddenElement;
use App\Forms\Elements\LinkElement;
use App\Forms\Elements\StaticElement;
use App\Forms\Elements\TextElement;
use App\Forms\Form;
use App\Forms\Schema;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'random' => uniqid(),
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'updateProfileInformationForm' => new Form(
                endpoint: route('profile.update'),
                schema: new Schema([
                    new HiddenElement('emailVerified', value: $request->user()->hasVerifiedEmail() ? 'yes' : 'no'),
                    new HiddenElement('status', value: session('status')),
                    new TextElement('name', value: $request->user()->name),
                    new TextElement('email', value: $request->user()->email),
                    new GroupElement('verifyEmail', new Schema([
                        new StaticElement('info', content: 'Your email address must be verified.'),
                        new LinkElement('link', route('verification.send'), 'Click here to re-send the verification email.', 'post', conditions: [['status', '!=','verification-link-sent']]),
                        new StaticElement('emailSent', content: 'A new verification link has been sent to your email address.', conditions: [['status', 'verification-link-sent']]),
                    ]),
                    conditions: [['emailVerified', 'no']],
                    ),
                    new ButtonElement('submit'),
                ]),
                method: 'PATCH',
            ),
            'updatePasswordForm' => new Form(
                endpoint: route('password.update'),
                schema: new Schema([
                    new TextElement('current_password', label: 'Current Password', attrs: ['type' => 'password']),
                    new TextElement('password', label: 'New Password', attrs: ['type' => 'password']),
                    new TextElement('password_confirmation', label: 'Confirm Password', attrs: ['type' => 'password']),
                    new ButtonElement('update_password','Update Password'),
                ]),
                method: 'PUT',
            ),
            'status' => session('status'),
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

        return Redirect::route('profile.edit')->with('success', 'Profile updated.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
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
