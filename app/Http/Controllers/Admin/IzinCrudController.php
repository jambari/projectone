<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IzinRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Izin;
/**
 * Class IzinCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class IzinCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Izin::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/izin');
        CRUD::setEntityNameStrings('Perizinan', 'Perizinan');
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
        $this->crud->setColumns(['karyawan_id' ,'jenis_perizinan', 'dari_tanggal', 'sampe_tanggal','keterangan','file']); 
        $this->crud->setColumnDetails('karyawan_id', ['label' => 'Nama Karyawan']);
        $this->crud->setColumnDetails('jenis_perizinan', ['label' => 'Jenis Perizinan']);
        $this->crud->setColumnDetails('sampe_tanggal', ['label' => 'Sampai Tanggal']);
        $this->crud->setColumnDetails('keterangan', ['label' => 'Ket']);
        $this->crud->enableDetailsRow();
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
        CRUD::setValidation(IzinRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField([
            'label'     => "Karyawan",
            'type'      => 'select2',
            'name'      => 'karyawan_id', // the db column for the foreign key

            // optional
            'entity'    => 'karyawan', // the method that defines the relationship in your Model
            'model'     => "App\Models\Karyawan", // foreign key model
            'attribute' => 'nama', // foreign key attribute that is shown to user
            // 'default'   => 2, // set the default value of the select2

                // also optional
            'options'   => (function ($query) {
                    return $query->orderBy('id', 'desc')->get();
                }), 
        ]);

        $this->crud->addField([   // select_from_array
            'name'        => 'jenis_perizinan',
            'label'       => "Jenis Perizinan",
            'type'        => 'select_from_array',
            'options'     => ['1' => 'alpa', '2' => 'izin', '3'=>'cuti', '4'=>'sakit'],
            'allows_null' => false,
            'default'     => '1',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        $this->crud->addField([
            'name' => 'dari_tanggal',
            'type' => 'date',
            'label' => "Dari Tanggal"
        ]);

        $this->crud->addField([
            'name' => 'sampe_tanggal',
            'type' => 'date',
            'label' => "Sampai Tanggal"
        ]);

        $this->crud->addField([
            'name' => 'keterangan',
            'type' => 'textarea',
            'label' => "Keterangan"
        ]);
        
        $this->crud->addField(
            [   // Upload
            'name'      => 'file',
            'label'     => 'Surat Keterangan',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
            // optional:
            //'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
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

    public function masuk() {
        return view('masuk');
    }

    public function showDetailsRow($id)
    {
        $file = Izin::find($id);
        return view('detailizin')->with(compact('file'));
    }

    
}
