<div class="min-h-screen bg-gray-100">
    @include('layouts.admin_navigation')
    <div class="flex space-x-4">

        <sidebar />


        <main class="flex-1">
            <div class="max-w-6xl mx-auto">

                {{ $slot }}
            </div>
        </main>
    </div>
</div>