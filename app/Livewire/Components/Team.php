<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Team extends Component
{
    public array $teamMembers = [];

    public int $perPage = 5;

    public int $page = 1;

    public function mount(array $teamMembers = []): void
    {
        $this->teamMembers = $teamMembers;
        $this->page = 1;
    }

    public function getVisibleTeamMembersProperty(): array
    {
        $start = ($this->page - 1) * $this->perPage;

        return array_values(array_slice($this->teamMembers, $start, $this->perPage));
    }

    public function getTotalPagesProperty(): int
    {
        return max(1, (int) ceil(count($this->teamMembers) / $this->perPage));
    }

    public function setPage(int $page): void
    {
        $maxPage = $this->getTotalPagesProperty();
        $this->page = max(1, min($maxPage, $page));
    }

    public function nextPage(): void
    {
        $this->setPage($this->page + 1);
    }

    public function previousPage(): void
    {
        $this->setPage($this->page - 1);
    }

    public function render()
    {
        return view('livewire.components.team', [
            'visibleTeamMembers' => $this->visibleTeamMembers,
            'page' => $this->page,
            'totalPages' => $this->getTotalPagesProperty(),
        ]);
    }
}
