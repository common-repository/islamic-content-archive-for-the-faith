<?php
$opictf_categories_lang = array();

$opictf_lang_list = [
        "eng"=>[
                "title"=>"English",
                "link"=>"https://www.the-faith.com"
            ]
    ];

// ======================   Titles ==============================
												
$tfcategories["the_faith"] 		= array(
                                                    'title'=>"The Faith",
                                                    'url'=>"https://www.the-faith.com",
                                                    'logo'=>"the_faith.png",
                                                );

// =================== English ===========================


foreach ($opictf_lang_list as $key => $value) {
    $opictf_categories_lang[$key]['the_faith']['url']                    =  $value["link"];
    $opictf_categories_lang[$key]['the_faith']['cat']                    =  $value["link"].'/api/get_category_index/';
    $opictf_categories_lang[$key]['the_faith']['importurl']              =  $value["link"].'/api/get_category_posts/?slug=';   
}


?>