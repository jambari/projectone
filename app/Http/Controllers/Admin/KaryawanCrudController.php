<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KaryawanRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class KaryawanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class KaryawanCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Karyawan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/karyawan');
        CRUD::setEntityNameStrings('karyawan', 'karyawan');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->setColumns(['nama' ,'alamat', 'tanggal_lahir', 'tempat_lahir', 'jabatan','nomor_hp','gaji']);
        $this->crud->setColumnDetails('nomor_hp', ['label' => 'HP']);
        $this->crud->enableExportButtons();
        //CRUD::addColumn(['name' => 'no_hp', 'label' => 'HP']); 
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
        CRUD::setValidation(KaryawanRequest::class);

            $this->crud->addField([
            'name' => 'nama',
            'type' => 'text',
            'label' => "Nama"
        ]);
            $this->crud->addField([
            'name' => 'nomor_hp',
            'type' => 'text',
            'label' => "Nomor HP"
        ]);

        $this->crud->addField([
            'name' => 'alamat',
            'type' => 'text',
            'label' => "Alamat"
        ]);

        $this->crud->addField([
            'name' => 'tanggal_lahir',
            'type' => 'date',
            'label' => "Tanggal lahir"
        ]);

        $this->crud->addField([
            'name' => 'tempat_lahir',
            'type' => 'text',
            'label' => "Tempat lahir"
        ]);

        $this->crud->addField([
            'label'     => "Jabatan",
            'type'      => 'select2',
            'name'      => 'jabatan', // the db column for the foreign key

            // optional
            'entity'    => 'jabatan', // the method that defines the relationship in your Model
            'model'     => "App\Models\Jabatan", // foreign key model
            'attribute' => 'nama', // foreign key attribute that is shown to user
            // 'default'   => 2, // set the default value of the select2

                // also optional
            'options'   => (function ($query) {
                    return $query->orderBy('id', 'desc')->get();
                }), 
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
