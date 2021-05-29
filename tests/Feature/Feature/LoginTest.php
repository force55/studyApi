<?php

    namespace Tests\Feature\Feature;

    use App\Models\User;
    use Tests\TestCase;

    class LoginTest extends TestCase
    {
        public function testRequiresEmailAndLogin()
        {
            $this->json('POST', 'api/login')
                ->assertStatus(422)
                ->assertJson(
                    [
                        "message" => "The given data was invalid.",
                        'errors' => [
                            'email' => ['The email field is required.'],
                            'password' => ['The password field is required.'],
                        ],
                    ]
                );
        }


        public function testUserLoginsSuccessfully()
        {
            $user = User::factory()->create([
                'email' => 'testlogin@user.com',
                'password' => bcrypt('toptal123'),
            ]);

            $payload = ['email' => 'testlogin@user.com', 'password' => 'toptal123'];

            $this->json('POST', 'api/login', $payload)
                ->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'updated_at',
                        'api_token',
                    ],
                ]);

        }
    }
