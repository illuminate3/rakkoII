<?php
namespace App\Modules\Shisan\Http\Controllers;

use App\Modules\Shisan\Http\Domain\Models\TechStatus;
use App\Modules\Shisan\Http\Domain\Repositories\TechStatusRepository;

use Illuminate\Http\Request;
use App\Modules\Shisan\Http\Requests\DeleteRequest;
use App\Modules\Shisan\Http\Requests\TechStatusCreateRequest;
use App\Modules\Shisan\Http\Requests\TechStatusUpdateRequest;

use Datatables;
use Flash;

class TechStatusesController extends ShisanController {

	/**
	 * Status Repository
	 *
	 * @var Status
	 */
	protected $status;

	public function __construct(
			TechStatusRepository $status
		)
	{
		$this->status = $status;
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
		return View('shisan::tech_statuses.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('shisan::tech_statuses.create',  $this->status->create());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(
		TechStatusCreateRequest $request
		)
	{
		$this->status->store($request->all());

		Flash::success( trans('kotoba::general.success.status_create') );
		return redirect('admin/tech_statuses');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
// 		$status = $this->status->findOrFail($id);
//
// 		return View::make('HR::statuses.show', compact('status'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$modal_title = trans('kotoba::general.command.delete');
		$modal_body = trans('kotoba::general.ask.delete');
		$modal_route = 'admin.tech_statuses.destroy';
		$modal_id = $id;
		$model = '$status';

		return View('shisan::tech_statuses.edit',
			$this->status->edit($id),
				compact(
					'modal_title',
					'modal_body',
					'modal_route',
					'modal_id',
					'model'
			));
//		return View('shisan::tech_statuses.edit',  $this->status->edit($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(
		TechStatusUpdateRequest $request,
		$id
		)
	{
//dd("update");
		$this->status->update($request->all(), $id);

		Flash::success( trans('kotoba::general.success.status_update') );
		return redirect('admin/tech_statuses');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->status->find($id)->delete();

		return Redirect::route('admin.tech_statuses.index');
	}

	/**
	* Datatables data
	*
	* @return Datatables JSON
	*/
	public function data()
	{
//		$query = TechStatus::select(array('statuses.id','statuses.name','statuses.description'))
//			->orderBy('statuses.name', 'ASC');
//		$query = TechStatus::select('id', 'name' 'description', 'updated_at');
//			->orderBy('name', 'ASC');
		$query = TechStatus::select('id', 'name', 'description', 'updated_at');
//dd($query);

		return Datatables::of($query)
//			->remove_column('id')

			->addColumn(
				'actions',
				'
					<a href="{{ URL::to(\'admin/tech_statuses/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm" >
						<span class="glyphicon glyphicon-pencil"></span>  {{ trans("kotoba::button.edit") }}
					</a>
				'
				)

			->make(true);
	}


}
