<x-admin-layout>

    <div class="flex justify-between items-center p-4">
        <div class="text-2xl font-semibold">
            Department
        </div>
        <div>
            <a href="{{route('admin.department.create')}}"
                class="px-3 py-2 text-white text-sm bg-blue-500 hover:bg-blue-700 rounded color-wh ">
                Create department
            </a>
        </div>
    </div>


    </div>
    <x-splade-table :for="$departments">
        @cell('actions',$department)
        <a href="{{route('admin.department.edit',$department)}}"
            class="px-3 py-2 text-white bg-green-400 hover:bg-green-700 rounded color-wh ">
            EDIT
        </a>

        <Link href="{{route('admin.department.destroy',$department)}}" method="DELETE"
            class=" m-1 px-3 py-2 text-white bg-red-400 hover:bg-red-700 rounded color-wh "
            confirm="Enter the danger zone..." confirm-text="Are you sure?" confirm-button="Yes, take me there!"
            cancel-button="No, keep me save!" href="/danger"> DELETED</Link>

        @endcell
    </x-splade-table>
</x-admin-Layout>