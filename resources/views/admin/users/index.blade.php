<x-admin-layout>
    <h1> Users </h1>

    <div>



        <x-splade-table :for="$users">
            @cell('actions',$user)
            <a href="{{route('admin.users.edit',$user)}}"
                class="px-3 py-2 text-white bg-green-400 hover:bg-green-700 rounded color-wh ">
                Edit
            </a>
            <a href="{{route('admin.users.destroy',$user)}}"
                class=" m-1 px-3 py-2 text-white bg-red-400 hover:bg-red-700 rounded color-wh ">
                delete
            </a>
            @endcell
        </x-splade-table>
</x-admin-Layout>