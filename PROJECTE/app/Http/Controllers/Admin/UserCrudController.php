<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Storage;
/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {   CRUD::column('id');
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('password');
        CRUD::column('img');
        

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
    CRUD::setValidation(UserRequest::class);

    CRUD::field('name');
    CRUD::field('email');
    CRUD::field('password');
    CRUD::field('img')->type('upload');
    
    /**
     * Fields can be defined using the fluent syntax or array syntax:
     * - CRUD::field('price')->type('number');
     * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
     */
}
protected function setupUpdateOperation()
{
    $this->setupCreateOperation();

    // Remove the browse field for image
    CRUD::removeField('img');
    CRUD::removeField('email');
    CRUD::removeField('password');

    
        // Call the parent function to set up the basic fields
       
    
        // Remove the browse field for image
      
        // Add a regular file input field for image
        CRUD::addField([
            'name' => 'img',
            'label' => 'Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'prefix' => 'uploads/images',
            'attributes' => [
                'onchange' => "document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0]);"
            ]
        ]);
    
        // Get the current entry
        $entry = $this->crud->getCurrentEntry();
    
        // Add an image preview field
        CRUD::addField([
            'name' => 'img_preview',
            'label' => 'Image Preview',
            'type' => 'text',
            'wrapperAttributes' => [
                'style' => 'display:block'
            ],
            'attributes' => [
                'id' => 'img_preview',
                'style' => 'max-width:200px;max-height:200px;'
            ],
            'value' => ($entry->img) ? '<img src="' . asset('storage/' . $entry->img) . '" style="max-width:200px;max-height:200px;">' : ''
        ]);
    
 
}
}