<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GithubUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use GrahamCampbell\GitHub\Facades\GitHub;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id)->with(['github'])->first();;

        return view('dashboard', compact('user'));
    }

    public function github()
    {
        return Socialite::driver('github')
            ->scopes(['repo'])
            ->redirect();
    }

    public function githubCallback(Request $request)
    {
        $user = Socialite::driver('github')->user();

        $github = GithubUser::firstOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'github_id' => $user->getId(),
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'html_url' => $user->user['html_url'],
                'api_url' => $user->user['url'],
                'avatar_url' => $user->getAvatar(),
                'token' => $user->token,
                'scopes' => json_encode($user->approvedScopes)
            ]
        );

        return redirect()->route('dashboard.index')->with('notification', [
            'success' => [
                'title' => $github->name,
                'content' => "You have successfully linked you're github!"
            ]
        ]);
    }
}
