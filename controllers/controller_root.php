<?php

namespace applications\form_testing{
    
    use \extensions\bootstrap_views as bs;
    
    /* Prevent direct access */
    defined('ADAPT_STARTED') or die;
    
    class controller_root extends controller{
        
        protected $_container;
        
        public function __construct(){
            parent::__construct();
            
            $this->_container = new bs\view_container();
            parent::add_view($this->_container);
        }
        
        public function view_default(){
            $view = new bs\view_row();
            $model = new model_data_type(23);
            $view->add($model->to_form());
            
            $this->add_view($view);
        }
        
        public function view_form(){
            $view = new bs\view_row();
            
        }
        
        public function view_step_test(){
            $step = new html_div(array('class' => 'step selected'));
            $step->add(new html_label('Step 1'));
            $step->add(new html_p('Hello world!'));
            $this->add_view($step);
            
            $step = new html_div(array('class' => 'step'));
            $step->add(new html_label('Step 2'));
            $this->add_view($step);
            
            $step = new html_div(array('class' => 'step'));
            $step->add(new html_label('Step 3'));
            $this->add_view($step);
            
            $step = new html_div(array('class' => 'step'));
            $step->add(new html_label('Step 4'));
            //$this->add_view($step);
            
            $form = new \extensions\forms\view_form('/', 'save', 'post', 'Test form', 'Welcome to the test form');
            $this->add_view($form);
            
            $page = new \extensions\forms\view_form_page('First page', 'And this would be the description.', 'Step 1', 'Hey there');
            $form->add($page);
            
            $section = new \extensions\forms\view_form_page_section('This is a section', 'This is the section description...');
            $page->add($section);
            
            $page = new \extensions\forms\view_form_page('Second page page', 'And this would be the description.', 'Step 2', 'Nice ;)');
            $form->add($page);
        }
        
        public function view_form_test(){
            $row = new \extensions\bootstrap_views\view_row();
            $this->add_view($row);
            
            $model = new \extensions\forms\model_form(1);
            //$this->add_view(new html_pre(print_r($model, true)));
            $row->add($model->get_view());
        }
        
        public function view_install(){
            $bundle = new \frameworks\adapt\bundle('adapt');
            $bundle->install();
            $bundle = new \frameworks\adapt\bundle('forms');
            $bundle->install();
            $bundle = new \frameworks\adapt\bundle('advanced_data_types');
            $bundle->install();
            //$bundle = new \frameworks\adapt\bundle('contacts');
            //$bundle->install();
        }
        
        public function add_view($view){
            $this->_container->add($view);
        }
        
        
    }
    
}

?>