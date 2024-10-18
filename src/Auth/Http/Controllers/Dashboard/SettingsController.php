<?php

namespace Nahad\Foundation\Auth\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nahad\Foundation\Auth\Http\Requests\Dashboard\Settings\DefaultsRequest;
use Nahad\Foundation\Auth\Models\OrganizationalPost;
use Nahad\Foundation\Auth\Models\Role;
use Nahad\Foundation\Auth\Models\Settings;
use Nahad\Foundation\Dashboard\Models\Option;
use Nahad\Foundation\Dashboard\Support\Alert;

class SettingsController extends Controller {
    public function defaultsGet() {
        $this->authorize('defaults', Settings::class);

        $options = Option::getAll([
            'two_step_login_client',
            'two_step_login_sms',
        ]);

        $roles = Role::all();

        $organizationlPosts = OrganizationalPost::with('organizationPostRoles')
            ->get();

        return view('auth::dashboard.settings.defaults', [
            'roles' => $roles,
            'options' => $options,
            'organization_posts' => $organizationlPosts
        ]);
    }

    public function defaultsPost(DefaultsRequest $request) {
        $this->authorize('defaults', Settings::class);

        Option::set('two_step_login_client', $request->boolean('two_step_login_client'));
        Option::set('two_step_login_sms', $request->get('two_step_login_sms'));

        $this->saveLdapData($request);

        Alert::add('تنظیمات با موفقیت اعمال گردید', Alert::SUCCESS);

        return redirect()->back();
    }

    private function saveLdapData($request) {
        $organizationalPosts = OrganizationalPost::all();

        foreach($organizationalPosts as $organizationalPost) {
            $organizationalPost->roles()->sync($request->input("organizational_post_roles.$organizationalPost->id", []));
        }
    }
}