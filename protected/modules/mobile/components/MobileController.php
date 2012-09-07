<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class MobileController extends CController
{
	public function setSiteTitle($value)
	{
        $titles = array(param('sitename'));
        if (param('shortdesc'))
            array_push($titles, param('shortdesc'));
        if (!empty($value))
    	    array_unshift($titles, $value);

        $text = strip_tags(trim(join(' - ', $titles)));
	    $this->pageTitle = $text;
	}
}