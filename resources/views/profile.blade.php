<x-app-layout>
    <x-slot name="header">
        <h2 class="bg-emerald-dark font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">

            <div class="p-4 sm:p-8 bg-emerald-ligher dark:bg-emerald-dark shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
