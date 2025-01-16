<x-admin-layout>
    <h1> creat user </h1>
    <x-splade-form method="POST" :action=" route('admin.country.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="Country_code" label="Country_code" />
        <x-splade-input name="name" label="name" />
        <x-splade-submit />
    </x-splade-form>
</x-admin-Layout>