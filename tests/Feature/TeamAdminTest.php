<?php

namespace Tests\Feature;

use App\Livewire\Admin\TeamMembersPage;
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

        Livewire::test(TeamMembersPage::class)
            ->set('name', 'Dr. Maya Rivera')
            ->set('instagram_handle', '@maya')
            ->set('bio_en', 'Expert in recovery and mobility.')
            ->set('bio_es', 'Experta en recuperación y movilidad.')
            ->set('specialty_en', 'Physical Therapy')
            ->set('specialty_es', 'Fisioterapia')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('team_members', [
            'name' => 'Dr. Maya Rivera',
            'instagram_handle' => '@maya',
            'bio_en' => 'Expert in recovery and mobility.',
            'bio_es' => 'Experta en recuperación y movilidad.',
            'specialty_en' => 'Physical Therapy',
            'specialty_es' => 'Fisioterapia',
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
            'bio_es' => 'Biografía original.',
            'specialty_en' => 'Original Specialty',
            'specialty_es' => 'Especialidad original',
            'active_status' => true,
        ]);

        Livewire::test(TeamMembersPage::class)
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
}
