<x-layouts.admin title="Content Management" :dashboard="true" :activeTarget="$activeTarget">
    <livewire:admin.admin-panel-inicio />
    <livewire:admin.admin-panel-about :about="$about" />
    <livewire:admin.admin-panel-service-pillars 
        :categories="$categories" 
        :serviceGroups="$serviceGroups"
        :services="$services"
        lazy />
    <livewire:admin.admin-panel-booster-shots 
        :categories="$categories" 
        lazy />
    <livewire:admin.admin-panel-iv-therapy 
        :categories="$categories" 
        lazy />
</x-layouts.admin>
