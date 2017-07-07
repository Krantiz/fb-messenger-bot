<?php 

namespace LodhaStarter\Http\Controllers;

use LodhaStarter\Http\Requests;
use LodhaStarter\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

use LodhaStarter\SkarmaProject;

class SkarmaProjectController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new SkarmaProject);
        $this->filter->add('name', 'Project', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('name', 'Project');
		$this->grid->add('description', 'Description');
		$this->grid->add('img_url', 'Image');
		$this->grid->add('web_url', 'Web Link');
		$this->grid->add('started_at', 'Commence Year', true);
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new SkarmaProject());

		$this->edit->label('Skarma Project');

		$this->edit->add('name', 'Project', 'text')->rule('required');
	
		$this->edit->add('description', 'Description', 'text')->rule('required');

		$this->edit->add('img_url', 'Image URL', 'text');

		$this->edit->add('web_url', 'Web URL', 'text')->rule('required');

		$this->edit->add('started_at', 'Commence Year', 'date')->rule('required');

        return $this->returnEditView();
    }    
}
