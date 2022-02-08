<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Notifications\EmailChangeNotification;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.account.profile'));
        $response->assertStatus(200);
    }

    public function test_update_profile()
    {
        $admin = Admin::factory()->create();
        $admin1 = Admin::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.account.profile'), $admin1->only([
            'name',
            'bio'
        ]));
        $response->assertStatus(302);
        $admin->refresh();
        $this->assertEquals($admin1->name, $admin->name);
    }

    public function test_avatar()
    {
        Storage::fake();
        $admin = Admin::factory()->create();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.account.avatar'), [
            'file' => UploadedFile::fake()->image('file.jpg')
        ]);
        $response->assertStatus(200);
        Storage::assertExists('admin/avatars/' . $admin->id . '.jpg');
    }

    public function test_email()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.account.email'));
        $response->assertStatus(200);

    }

    public function test_update_email()
    {
        Notification::fake();
        $admin = Admin::factory()->create();
        $admin1 = Admin::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.account.email'), $admin1->only([
            'email'
        ]));
        $response->assertStatus(302);
        Notification::assertSentTo(Notification::route('mail', $admin1->email), EmailChangeNotification::class);
    }

    public function test_email_verify()
    {
        Notification::fake();
        $admin = Admin::factory()->create();
        $admin1 = Admin::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.account.email'), $admin1->only([
            'email'
        ]));
        $response->assertStatus(302);
        Notification::assertSentTo(Notification::route('mail', $admin1->email), EmailChangeNotification::class, function ($notification) use ($admin) {
            $response = $this->actingAs($admin, 'admin')->get($notification->url);
            $response->assertSessionHasNoErrors();
            return true;
        });
    }

    public function test_password()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.account.password'));
        $response->assertStatus(200);
    }

    public function test_update_password()
    {
        $password = '12345678';
        $new_password = '23456789';
        $admin = Admin::factory()->create();
        $admin->password = Hash::make($password);
        $admin->save();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.account.password'), [
            'password' => $password,
            'new_password' => $new_password,
            'new_password_confirmation' => $new_password
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }
}
