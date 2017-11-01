<?php
namespace App\View\Helper;

use Cake\View\Helper\PaginatorHelper;

/**
 * BootstrapPaginator helper
 */
class BootstrapPaginatorHelper extends PaginatorHelper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'options' => [],
        'templates' => [
            'nextActive' => '<li class="page-item"><a rel="next" href="{{url}}" class="page-link">{{text}}</a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a href="" onclick="return false;" class="page-link">{{text}}</a></li>',
            'prevActive' => '<li class="page-item prev"><a rel="prev" href="{{url}}" class="page-link">{{text}}</a></li>',
            'prevDisabled' => '<li class="page-item prev disabled"><a href="" onclick="return false;" class="page-link">{{text}}</a></li>',
            'counterRange' => '{{start}} - {{end}} of {{count}}',
            'counterPages' => '{{page}} of {{pages}}',
            'first' => '<li class="page-item first"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'last' => '<li class="page-item last"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'current' => '<li class="page-item disabled"><a href="" class="page-link">{{text}}</a></li>',
            'ellipsis' => '<li class="ellipsis">&hellip;</li>',
            'sort' => '<a href="{{url}}" class="text-white">{{text}}</a>',
            'sortAsc' => '<a class="text-white" href="{{url}}">
                                {{text}}
                                <i class="icons8-collapse-arrow ml-3"></i>
                            </a>',
            'sortDesc' => '<a class="text-white" href="{{url}}">
                                {{text}}
                                <i class="icons8-expand-arrow ml-3"></i>
                            </a>',
            'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
            'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
        ]
    ];

}
