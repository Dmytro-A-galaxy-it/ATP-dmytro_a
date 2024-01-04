<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DriveModelRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Carbon\Carbon;

/**
 * Class DriveModelCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DriveModelCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\DriveModel::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/drive-model');
        CRUD::setEntityNameStrings('drive model', 'drive models');

        if(backpack_user()->hasRole('Driver')) {
            $this->crud->query->where('user_id', backpack_user()->id);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if(!backpack_user()->can('drive-models')) {
            abort(403);
        }
        // CRUD::setFromDb(false); // set columns from db columns.

        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
            ]
        );

        CRUD::addColumn([
            'name' => 'surname',
            'label' => 'Surname',
            'type' => 'text'
        ]);

        CRUD::addColumn([
            'name' => 'birthday',
            'label' => 'birthday',
            'type' => 'date'
        ]);


        CRUD::addColumn([
            'name' => 'salary',
            'label' => 'Salary UAH',
            'type' => 'numeric'

        ]);

        CRUD::addColumn([
            'name' => 'age',
            'type' => 'number'
        ]);

        CRUD::addColumn([                
            'name' => 'photo',
            'type' => 'image',
            'disk' => 'public',
        ]);


        CRUD::addColumn([
            'name' => 'user.email',
            'label' => 'Email Adress',
            'type' => 'email'
        ]);

        CRUD::addColumn([
            'name' => 'user.name',
            'label' => 'System Name',
            'type' => 'text'
        ]);

        // CRUD::addColumn([
        //     'name' => 'deg_namber.name',
        //     'type' => 'text',
        //     'wrapper' => [
        //         'href' => function($crud, $column, $model) {
                    
        //             return backpack_url("drive-model/{$model->id}/show");
        //         }
        //     ]
        // ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DriveModelRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
            
        ]);

        CRUD::addField([
            'name' => 'surname',
            'label' => 'Surname',
            'type' => 'text'
            
        ]);

        CRUD::addField([
            'name' => 'birthday',
            'label' => 'BirthDay',
            'type' => 'date'
            
        ]);

        CRUD::addField([
            'name' => 'salary',
            'type' => 'number',
            'attributes' => [
                'step' => '0.01'
            ],
            'prefix' => 'UAH'
        ]);

        CRUD::addField([
            'name' => 'photo',
            'label' => 'Profile image', 
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);

        CRUD::addField([
            'name' => 'email',
            'label' => 'Email Adress',
            'type' => 'email'
        ]);

        CRUD::addField([
            'name' => 'user_id',
            'type' => 'select',
            'entity' => 'user',
            'attribute' => 'name'
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

}
