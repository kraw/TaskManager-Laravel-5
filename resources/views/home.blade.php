@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tasks</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h4>Add Task</h4>
							<form id="formAddTask" method="POST" role="form" action="task">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					        	<div class="row">
						        	<div class="form-group col-md-12">
						        		<label for="content">Content</label>
						        		<textarea name="content" class="form-control" id="content">{!! old('content') !!}</textarea>
						        	</div>
						        	<div class="form-group col-md-4 col-md-offset-4">
						        		<input type="submit" value="Add" class="form-control btn btn-success">
						        	</div>	
						        	@if(Session::has('errors'))
							        	<div class="col-md-6 col-md-offset-3">		     	
								        	<div id="msgErrorAddTask" class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<strong>Erro!</strong> 
												@foreach(Session::get('errors')->all() as $errors)
													<p>{!! $errors !!}</p>
												@endforeach
											</div>
										</div>
									@endif
									@if(Session::has('status'))
										<div id="msgSuccessAddTask" class="col-md-6 col-md-offset-3 alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Success!</strong> Your Task was added successfully.
										</div>
									@endif									
								</div>
							</form>
						</div>
					</div>
					<div class="table-responsive">
						{!! $tasks->render() !!} 
						<table class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th>
										 <a href="/home">
										 	<span class="glyphicon glyphicon-chevron-up"></span>  ID
										 </a>
									</th>
									<th><a href="/home/user_id"><span class="glyphicon glyphicon-chevron-up"></span>  User</a></th>
									<th><a href="/home/content"><span class="glyphicon glyphicon-chevron-up"></span>  Content</a></th>
									<th>Options</th>									
									<th><a href="/home/created_at"><span class="glyphicon glyphicon-chevron-up"></span>  Created At</a></th>
									<th><a href="/home/updated_at"><span class="glyphicon glyphicon-chevron-up"></span>  Updated At</a></th>
								</tr>
							</thead>
							<tbody>
							@foreach($tasks as $task)
								<tr>
									<td>{!! $task->id !!}</td>
									<td>
										@if(Auth::user()->nome==$users[$task->user_id]) Me
										@else $users[$task->user_id]
										@endif
									</td>
									<td>{!! substr($task->content, 0, 10) !!}</td>
									<td>
										<a class="btn btn-primary" href="" role="button" data-toggle="modal" data-target="#modalEdit">Edit</a>
										<form action="/task/{!! $task->id !!}" method="POST">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input name="_method" type="hidden" value="DELETE">
											<input type="submit" class="btn btn-danger"  role="button" value="Delete" />
										</form>
									</td>
									<td>{!! date('d/m/Y H:i:s', strtotime($task->created_at))!!}</td>
									<td>
										@if(
										date('d/m/Y H:i:s', strtotime($task->updated_at)) == 
										date('d/m/Y H:i:s', strtotime($task->created_at)) 
										)
											It wasn't updated yet!
										@else date('d/m/Y H:i:s', strtotime($task->updated_at))
										@endif
									</td>
								</tr>
							@endforeach
							</tbody>							
						</table>		
					</div>
					<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						    <div class="modal-content">
							    <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        	<span aria-hidden="true">&times;</span>
							    	</button>
							        <h4 class="modal-title">Add Task</h4>
							    </div>
							    <div class="modal-body">
							        <form method="POST" role="form" action="" id="form-update-task">
							        	<div class="form-group">
							        		<label for="content">Content</label>
							        		<textarea class="form-control" id="content"></textarea>
							        	</div>
							        </form>
							    </div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button form="form-update-task" type="submit" class="btn btn-primary">Save changes</button>
							    </div>
						    </div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
			</div>
		</div>
	</div>
</div>
<!--<script type="text/javascript" src="js/task/crud.js"></script>-->
@endsection
