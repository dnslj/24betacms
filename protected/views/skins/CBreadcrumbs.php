<?php
return array(
    'default' => array(
        'homeLink' => '<li>' . l('首页', BetaBase::siteHomeUrl()) . '<span class="divider">/</span></li>',
        'separator' => '&nbsp;',
        'tagName' => 'ul',
        'htmlOptions' => array('class'=>'breadcrumb'),
        'activeLinkTemplate' => '<li><a href="{url}">{label}</a><span class="divider">/</span></li>',
        'inactiveLinkTemplate' => '<li>{label}</li>',
    ),
    'member' => array(
        'homeLink' => '<li>' . l('会员中心', BetaBase::memberHomeUrl()) . '<span class="divider">/</span></li>',
        'separator' => '&nbsp;',
        'tagName' => 'ul',
        'htmlOptions' => array('class'=>'breadcrumb'),
        'activeLinkTemplate' => '<li><a href="{url}">{label}</a><span class="divider">/</span></li>',
        'inactiveLinkTemplate' => '<li>{label}</li>',
    ),
);