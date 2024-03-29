<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClasseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClasseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClasseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Classe::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/classe');
        CRUD::setEntityNameStrings('classe', 'classes');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('annee_academique_id');
        $this->crud->setColumnDetails('annee_academique_id', ['attribute' => 'libelle']);
        CRUD::column('niveau_id');
        $this->crud->setColumnDetails('niveau_id', ['attribute' => 'libelle']);
        CRUD::column('specialite_id');
        $this->crud->setColumnDetails('specialite_id', ['attribute' => 'libelle']);

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
        CRUD::setValidation(ClasseRequest::class);

        CRUD::addField([
            'name'    => 'niveau_id',
            'label'   => 'Niveau',
            'type'    => 'select',
            'entity'    => 'niveau',
            'model'     => "App\Models\Niveau",
            'attribute' => 'libelle',
            'options' => (function ($query) {
                return $query->orderBy('libelle', 'ASC')->get();
            }),
        ]);

        CRUD::addField([
            'name'    => 'specialite_id',
            'label'   => 'Spécialité',
            'type'    => 'select',
            'entity'    => 'specialite',
            'model'     => "App\Models\Specialite",
            'attribute' => 'libelle',
            'options' => (function ($query) {
                return $query->orderBy('libelle', 'ASC')->get();
            }),
        ]);

        CRUD::addField([
            'name'    => 'annee_academique_id',
            'label'   => 'Année Académique',
            'type'    => 'select',
            'entity'    => 'annee_academique',
            'model'     => "App\Models\AnneeAcademique",
            'attribute' => 'libelle',
            'options' => (function ($query) {
                return $query->orderBy('libelle', 'ASC')->get();
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
