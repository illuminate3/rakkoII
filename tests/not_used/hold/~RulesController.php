<?php

namespace App\Modules\Horitsu\Http\Controllers;

use App\Modules\Horitsu\Http\Models\Rule;
use App\Modules\Horitsu\Http\Repositories\RuleRepository;

use Illuminate\Http\Request;
use App\Modules\Horitsu\Http\Requests\RuleCreateRequest;
use App\Modules\Horitsu\Http\Requests\RuleUpdateRequest;
use App\Modules\Horitsu\Http\Requests\DeleteRequest;

//use Datatables;
use Flash;
use Redirect;
use Session;
use Theme;


class RulesController extends HoritsuController {

	/**
	 * Rule Repository
	 *
	 * @var Rule
	 */
	protected $rule;

	public function __construct(
			Rule $rule,
			RuleRepository $rule_repo
		)
	{
		$this->rule = $rule;
		$this->rule_repo = $rule_repo;
// middleware
		$this->middleware('auth');
		$this->middleware('admin');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lang = Session::get('locale');
		$rules = $this->rule->all();
//dd($rules);

		return Theme::View('modules.horitsu.rules.index',
			compact(
				'lang',
				'rules'
				));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$lang = Session::get('locale');
//dd($lang);

		return Theme::View('modules.horitsu.rules.create',
			compact(
				'lang'
		));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(
		RuleCreateRequest $request
		)
	{
//dd($request);
		$this->rule_repo->store($request->all());

		Flash::success( trans('kotoba::hr.success.rule_create') );
		return redirect('admin/rules');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
// 		$rule = $this->rule_repo->findOrFail($id);
//
// 		return View::make('Horitsu::rules.show', compact('rule'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rule = $this->rule->find($id);
		$lang = Session::get('locale');

		$modal_title = trans('kotoba::general.command.delete');
		$modal_body = trans('kotoba::general.ask.delete');
		$modal_route = 'admin.rules.destroy';
		$modal_id = $id;
		$model = '$rule';

		return Theme::View('modules.horitsu.rules.edit',
			compact(
				'rule',
				'lang',
				'modal_title',
				'modal_body',
				'modal_route',
				'modal_id',
				'model'
		));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(
		RuleUpdateRequest $request,
		$id
		)
	{
//dd("update");
		$this->rule_repo->update($request->all(), $id);

		Flash::success( trans('kotoba::hr.success.rule_update') );
		return redirect('admin/rules');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->rule->find($id)->delete();

		Flash::success( trans('kotoba::hr.success.rule_delete') );
		return Redirect::route('admin.rules.index');
	}


	/**
	* Datatables data
	*
	* @return Datatables JSON
	*/
	public function data()
	{
//		$query = Rule::select(array('rules.id','rules.name','rules.description'))
//			->orderBy('rules.name', 'ASC');
//		$query = Rule::select('id', 'name' 'description', 'updated_at');
//			->orderBy('name', 'ASC');
		$query = Rule::select('id', 'name', 'description', 'updated_at');
//dd($query);

		return Datatables::of($query)
//			->remove_column('id')

			->addColumn(
				'actions',
				'
					<a href="{{ URL::to(\'admin/rules/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm" >
						<span class="glyphicon glyphicon-pencil"></span>  {{ trans("kotoba::button.edit") }}
					</a>
				'
				)

			->make(true);
	}

}
