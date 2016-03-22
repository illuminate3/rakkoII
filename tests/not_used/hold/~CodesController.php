<?php

namespace App\Modules\Horitsu\Http\Controllers;

use App\Modules\Horitsu\Http\Models\Code;
use App\Modules\Horitsu\Http\Repositories\CodeRepository;

use Illuminate\Http\Request;
use App\Modules\Horitsu\Http\Requests\CodeCreateRequest;
use App\Modules\Horitsu\Http\Requests\CodeUpdateRequest;
use App\Modules\Horitsu\Http\Requests\DeleteRequest;

//use Datatables;
use Flash;
use Redirect;
use Session;
use Theme;


class CodesController extends HoritsuController {

	/**
	 * Code Repository
	 *
	 * @var Code
	 */
	protected $code;

	public function __construct(
			Code $code,
			CodeRepository $code_repo
		)
	{
		$this->code = $code;
		$this->code_repo = $code_repo;
// middleware
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
		$codes = $this->code->all();
//dd($codes);

		return Theme::View('modules.horitsu.codes.index',
			compact(
				'lang',
				'codes'
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

		return Theme::View('modules.horitsu.codes.create',
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
		CodeCreateRequest $request
		)
	{
		$this->code_repo->store($request->all());

		Flash::success( trans('kotoba::hr.success.code_create') );
		return redirect('admin/codes');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
// 		$code = $this->code_repo->findOrFail($id);
//
// 		return View::make('HR::codes.show', compact('code'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$code = $this->code->find($id);
		$lang = Session::get('locale');
//dd($lang);

		$modal_title = trans('kotoba::general.command.delete');
		$modal_body = trans('kotoba::general.ask.delete');
		$modal_route = 'admin.codes.destroy';
		$modal_id = $id;
		$model = '$code';

		return Theme::View('modules.horitsu.codes.edit',
			compact(
				'code',
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
		CodeUpdateRequest $request,
		$id
		)
	{
//dd("update");
		$this->code_repo->update($request->all(), $id);

		Flash::success( trans('kotoba::hr.success.code_update') );
		return redirect('admin/codes');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->code->find($id)->delete();

		Flash::success( trans('kotoba::hr.success.code_delete') );
		return Redirect::route('admin.codes.index');
	}


	/**
	* Datatables data
	*
	* @return Datatables JSON
	*/
	public function data()
	{
//		$query = Code::select(array('codes.id','codes.name','codes.description'))
//			->orderBy('codes.name', 'ASC');
//		$query = Code::select('id', 'name' 'description', 'updated_at');
//			->orderBy('name', 'ASC');
		$query = Code::select('id', 'name', 'description', 'updated_at');
//dd($query);

		return Datatables::of($query)
//			->remove_column('id')

			->addColumn(
				'actions',
				'
					<a href="{{ URL::to(\'admin/codes/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm" >
						<span class="glyphicon glyphicon-pencil"></span>  {{ trans("kotoba::button.edit") }}
					</a>
				'
				)

			->make(true);
	}

}
