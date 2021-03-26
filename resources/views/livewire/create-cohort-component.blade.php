    <form wire:submit.prevent="save" class="flex flex-col">
        <label for="cohort-name">Cohort Name</label>
        <input wire:model="displayName" type="text" id="cohort-name"
            class="mb-5 border border-purple-300 rounded-lg focus:bg-purple-50 focus:border-purple-500"
            autocomplete="off">
        <div x-data="{showTooltip: false}" class="flex">
            <label for="course-title">Course Title</label>
            <div class="relative ml-3 float">
                <span x-on:mouseover="showTooltip = true" x-on:focus="showTooltip = true"
                    x-on:mouseout="showTooltip = false" x-on:blur="showTooltip = false" tabindex="0"
                    class="px-2 text-purple-900 border border-purple-900 rounded-full cursor-pointer bg-purple-50">i</span>
                <div x-show="showTooltip" class="absolute p-2 text-white transform translate-x-6 -translate-y-full bg-gray-800 w-96 rounded-xl bg-opacity-90">
                    Optional, if your cohort is based around a course, what is the course name?
                </div>
            </div>
        </div>
        <input wire:model="course" type="text" id="course-title"
            class="mb-5 border border-purple-300 rounded-lg focus:bg-purple-50 focus:border-purple-500"
            autocomplete="off">
        <div x-data="{showTooltip: false}" class="flex">
            <label for="course-url">Link To Course</label>
            <div class="relative ml-3 float">
            <span x-on:mouseover="showTooltip = true" x-on:focus="showTooltip = true"
                x-on:mouseout="showTooltip = false" x-on:blur="showTooltip = false" tabindex="0"
                class="px-2 text-purple-900 border border-purple-900 rounded-full cursor-pointer bg-purple-50">i</span>
                <div x-show="showTooltip" class="absolute p-2 text-white transform translate-x-6 -translate-y-full bg-gray-800 w-96 rounded-xl bg-opacity-90">
                    Optional, if your cohort is based around a course, write down the course url here
                </div>
                </div>
        </div>
        @error('did-not-create')
            <p><strong>There was an error processing your cohort</strong></p>
        @enderror
        <input wire:model="courseUrl" type="url" id="course-url"
            class="mb-5 border border-purple-300 rounded-lg focus:bg-purple-50 focus:border-purple-500"
            autocomplete="off">
        <input type="submit">
    </form>
