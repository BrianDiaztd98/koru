<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Team extends Component
{
    public array $teamMembers = [];

    public int $perPage = 4;

    public int $page = 1;

    public function mount(array $teamMembers = []): void
    {
        $this->teamMembers = $teamMembers;
    }

    public function getVisibleTeamMembersProperty(): array
    {
        $slice = array_slice($this->teamMembers, ($this->page - 1) * $this->perPage, $this->perPage);

        return array_values($slice);
    }

    public function setPage(int $page): void
    {
        $maxPage = max(1, (int) ceil(count($this->teamMembers) / $this->perPage));
        $this->page = max(1, min($maxPage, $page));
    }

    public function nextPage(): void
    {
        $maxPage = (int) ceil(count($this->teamMembers) / $this->perPage);
        $this->page = min($maxPage, $this->page + 1);
    }

    public function previousPage(): void
    {
        $this->page = max(1, $this->page - 1);
    }

    public function render()
    {
        return view('livewire.components.team', [
            'visibleTeamMembers' => $this->visibleTeamMembers,
            'page' => $this->page,
            'totalPages' => max(1, (int) ceil(count($this->teamMembers) / $this->perPage)),
        ]);
    }
}
