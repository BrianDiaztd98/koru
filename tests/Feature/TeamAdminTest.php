<?php

namespace Tests\Feature;

use App\Livewire\Admin\TeamMembersManager\TeamMembersManager;
use App\Livewire\Components\LandingPage;
use App\Livewire\Components\Team;
use App\Models\TeamMember;
use App\Models\User;
use Database\Seeders\KoruContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TeamAdminTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsAdmin(): User
    {
        $user = User::factory()->admin()->create();
        $this->actingAs($user, 'web');

        return $user;
    }

    public function test_admin_team_page_is_accessible(): void
    {
        $this->actingAsAdmin();

        $response = $this->get(route('admin.team.index'));

        $response->assertStatus(200);
        $response->assertSee('Team Management');
    }

    public function test_admin_can_create_a_team_member(): void
    {
        $this->actingAsAdmin();

        Livewire::test(TeamMembersManager::class)
            ->set('name', 'Dr. Maya Rivera')
            ->set('instagram_handle', '@maya')
            ->set('bio_en', 'Expert in recovery and mobility.')
            ->set('specialty_en', 'Physical Therapy')
            ->set('card_description_en', 'Recovery and mobility specialist.')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('team_members', [
            'name' => 'Dr. Maya Rivera',
            'instagram_handle' => '@maya',
            'bio_en' => 'Expert in recovery and mobility.',
            'specialty_en' => 'Physical Therapy',
            'card_description_en' => 'Recovery and mobility specialist.',
            'active_status' => true,
        ]);
    }

    public function test_admin_can_edit_a_team_member(): void
    {
        $this->actingAsAdmin();

        $teamMember = TeamMember::query()->create([
            'name' => 'Original Name',
            'instagram_handle' => '@original',
            'bio_en' => 'Original bio.',
            'specialty_en' => 'Original Specialty',
            'active_status' => true,
        ]);

        Livewire::test(TeamMembersManager::class)
            ->call('openEditForm', $teamMember->id)
            ->assertSet('teamMember.id', $teamMember->id)
            ->set('name', 'Updated Name')
            ->set('bio_en', 'Updated bio.')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('team_members', [
            'id' => $teamMember->id,
            'name' => 'Updated Name',
            'bio_en' => 'Updated bio.',
        ]);
    }

    public function test_admin_can_store_optional_social_profile_links(): void
    {
        $this->actingAsAdmin();

        Livewire::test(TeamMembersManager::class)
            ->set('name', 'Grecia')
            ->set('instagram_handle', '@greciareyes')
            ->set('instagram_url', 'http://instagram.com/greciavreyes?stkn=MzFkdGI5a2RheHAw')
            ->set('linkedin_url', 'https://www.linkedin.com/in/greciavreyes')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('team_members', [
            'name' => 'Grecia',
            'instagram_handle' => '@greciareyes',
            'instagram_url' => 'http://instagram.com/greciavreyes?stkn=MzFkdGI5a2RheHAw',
            'linkedin_url' => 'https://www.linkedin.com/in/greciavreyes',
        ]);
    }

    public function test_admin_can_store_long_social_profile_links_without_truncation(): void
    {
        $this->actingAsAdmin();

        $longLinkedInUrl = 'https://www.linkedin.com/authwall?trkInfo=AQHBKEcgl4AHKwAAAaDKDsoQBU8v1pyd1r_3b1tJfWWdm_w7iZXhs1lbOcGq44u_IVv74xVBeWQ_DliH3yqM2VG8zM30dQ4htvRsOj2Lx6Draf0fLWUMDE-urax0F3PUH7MSb60=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fpierreahmar%3Futm_source%3Dshare_via%26utm_content%3Dprofile%26utm_medium%3Dmember_ios';

        Livewire::test(TeamMembersManager::class)
            ->set('name', 'Pierre')
            ->set('instagram_handle', '@fisiopierre')
            ->set('linkedin_url', $longLinkedInUrl)
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('team_members', [
            'name' => 'Pierre',
            'linkedin_url' => $longLinkedInUrl,
        ]);
    }

    public function test_instagram_handle_requires_valid_format(): void
    {
        $this->actingAsAdmin();

        Livewire::test(TeamMembersManager::class)
            ->set('name', 'Dr. Maya Rivera')
            ->set('instagram_handle', 'invalid handle!!')
            ->call('save')
            ->assertHasErrors(['instagram_handle']);

        Livewire::test(TeamMembersManager::class)
            ->set('name', 'Dr. Maya Rivera')
            ->set('instagram_handle', '@maya.rivera')
            ->call('save')
            ->assertHasNoErrors();
    }

    public function test_seeded_team_members_include_current_staff_photos(): void
    {
        $this->artisan('db:seed', ['--class' => KoruContentSeeder::class])
            ->assertExitCode(0);

        $this->assertDatabaseHas('team_members', [
            'name' => 'Lenys Fernández',
            'image_path' => 'img/team/KORU_Lenys_Fernandez_HD.jpg.jpeg',
            'active_status' => true,
        ]);

        $this->assertDatabaseHas('team_members', [
            'name' => 'Raúl Díaz',
            'image_path' => 'img/team/KORU_Raul_Diaz_HD.jpg.jpeg',
            'active_status' => true,
        ]);

        $this->assertDatabaseHas('team_members', [
            'name' => 'Pierre Ahmar',
            'image_path' => 'img/team/KORU_Pierre_Ahmar_HD.jpg.jpeg',
            'active_status' => true,
        ]);

        $this->assertDatabaseHas('team_members', [
            'name' => 'Angie Gálvez',
            'image_path' => 'img/team/KORU_Angie_Galvez_HD.jpg.jpeg',
            'active_status' => true,
        ]);

        $this->assertDatabaseHas('team_members', [
            'name' => 'Grecia Reyes',
            'image_path' => 'img/team/KORU_Grecia_Reyes_HD.jpg.jpeg',
            'active_status' => true,
        ]);

        $this->assertDatabaseCount('team_members', 5);
    }

    public function test_landing_page_team_order_matches_requested_staff_sequence(): void
    {
        $seedMembers = [
            'Angie Gálvez',
            'Raúl Díaz',
            'Lenys Fernández',
            'Pierre Ahmar',
            'Grecia Reyes',
        ];

        foreach ($seedMembers as $name) {
            TeamMember::query()->create([
                'name' => $name,
                'instagram_handle' => '@'.$name,
                'bio_en' => 'Team bio for '.$name,
                'specialty_en' => 'Specialty',
                'image_path' => 'img/team/'.$name.'.jpg',
                'active_status' => true,
            ]);
        }

        $orderedNames = array_column(Livewire::test(LandingPage::class)->instance()->getTeamMembersProperty(), 'name');

        $this->assertSame($seedMembers, $orderedNames);
    }

    public function test_team_showcase_paginates_in_groups_of_five_without_losing_members(): void
    {
        $teamMembers = [
            [
                'id' => 1,
                'name' => 'Angie Galvez',
                'instagram' => '@angietherapy',
                'specialty' => 'Mobility coach',
                'bio' => 'Angie specializes in sports massage, using targeted manual techniques to enhance athletic performance, speed up recovery, and reduce the risk of sports injuries.',
                'image' => 'angie.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Raúl Díaz',
                'instagram' => '@rauldiazfisio',
                'specialty' => 'Rehab specialist',
                'bio' => 'Raúl focuses on biomechanical assessment and functional rehabilitation to help patients recover with confidence.',
                'image' => 'raul.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Lenys Fernández',
                'instagram' => '@lenysftto',
                'specialty' => 'Recovery specialist',
                'bio' => 'Lenys helps athletes recover with targeted therapy and movement-based treatment plans.',
                'image' => 'lenys.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Pierre Ahmar',
                'instagram' => '@fisiopierre',
                'specialty' => 'Performance specialist',
                'bio' => 'Pierre combines manual therapy, therapeutic exercise, and myofascial release to treat musculoskeletal injuries and post-operative rehabilitation.',
                'image' => 'pierre.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Grecia Reyes',
                'instagram' => '@greciareyes',
                'specialty' => 'Wellness specialist',
                'bio' => 'Grecia uses movement as the foundation of care to prevent injuries and help patients recover safely.',
                'image' => 'grecia.jpg',
            ],
        ];

        Livewire::test(Team::class, ['teamMembers' => $teamMembers])
            ->assertSee('Angie Galvez')
            ->assertSee('Raúl Díaz')
            ->assertSee('Lenys Fernández')
            ->assertSee('Pierre Ahmar')
            ->assertSee('Grecia Reyes')
            ->assertDontSee('Next');

        Livewire::test(Team::class, ['teamMembers' => $teamMembers])
            ->assertSet('visibleTeamMembers.0.name', 'Angie Galvez')
            ->assertSet('visibleTeamMembers.4.name', 'Grecia Reyes')
            ->assertSet('page', 1)
            ->assertSet('totalPages', 1);
    }
}
