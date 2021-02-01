<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\JabatanRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class JabatanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class JabatanCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Jabatan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/jabatan');
        CRUD::setEntityNameStrings('jabatan', 'jabatan');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns
        $this->crud->setColumns(['nama' ,'gaji', 'tiap']);
        $this->crud->setColumnDetails('nama', ['label' => 'jabatan']);
        $this->crud->setColumnDetails('tiap', ['label' => 'dibayar per']);
        $this->crud->enableExportButtons();
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
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
        CRUD::setValidation(JabatanRequest::class);

        //CRUD::setFromDb(); // fields

        $this->crud->addField([
            'name'      => 'nama',
            'label'     => 'Jabatan',
            'type'      => 'text'
        ]);

        $this->crud->addField([
            'name'      => 'gaji',
            'label'     =>  'Gaji',
            'type'      =>  'number'
        ]);
        $this->crud->addField([   // select_from_array
            'name'        => 'tiap',
            'label'       => "Dibayar per",
            'type'        => 'select_from_array',
            'options'     => ['1' => 'jam', '2' => 'minggu', '3'=>'bulan', '4'=>'tahun','5'. 'sekali'],
            'allows_null' => false,
            'default'     => '1',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
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
}
