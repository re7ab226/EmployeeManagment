<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;

use Spatie\QueryBuilder\QueryBuilder;
class Users extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('first_name', 'LIKE', "%{$value}%")
                        ->orWhere('last_name', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });
        // return User::query();
        return QueryBuilder::for(User::class)
        ->defaultSort('first_name')
        ->allowedSorts(['id','first_name','last_name', 'email','created_at' ])
        ->allowedFilters(['first_name', 'email', 'last_name', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id','first_name','last_name','email'])
            ->column('id',sortable:true)
            ->column('first_name', sortable: true)
            ->column('last_name', sortable: true,hidden: true)//hidden by it self
            ->column('email', sortable: true)
            ->column('created_at', sortable: true)
            ->column('actions')
            // ->rowlink(function(User $user){
            //     return route('admin.users.show',$user);
                
            // })
            ->paginate(15);
         

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}