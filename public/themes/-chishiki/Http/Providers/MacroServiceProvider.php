<?php

namespace App\Modules\Chishiki\Providers;

use Illuminate\Support\ServiceProvider;

use Html;
use Lang;


class MacroServiceProvider extends ServiceProvider
{


	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{


		function renderNode($node, $mode) {
dd($mode);

			if($mode == 'plain') {
				$classLi = '';
				$classUl = '';
				$classSpan = '';
			}
			else{
				$classLi = 'list-group-item';
				$classUl = 'list-group';
				$classSpan = 'glyphicon text-primary';
			}

			if( empty($node['children']) ) {
				//glyphicon for closed entries
				if($mode != 'plain')
					$classSpan .= ' glyphicon-chevron-right';
				return '<li class="' . $classLi . '"> <a href="' . url('categories/' . $node['id']) . '">' . '<span class="' . $classSpan . '"></span>' . $node['slug'] . '</a></li>';
			} else {
				//$html = "Anzahl Kinder von:". $node['name'] . ' -> ' . count($node['children']);
				//glyphicon for opened entries
				if($mode != 'plain')
					$classSpan .= ' glyphicon-chevron-down';
				$html = '<li class="' . $classLi . '"><a href="' . url('categories/' . $node['id']) . '">' . '<span class="' . $classSpan . '"></span>' . $node['slug'] . '</a>';
				$html .= '<ul class="' . $classUl . '">';

				foreach($node['children'] as $child)
					$html .= renderNode($child, $mode);

				$html .= '</ul>';
				$html .= '</li>';
			}

			return $html;
	}


		function categoryTable($node, $lang) {
//print_r($node);

			$title = $node->translate($lang)->title;
			if ($node['depth'] > 0) {
				$title = str_repeat('&nldr;', $node['depth']) . ' ' . $node['parent']['title'] . ' > ' . $title;
			}

			if( empty($node['children']) ) {

				return '<li> empty child <a href="' . url('categories/' . $node['slug']) . '">' . $title . '</a></li>';

			} else {

				$html = '<tr>';

				$html .= '<td><a href="' . url('/admin/categories/' . $node['id']) . '">' . $title . '</a></td>';

				$html .= '<td>' . $node['slug'] . '</td>';

				$html .= '<td>';
				$html .= '
					<a href="/admin/categories/' . $node['id'] . '/edit" class="btn btn-success" title="' . trans("kotoba::button.edit") . '">
						<i class="fa fa-pencil fa-fw"></i>' . trans("kotoba::button.edit") . ' ' . Lang::choice("kotoba::general.category", 1) . '
					</a>
						';
				$html .= '
					<a href="/admin/categories/' . $node['id'] . '" class="btn btn-info" title="' . trans("kotoba::button.view") . '">
						<i class="fa fa-search fa-fw"></i>' . trans("kotoba::button.view") . ' ' . Lang::choice("kotoba::shop.item", 2) . '
					</a>
						';
// 				$html .= '
// 					<a href="/admin/items/create/' . $node['id'] . '" class="btn btn-primary" title="' . trans("kotoba::button.new") . '">
// 						<i class="fa fa-plus fa-fw"></i>' . trans("kotoba::button.new") . ' ' . Lang::choice("kotoba::shop.item", 1) . '
// 					</a>
// 						';
				 $html .= '</td>';

				$html .= '</tr>';

				foreach($node['children'] as $child) {
					$html .= categoryTable($child, $lang);
				}

			}

			return $html;
	}


		function sideTable($node, $lang) {
//dd($node);

			$title = $node->translate($lang)->title;
			if ($node['depth'] > 0) {
				$title = str_repeat('>', $node['depth']) . ' ' . $title;
			}

			if( empty($node['children']) ) {

				return '<li> empty child <a href="' . url('categories/' . $node['slug']) . '">' . $title . '</a></li>';

			} else {

				$html = '<tr>';

				$html .= '<td><a href="' . url('/admin/categories/' . $node['id']) . '">' . $title . '</a></td>';

//				$html .= '<td>' . $node['slug'] . '</td>';

				$html .= '<td>';
				$html .= '
					<a href="/admin/categories/' . $node['id'] . '/edit" class="btn btn-success" title="' . trans("kotoba::button.edit") . '">
						<i class="fa fa-pencil fa-fw"></i>
					</a>
						';
				$html .= '
					<a href="/admin/categories/' . $node['id'] . '" class="btn btn-info" title="' . trans("kotoba::button.view") . '">
						<i class="fa fa-search fa-fw"></i>
					</a>
						';
				$html .= '
					<a href="/admin/items/create/' . $node['id'] . '" class="btn btn-primary" title="' . trans("kotoba::button.new") . '">
						<i class="fa fa-plus fa-fw"></i>
					</a>
						';
				 $html .= '</td>';

				$html .= '</tr>';

				foreach($node['children'] as $child) {
					$html .= sideTable($child, $lang);
				}

			}

			return $html;
	}


	Html::macro('sideNodes', function($nodes, $mode) {
		return sideTable($nodes, $mode);
	});

	Html::macro('categoryNodes', function($nodes, $lang) {
		return categoryTable($nodes, $lang);
	});


	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}


}
