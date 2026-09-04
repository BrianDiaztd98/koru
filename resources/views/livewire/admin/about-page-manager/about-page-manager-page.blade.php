<div class="space-y-6" x-data="{ activeTab: 'copy' }">
    @include('livewire.admin.partials.page-header', [
        'eyebrow' => 'Identity & Content',
        'title' => 'About Section',
        'description' => 'Configure core copywriting and media structures.',
    ])

    @include('livewire.admin.about-page-manager.create.about-section-create-form')

    @if ($showDeleteModal && $about)
        @include('livewire.admin.partials.delete-modal', [
            'title' => 'Delete About section',
            'entity' => 'the About section',
            'confirmAction' => 'deleteConfirmed',
            'cancelAction' => 'closeDeleteModal',
        ])
    @endif
</div>



