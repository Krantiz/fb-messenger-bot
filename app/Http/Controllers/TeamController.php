<?php 

namespace IndianSuperLeague\Http\Controllers;

use IndianSuperLeague\Team;
use IndianSuperLeague\Player;

use IndianSuperLeague\Http\Requests;
use IndianSuperLeague\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class TeamController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields  */


		$this->filter = \DataFilter::source(Team::with('players'));

		$this->filter->add('name', 'Team', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('name', 'Name', true);
		$this->grid->add('about','About');
		$this->grid->add('url','Website');
		$this->grid->add('synonyms','Synonyms');
		// $this->grid->add('is_active','Active Status', true);
		$this->addStylesToGrid();


        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields  */


		$this->edit = \DataEdit::source(new \IndianSuperLeague\Team());

		$this->edit->label('Edit Team');
		$this->edit->add('name', 'Team', 'text');
		$this->edit->add('about', 'About', 'text');
		$this->edit->add('url', 'Website', 'text');
		$this->edit->add('synonyms', 'Synonyms (E.g.- syn1, syn2, syn3)', 'text');
		// $this->edit->add('is_active', 'Active Status', 'checkbox');


        return $this->returnEditView();
    }    
}
