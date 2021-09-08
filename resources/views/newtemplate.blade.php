<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white pl-2 overflow-hidden sm:rounded-lg">
                <div id="app">
                    <new-template :csrf-token="{{ csrf_token() }}"></new-template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
