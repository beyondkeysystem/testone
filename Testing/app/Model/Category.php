<?php
class Category extends AppModel{

	public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Category Name is required'
            )
        ),
        'meta_title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Meta Title is required'
            )
        )
    );

    public function get_categories_sortorderby_asc(){

        /* Fetch All Categories */
        $categories = $this->find('all',array(
                            'order'=>array(
                                'sort_order'
                            )
                        ));
        return $categories;

    }
}
?>