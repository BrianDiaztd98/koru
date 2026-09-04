<?php

namespace Tests\Feature;

use App\Livewire\Admin\TeamMembersManager\TeamMembersManager;
use App\Livewire\Components\Team;
use App\Models\TeamMember;
use App\Models\User;
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
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('team_members', [
            'name' => 'Dr. Maya Rivera',
            'instagram_handle' => '@maya',
            'bio_en' => 'Expert in recovery and mobility.',
            'specialty_en' => 'Physical Therapy',
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

    public function test_team_showcase_paginates_in_groups_of_four(): void
    {
        $teamMembers = collect(range(1, 5))->map(fn (int $index) => [
            'id' => $index,
            'name' => 'Specialist '.$index,
            'instagram' => null,
            'specialty' => 'Specialty '.$index,
            'image' => 'image-'.$index.'.jpg',
        ])->all();

        Livewire::test(Team::class, ['teamMembers' => $teamMembers])
            ->assertSee('Specialist 1')
            ->assertSee('Specialist 4')
            ->assertDontSee('Specialist 5')
            ->assertSee('Next')
            ->call('nextPage')
            ->assertSee('Specialist 5')
            ->assertDontSee('Specialist 1');
    }
}
