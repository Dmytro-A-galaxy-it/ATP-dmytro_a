<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BusModelRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BusModelCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BusModelCrudController extends CrudController
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
        CRUD::setModel(\App\Models\BusModel::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/bus-model');
        CRUD::setEntityNameStrings('bus model', 'bus models');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if(!backpack_user()->can('bus-models')) {
            abort(403);
        }

        CRUD::addColumn([
            'name' => 'deg_namber',
            'label' => 'Number Bus',
            'type' => 'text'
        ]);

        CRUD::addColumn([
            'name' => 'brand.brand',
            'type' => 'text',
            'wrapper' => [
                'href' => function($crud, $column, $model){
                    return backpack_url("car-brand/{$model->brand_id}/show");
                }
            ]
        ]);

        CRUD::addColumn([
            'name' => 'drive_model.name',
            'type' => 'text',
            'wrapper' => [
                'href' => function($crud, $column, $model) {
                    return backpack_url("drive-model/{$model->drive_id}/show");
                }
            ]
        ]);

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
        CRUD::setValidation(BusModelRequest::class);

        CRUD::addField([
            'name' => 'deg_namber',
            'label' => 'Number Bus',
            'type' => 'text'
        ]);
        
        CRUD::addField([
            'name' => 'brand_id',
            'type' => 'select',
            'entity' => 'brand',
            'attribute' => 'brand'
        ]);

        CRUD::addField([
            'name' => 'drive_id',
            'type' => 'select',
            'entity' => 'drive_model',
            'attribute' => 'name'
        ]);

        //CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
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

    protected function setupShowOperation(){
        $this->setupListOperation();
    }
}
