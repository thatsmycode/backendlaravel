<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FitaFetaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FitaFetaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FitaFetaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\FitaFeta::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/fita-feta');
        CRUD::setEntityNameStrings('fita feta', 'fita fetas');
    }


    protected function setupListOperation()
    {
        CRUD::column('jugador_id')->label('Jugador')->type('select')->entity('jugador')->attribute('id')->model('App\Models\Jugador');
        CRUD::column('fita_id')->label('Fita')->type('select')->entity('fita')->attribute('id')->model('App\Models\Fita');


     
    }

   
    protected function setupCreateOperation()
    {
        CRUD::setValidation(FitaFetaRequest::class);

        CRUD::field('jugador_id')->label('Jugador')->type('select')->entity('jugador')->attribute('id')->model('App\Models\Jugador');
        CRUD::field('fita_id')->label('Fita')->type('select')->entity('fita')->attribute('id')->model('App\Models\Fita');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
