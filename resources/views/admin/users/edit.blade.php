<x-admin-layout>
    <h1> edit user </h1>
    <x-splade-form :default="$user" method="PUT" :action="route('admin.users.update',$user)"
        class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="first_name" label="First Name" />

        <x-splade-input name="last_name" label="lastName" />
        <x-splade-input name="email" label="Email address" validation-key="email_address" />



        <x-splade-submit />
    </x-splade-form>
</x-admin-Layout>