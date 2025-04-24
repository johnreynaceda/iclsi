<div>
    <div class="w-96">
        {{ $this->form }}
    </div>
    <div class="mt-10 flex space-x-3">
        <x-button label="Submit Announcement" wire:click="submitAnnouncement" spinner="submitAnnouncement" green
            class="font-semibold" />
        <x-button label="Cancel" negative flat class="font-semibold" href="{{ route('teacher.announcements') }}" />
    </div>
</div>
