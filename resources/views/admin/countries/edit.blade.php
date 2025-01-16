<x-admin-layout>
    <h1> edit user </h1>
    <x-splade-form :default="$country" method="PUT" :action="route('admin.country.update',$country)"
        class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="name" label="name" />
        <x-splade-input name="Country_code" label="lastNameCountry_code" />

        <x-splade-submit />
    </x-splade-form>
</x-admin-Layout>