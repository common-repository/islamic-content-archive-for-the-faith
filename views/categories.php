<?php
$TFHtml = new html_tf_helper();
global $tfcategories,$opictf_categories_lang;
 
$category_slug = esc_attr($_GET['cat_slug']);

$opictf_lang = get_option(OPICTF_Input_SLUG.'language');
$link = $opictf_categories_lang[$opictf_lang][$category_slug]['url'];
$jsoncaturl = $opictf_categories_lang[$opictf_lang][$category_slug]['cat'];
$slug = $category_slug.'_'.$opictf_lang;
$cat_options = $TFHtml->categoryFromTransient($jsoncaturl,$slug);
 
?>
<div class="category-head">
	<table width="100%">
		<tr>
			<td width="80px"><span class="category-logo"><?php echo opictf_cat_logo($category_slug,array('width'=>'80px','class'=>$category_slug)) ?></span></td>
			<td><h1 class="category-title"><a target="_blank" href="<?php echo $link; ?>"><?php echo $this->getLang($category_slug); ?></a></h1></td>
		</tr>
	</table>

</div>
<hr />
<?php
	echo $TFHtml->Input('checkbox',array('name'=>'category_'.$opictf_lang.'_'.$category_slug.'[]','options'=>$cat_options));
?>
