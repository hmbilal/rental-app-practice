<?php

declare(strict_types=1);

namespace Tests\Feature\Ride;

use App\Events\RideCreated;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class RideControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_rides_screen_can_not_be_rendered_without_login()
    {
        $response = $this->get(route('dashboard.rides'));

        $response->assertStatus(302);
        $response->assertRedirectContains('login');
    }

    public function test_rides_screen_can_be_rendered_with_login()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('dashboard.rides'));

        $response->assertOk();
        $response->assertViewHas('rides');
    }

    public function test_rides_screen_has_data(): void
    {
        $totalRecords = 17;
        $rides = Ride::factory()->count($totalRecords)->create();
        $user = User::factory()->create(['is_active' => true]);

        $response = $this->actingAs($user)
            ->get(route('dashboard.rides'));

        $response->assertOk();
        $response->assertViewHas('rides');
        $content = $response->getOriginalContent();
        self::assertCount(3, $content->getData()['rides']);
        self::assertSame(17, $content->getData()['rides']->total());
    }

    public function test_create_ride(): void
    {
        Event::fake();

        $this->assertDatabaseCount('rides', 0);

        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post(
                route('dashboard.rides.store'),
                [
                    'hourly_rate' => 5,
                    'day_rate' => 10,
                    'no_of_doors' => 4,
                    'color' => 'Red',
                    'is_active' => true,
                ]
            );

        $response->assertStatus(302);
        $response->assertRedirectContains('rides');
        $this->assertDatabaseCount('rides', 1);

        Event::assertDispatched(RideCreated::class);
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function test_create_ride_with_invalid_data(
        array $payload,
        array $errorFields,
        array $validFields,
    ): void
    {
        Event::fake();

        $user = User::factory()->create();
        $this->actingAs($user)
            ->post(
                route('dashboard.rides.store'),
                $payload
            )
        ->assertSessionHasErrors($errorFields)
        ->assertSessionDoesntHaveErrors($validFields);

        $this->assertDatabaseCount('rides', 0);

        Event::assertNotDispatched(RideCreated::class);
    }

    private function invalidDataProvider(): array
    {
        return [
            // case 1
            [
                [
                    'hourly_rate' => -5,
                    'day_rate' => -5,
                    'no_of_doors' => 4,
                    'is_active' => true,
                    'picture' => UploadedFile::fake()->image('avatar.jpg'),
                ],
                [
                    'hourly_rate',
                    'day_rate',
                ],
                [
                    'no_of_doors',
                    'is_active',
                    'picture',
                ],
            ],
            // case 2
            [
                [
                    'hourly_rate' => 0,
                    'day_rate' => 0,
                    'no_of_doors' => 4,
                    'is_active' => true,
                    'picture' => UploadedFile::fake()->image('avatar.jpeg'),
                ],
                [
                    'hourly_rate',
                    'day_rate'
                ],
                [
                    'no_of_doors',
                    'color',
                    'is_active',
                    'picture',
                ],
            ],
            // case 3
            [
                [
                    'hourly_rate' => 5,
                    'day_rate' => 50,
                    'no_of_doors' => -5,
                    'color' => 123,
                    'is_active' => true,
                    'picture' => UploadedFile::fake()->image('avatar.jpeg')->size(10240),
                ],
                [
                    'no_of_doors',
                    'picture',
                ],
                [
                    'hourly_rate',
                    'day_rate',
                    'color',
                    'is_active',
                ]
            ],
            // case 4
            [
                [
                    'hourly_rate' => 5,
                    'day_rate' => 50,
                    'no_of_doors' => 0,
                    'is_active' => null,
                    'picture' => UploadedFile::fake()->image('avatar.gif'),
                ],
                [
                    'is_active',
                    'picture',
                ],
                [
                    'hourly_rate',
                    'day_rate',
                    'no_of_doors',
                ]
            ],
            // case 5
            [
                [
                    'hourly_rate' => 5,
                    'day_rate' => 50,
                    'no_of_doors' => 2,
                    'color' => 'Yellow',
                    'is_active' => 1,
                    'picture' => UploadedFile::fake()->image('document.pdf'),
                ],
                [
                    'picture',
                ],
                [
                    'hourly_rate',
                    'day_rate',
                    'no_of_doors',
                    'color',
                    'is_active',
                ]
            ],
        ];
    }
}
