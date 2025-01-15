<x-admin-layout>
    <h1> creat user </h1>
    <x-splade-form method="POST" :action=" route('admin.users.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="first_name" label="First Name" />

        <x-splade-input name="last_name" label="lastName" />
        <x-splade-input name="email" label="Email address" validation-key="email_address" />
        <x-splade-input type="password" name="password" label="password " validation-key="password" />
        <x-splade-input type="password" name="password_confirmation" label="Confirm Password"
            validation-key="password_confirmation" />

        <x-splade-submit />
    </x-splade-form>
</x-admin-Layout>