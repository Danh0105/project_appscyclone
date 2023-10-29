@extends("Admin.Home.Layout.app")
@section("header")
	<link type="text/css" href="/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" />
@endsection
@section("content")
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
				<h4 class="page-title">Dashboard</h4>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box table-responsive">
				<div class="row" style="display: flex;justify-content: center;">
					<ul class="nav nav-tabs tabs-bordered nav-justified">
						<li class="active">
							<a data-toggle="tab" href="#user1" aria-expanded="true">
								<span class="visible-xs"><i class="fa fa-home"></i></span>
								<span class="hidden-xs">
									<div class="card-box widget-box-two widget-two-success">
										<i class="mdi mdi-account-convert widget-two-icon"></i>
										<div class="wigdet-two-content text-white">
											<p class="text-uppercase font-600 font-secondary text-overflow m-0" title="User Today">User</p>
											<h2 class="text-white"><span data-plugin="counterup">895</span> <small><i
														class="mdi mdi-arrow-down text-danger"></i></small></h2>
											<p class="m-0"><b>Last:</b> 1250</p>
										</div>
									</div>
								</span>
							</a>
						</li>
						<li class="">
							<a data-toggle="tab" href="#item1" aria-expanded="false">
								<span class="visible-xs"><i class="fa fa-user"></i></span>
								<span class="hidden-xs">
									<div class="card-box widget-box-two widget-two-info">
										<i class="mdi mdi-chart-areaspline widget-two-icon"></i>
										<div class="wigdet-two-content text-white">
											<p class="text-uppercase font-600 font-secondary text-overflow m-0" title="Statistics">Items</p>
											<h2 class="text-white"><span data-plugin="counterup">34578</span> <small><i
														class="mdi mdi-arrow-up text-success"></i></small></h2>
											<p class="m-0"><b>Last:</b> 30.4k</p>
										</div>
									</div>
								</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="user1">
						<div class="row" style="display: flex;justify-content: right;margin:5px;">
							<a class="btn btn-primary waves-effect w-md waves-light" type="button"
								href="{{ route("dashboard.create") }}">View More</a>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-color panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">Recent Users</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table-hover m-0 table table">
												<thead>
													<tr>
														<th></th>
														<th>ID</i></th>
														<th>DATE</th>
														<th>ITEM</th>
														<th>Location</th>
														<th>REPORTER</th>
														<th>STATUS</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="/assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>0123456789</td>
														<td>15:36:14 UTC 2016-12-21</td>
														<td>DELL PC</td>
														<td>ACCOUNTING DEPARTMENT</td>
														<td>PHIL COLLIN</td>
														<td>OPEN</td>
													</tr>
												</tbody>
											</table>

										</div> <!-- table-responsive -->
									</div> <!-- end panel body -->
								</div>
								<!-- end panel -->
							</div>
							<!-- end col -->

						</div>
					</div>
					<div class="tab-pane active" id="item1">
						<div class="row" style="display: flex;justify-content: right;margin:5px;">
							<a class="btn btn-primary waves-effect w-md waves-light" type="button" href="{{ route("asset.index") }}">View
								More</a>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-color panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">Recent Items</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table-hover m-0 table table">
												<thead>
													<tr>
														<th></th>
														<th>ID</i></th>
														<th>DATE</th>
														<th>ITEM</th>
														<th>Location</th>
														<th>REPORTER</th>
														<th>STATUS</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th>
															<img class="thumb-sm img-circle" src="assets/images/users/avatar-6.jpg" alt="user">
														</th>
														<td>
															<h5 class="m-0">Louis Hansen</h5>
															<p class="text-muted font-13 m-0"><small>Web designer</small></p>
														</td>
														<td>+12 3456 789</td>
														<td>USA</td>
														<td>07/08/2016</td>
													</tr>

													<tr>
														<th>
															<span class="avatar-sm-box bg-primary">C</span>
														</th>
														<td>
															<h5 class="m-0">Craig Hause</h5>
															<p class="text-muted font-13 m-0"><small>Programmer</small></p>
														</td>
														<td>+89 345 6789</td>
														<td>Canada</td>
														<td>29/07/2016</td>
													</tr>

													<tr>
														<th>
															<img class="thumb-sm img-circle" src="assets/images/users/avatar-7.jpg" alt="user">
														</th>
														<td>
															<h5 class="m-0">Edward Grimes</h5>
															<p class="text-muted font-13 m-0"><small>Founder</small></p>
														</td>
														<td>+12 29856 256</td>
														<td>Brazil</td>
														<td>22/07/2016</td>
													</tr>

													<tr>
														<th>
															<span class="avatar-sm-box bg-pink">B</span>
														</th>
														<td>
															<h5 class="m-0">Bret Weaver</h5>
															<p class="text-muted font-13 m-0"><small>Web designer</small></p>
														</td>
														<td>+00 567 890</td>
														<td>USA</td>
														<td>20/07/2016</td>
													</tr>

													<tr>
														<th>
															<img class="thumb-sm img-circle" src="assets/images/users/avatar-8.jpg" alt="user">
														</th>
														<td>
															<h5 class="m-0">Mark</h5>
															<p class="text-muted font-13 m-0"><small>Web design</small></p>
														</td>
														<td>+91 123 456</td>
														<td>India</td>
														<td>07/07/2016</td>
													</tr>

												</tbody>
											</table>

										</div> <!-- table-responsive -->
									</div> <!-- end panel body -->
								</div>
								<!-- end panel -->
							</div>
							<!-- end col -->

						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
@endsection
