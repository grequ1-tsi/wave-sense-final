<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-t from-emerald-darker to-emerald-middler overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-emerald-light">
                    {{ __("Bem vindos") }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
