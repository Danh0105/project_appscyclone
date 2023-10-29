@extends("Admin.Home.Layout.app")
@section("header")
	<link href="/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
	<link type="text/css" href="/plugins/multiselect/css/multi-select.css" rel="stylesheet" />
	<link type="text/css" href="/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
	<link href="/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="/plugins/switchery/switchery.min.css" rel="stylesheet">
@endsection
@section("content")
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
				<h4 class="page-title">Locations</h4>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box table-responsive">
				<div class="row" style="display: flex;justify-content: center;">

					<ul class="nav nav-tabs tabs-bordered nav-justified">
						<li class="active" id="user">
							<a data-toggle="tab" href="#location1" aria-expanded="true">
								<span class="visible-xs"><i class="fa fa-home"></i></span>
								<span class="hidden-xs">Users</span>
							</a>
						</li>
						<li class="" id="role">
							<a data-toggle="tab" href="#department1" aria-expanded="false">
								<span class="visible-xs"><i class="fa fa-user"></i></span>
								<span class="hidden-xs">Roles</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="tab-content">
					<div class="tab-pane active" id="location1">
						<div class="row" style="display: flex;justify-content: right;margin:5px;">
							<button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"
								style="margin:10px">
								NEW USER
							</button>
						</div>
						<table class="table-striped table-colored table-info table" id="datatable">
							<thead>
								<tr>
									<th>ID</th>
									<th>NAME</th>
									<th>EMAIL</th>
									<th>PHONE</th>
									<th>LOCATION</th>
									<th>ROLE</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $item)
									<tr>
										<td>{{ $item["id"] }}</td>
										<td>{{ $item["name"] }}</td>
										<td>{{ $item["email"] }}</td>
										<td>{{ $item["phone"] ?? "No Phone" }}</td>
										<td>
											<p>{{ $item["location"]["location_name"] ?? "No Location" }}</p>
											{{ $item["location"]["department"]["department_name"] ?? "No Department" }}
										</td>
										<td> {{ isset($item["role"][0]["name"]) ? $item["role"][0]["name"] : "No Role Assigned" }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="department1">
						<div class="row" style="display: flex;justify-content: right;margin:5px;">
							<button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg1"
								style="margin:10px">
								NEW ROLE
							</button>
						</div>
						<table class="table-striped table-colored table-info table" id="datatableRole">
							<thead>
								<tr>
									<th style="width: 30px;">ID</th>
									<th style="width: 150px;">NAME</th>
									<th>DESCRIPTION</th>
									<th style="width: 250px;"></th>

								</tr>
							</thead>
							<tbody id="TableBody">
								@foreach ($roles as $item)
									<tr>
										<td id="idcopy">{{ $item["id"] }}</td>
										<td id="namecopy">{{ $item["name"] }}</td>
										<td id="descriptioncopy">{{ $item["description"] }}</td>
										<td style="display: flex;flex-wrap: wrap;justify-content: center;gap: 3px;">
											<button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal-edit-role"
												onclick="editRow(this)">Edit</button>
											<button class="btn btn-info waves-effect waves-light copy-button" type="button" style="width: 70px;"
												onclick="copyRow(this)">Copy</button>
											<form class="formDeleteRole" id="formDeleteRole" action="{{ route("userrole.destroy", $item["id"]) }}"
												method="POST">
												@csrf
												@method("DELETE")
												<button class="btn btn-danger btn-bordered waves-effect waves-light" type="submit">Delete</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

			</div>

		</div>
	</div>
	{{-- modal new user --}}
	<div class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
		tabindex="-1" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myLargeModalLabel">NEW USER</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-success alert-dismissible fade in" id="alert-success" role="alert"
						style="position:sticky; top:20px;display:none;">
						<div id="mess"></div>
					</div>
					<form id="idForm" data-parsley-validate="" action="{{ route("userrole.createuser") }}" novalidate=""
						method="POST">
						@csrf
						<div class="form-group">
							<input class="form-control" id="username" name="username" type="text" parsley-trigger="change"
								placeholder="NAME">
						</div>
						<div class="form-group">
							<input class="form-control" id="email" name="email" type="text" parsley-trigger="change"
								placeholder="EMAIL">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" id="phone" name="phone" data-mask="(999) 999-9999" type="text"
								placeholder="">
							<span class="font-13 text-muted">(999) 999-9999</span>
						</div>
						<div class="form-group" style="width: 60%">
							<div class="btn-group bootstrap-select show-tick">
								<select class="selectpicker show-tick" id="roleOption" name="role" tabindex="-98">
									<option value="0">ROLE</option>
									@foreach ($roles as $item)
										<option value="{{ $item["id"] }}">{{ $item["name"] }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group" style="width: 60%">
							<div class="btn-group bootstrap-select show-tick">
								<select class="selectpicker show-tick" id="selectDepartment" name="location_model_id" tabindex="-98">
									<option value="0">SELECT LOCATION</option>
									@foreach ($locations as $item)
										<option value="{{ $item["id"] }}">{{ $item["location_name"] }}
											#{{ $item["department"]["department_name"] }}
										</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="text-danger m-3" id="error_selectDepartment"></div>
						<div id="showdepartment" style="display: none;">
							<div class="form-group">
								<input class="form-control" id="department" type="text" readonly parsley-trigger="change" required=""
									placeholder="DEPARMENT">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="floor" type="text" readonly parsley-trigger="change" required=""
											placeholder="FLOOR">
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="unit" readonly placeholder="UNIT">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" id="building" type="text" readonly parsley-trigger="change" required=""
									placeholder="BUILDING">
							</div>
							<div class="form-group">
								<input class="form-control" id="address" type="text" readonly parsley-trigger="change" required=""
									placeholder="STREET ADDRESS">
							</div>
							<div class="form-group">
								<input class="form-control" id="city" type="text" readonly parsley-trigger="change" required=""
									placeholder="CITY">
							</div>
							<div class="form-group">
								<input class="form-control" id="state" type="text" readonly parsley-trigger="change" required=""
									placeholder="STATE">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="selectpicker show-tick" id="country" tabindex="-98">
											<option>COUNTRY</option>
											<option>HCM</option>
											<option>Cà Mau</option>
											<option>Lào Cai</option>
										</select>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="zipcode" type="text" readonly parsley-trigger="change" required=""
											placeholder="ZIP CODE">
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6" style="text-align: center;">
								<button class="btn btn-primary waves-effect waves-light" type="submit" style="width:80%">
									CREATE USER
								</button>
							</div>
							<div class="col-md-6" style="text-align: center;">
								<button class="btn btn-default waves-effect" id="cancel" type="reset" style="width:80%">
									Cancel
								</button>
							</div>
						</div>

					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	{{-- modal new role --}}
	<div class="modal fade bs-example-modal-lg1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
		tabindex="-1" style="display: none;">
		<div class="modal-dialog" style="width: 55%;">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myLargeModalLabel">NEW ROLE</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-success alert-dismissible fade in" id="alert-successNewRole" role="alert"
						style="position:sticky; top:20px;display:none;">
						<div id="messNewRole"></div>
					</div>
					<form id="idFormRole" data-parsley-validate="" action="{{ route("userrole.store") }}" novalidate=""
						method="POST">
						@csrf
						<div style="width: 50%;">
							<div class="form-group">
								<input class="form-control" id="rolename" name="rolename" type="text" parsley-trigger="change"
									placeholder="Role Name">
							</div>
							<div class="text-danger m-3" id="error_Nname"></div>
							<div class="form-group">
								<textarea class="form-control" id="description" name="description" rows="5" placeholder="Description"></textarea>
							</div>
							<div class="text-danger m-3" id="error_Ndescription"></div>
							<hr>

						</div>
						<div class="table-responsive">
							<table class="table-colored table-info m-0 table">
								<thead>
									<tr>
										<th>NONE</th>
										<th>FULL</th>
										<th>SELECT</th>
										<th>VIEW</th>
										<th>CREATE</th>
										<th>EDIT</th>
										<th>DELETE</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="checkbox checkbox-primary checkbox-single checkbox-circle">
												<input class="checkNone" id="singleCheckbox21" type="checkbox" value="option2"
													aria-label="Single checkbox Two" style="width:25px;height:25px;" checked>
												<label></label>
											</div>
										</td>
										<td>
											<div class="checkbox checkbox-primary checkbox-single checkbox-circle">
												<input class="checkFull" id="singleCheckbox21" type="checkbox" value="option2"
													aria-label="Single checkbox Two" style="width:25px;height:25px;">
												<label></label>
											</div>
										</td>
										<td>
											<div class="checkbox checkbox-primary checkbox-single checkbox-circle">
												<input class="checkSelect" id="singleCheckbox21" type="checkbox" value="option2"
													aria-label="Single checkbox Two" style="width:25px;height:25px;">
												<label></label>
											</div>
										</td>
										<!---------------------------------------------------------------------------------------------------------------------------------------->
										<td>
											<label class="container_box">
												<input class="myCheckbox" id="VIEW" name="VIEW" type="checkbox" value="1" disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
										<td>
											<label class="container_box">
												<input class="myCheckbox" name="CREATE" type="checkbox" value="2" disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
										<td>
											<label class="container_box">
												<input class="myCheckbox" name="EDIT" type="checkbox" value="3" disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
										<td>
											<label class="container_box">
												<input class="myCheckbox" name="DELETE" type="checkbox" value="4" disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
						<div class="row" style="margin-top: 30px">
							<div class="col-md-6" style="text-align: center;">
								<button class="btn btn-primary waves-effect waves-light" type="submit" style="width:80%">
									CREATE LOCATION
								</button>
							</div>
							<div class="col-md-6" style="text-align: center;">
								<button class="btn btn-default waves-effect" id="cancel" type="reset" style="width:80%">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	{{-- modal edit role --}}
	<div class="modal fade modal-edit-role" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
		tabindex="-1" style="display: none;">
		<div class="modal-dialog" style="width: 55%;">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myLargeModalLabel">EDIT ROLE</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-success alert-dismissible fade in" id="alert-success" role="alert"
						style="position:sticky; top:20px;display:none;">
						<div id="mess"></div>
					</div>
					<form id="idFormEdit" data-parsley-validate="" action="{{ route("userrole.update", [0]) }}" novalidate=""
						method="POST">
						@method("PUT")
						@csrf
						<div style="width: 50%;">
							<input id="idedit" name="id" type="hidden" value="your-hidden-id-value">
							<div class="form-group">
								<input class="form-control" id="rolenameEdit" name="rolename" type="text" parsley-trigger="change"
									placeholder="Role Name">
							</div>
							<div class="text-danger m-3" id="error_rolename"></div>
							<div class="form-group">
								<textarea class="form-control" id="descriptionEdit" name="description" rows="5" placeholder="Description"></textarea>
							</div>
							<div class="text-danger m-3" id="error_description"></div>
							<hr>
						</div>
						<div class="table-responsive">
							<table class="table-colored table-info m-0 table">
								<thead>
									<tr>
										<th>NONE</th>
										<th>FULL</th>
										<th>SELECT</th>
										<th>VIEW</th>
										<th>CREATE</th>
										<th>EDIT</th>
										<th>DELETE</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="checkbox checkbox-primary checkbox-single checkbox-circle">
												<input class="checkNone" id="singleCheckbox21" type="checkbox" value="option2"
													aria-label="Single checkbox Two" style="width:25px;height:25px;" checked>
												<label></label>
											</div>
										</td>
										<td>
											<div class="checkbox checkbox-primary checkbox-single checkbox-circle">
												<input class="checkFull" id="singleCheckbox21" type="checkbox" value="option2"
													aria-label="Single checkbox Two" style="width:25px;height:25px;">
												<label></label>
											</div>
										</td>
										<td>
											<div class="checkbox checkbox-primary checkbox-single checkbox-circle">
												<input class="checkSelect" id="singleCheckbox21" type="checkbox" value="option2"
													aria-label="Single checkbox Two" style="width:25px;height:25px;">
												<label>
												</label>
											</div>
										</td>
										<!---------------------------------------------------------------------------------------------------------------------------------------->
										<td>
											<label class="container_box">
												<input class="myCheckbox myCheckboxEdit" name="VIEW" type="checkbox" value=1 disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
										<td>
											<label class="container_box">
												<input class="myCheckbox myCheckboxEdit" name="CREATE" type="checkbox" value=2 disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
										<td>
											<label class="container_box">
												<input class="myCheckbox myCheckboxEdit" name="EDIT" type="checkbox" value=3 disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
										<td>
											<label class="container_box">
												<input class="myCheckbox myCheckboxEdit" name="DELETE" type="checkbox" value=4 disabled>
												<span class="checkmark1"></span>
											</label>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
						<div class="row" style="margin-top: 30px">
							<div class="col-md-6" style="text-align: center;">
								<button class="btn btn-primary waves-effect waves-light" type="submit" style="width:80%">
									SAVE
								</button>
							</div>
							<div class="col-md-6" style="text-align: center;">
								<button class="btn btn-default waves-effect" id="cancel" type="reset" style="width:80%">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@once
	@push("scripts")
		<script src="/plugins/switchery/switchery.min.js"></script>

		<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="/plugins/datatables/dataTables.bootstrap.js"></script>
		<script src="/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="/plugins/datatables/buttons.bootstrap.min.js"></script>
		<script src="/plugins/datatables/jszip.min.js"></script>
		<script src="/plugins/datatables/pdfmake.min.js"></script>
		<script src="/plugins/datatables/vfs_fonts.js"></script>
		<script src="/plugins/datatables/buttons.html5.min.js"></script>
		<script src="/plugins/datatables/buttons.print.min.js"></script>
		<script src="/plugins/datatables/dataTables.fixedHeader.min.js"></script>
		<script src="/plugins/datatables/dataTables.keyTable.min.js"></script>
		<script src="/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="/plugins/datatables/responsive.bootstrap.min.js"></script>
		<script src="/plugins/datatables/dataTables.scroller.min.js"></script>
		<script src="/plugins/datatables/dataTables.colVis.js"></script>
		<script src="/plugins/datatables/dataTables.fixedColumns.min.js"></script>
		<script src="/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
		<script src="/plugins/multiselect/js/jquery.multi-select.js"></script>
		<script src="/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
		<script src="/plugins/select2/js/select2.min.js"></script>
		<script src="/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
		<script src="/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
		<script src="/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
		<script src="/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
		<script src="/plugins/autocomplete/jquery.mockjax.js"></script>
		<script src="/plugins/autocomplete/jquery.autocomplete.min.js"></script>
		<script src="/plugins/autocomplete/countries.js"></script>
		<script src="/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
		<!-- App js -->
		<script src="/assets/js/jquery.core.js"></script>
		<script src="/assets/js/jquery.app.js"></script>
		<script>
			$('#datatable').dataTable();
			$('#datatableRole').dataTable({
				"order": [
					[0, "desc"]
				]
			});

			function copyRow(button) {
				var id = button.closest('tr').querySelector('#idcopy').textContent;
				var name = button.closest('tr').querySelector('#namecopy').textContent;
				var description = button.closest('tr').querySelector('#descriptioncopy').textContent;
				var dataToCopy = id + ' ' + name + ' ' + description;

				var copyTextarea = document.createElement("textarea");
				copyTextarea.value = dataToCopy;
				document.body.appendChild(copyTextarea);

				copyTextarea.select();

				document.execCommand('copy');

				document.body.removeChild(copyTextarea);
			}
			$('.checkNone').on('click', function() {

				var checkbox = $('.myCheckbox');
				var checkFull = $('.checkFull');
				var checkSelect = $('.checkSelect');
				var checkNone = $('.checkNone');
				checkbox.prop('checked', false);
				checkbox.prop("disabled", true);

				checkSelect.prop('checked', false);
				checkFull.prop('checked', false);
				checkNone.prop('checked', true);
			});
			$('.checkFull').on('click', function() {

				var checkbox = $('.myCheckbox');
				var checkSelect = $('.checkSelect');
				var checkNone = $('.checkNone');
				var checkFull = $('.checkFull ');

				checkbox.prop('checked', true);
				checkbox.prop("disabled", true);

				checkSelect.prop('checked', false);
				checkNone.prop('checked', false);
				checkFull.prop('checked', true);
				$(document).ready(function() {
					$('.container_box input:checked ~ .checkmark1').css('background-color', '#2196f37a');
				});

			});
			$('.checkSelect').on('click', function() {

				var checkbox = $('.myCheckbox');
				var checkFull = $('.checkFull');
				var checkNone = $('.checkNone');
				var checkSelect = $('.checkSelect');
				checkbox.prop("disabled", false);

				checkFull.prop('checked', false);
				checkNone.prop('checked', false);
				checkSelect.prop('checked', true);
				$(document).ready(function() {
					$('.container_box input:checked ~ .checkmark1').css('background-color', '#2196F3');
				});

			});
			$(document).ready(function() {
				$('#idFormRole').on('submit', function(e) {
					e.preventDefault();

					var checkboxValues = [];
					var permission = [];
					var rolename = $('#rolename').val();
					var description = $('#description').val();
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					var form = $(this);
					var actionUrl = form.attr('action');
					var data = {
						rolename: rolename,
						description: description,
						_token: csrfToken,
						permission,
					};
					$(".myCheckbox").each(function() {
						var checkbox = $(this);
						var value = checkbox.val();
						var isChecked = checkbox.is(":checked");
						checkboxValues.push({
							value: value,
							checked: isChecked
						});
					});

					for (var i = 0; i < checkboxValues.length; i++) {
						if (checkboxValues[i].checked === true) {
							permission[i] = checkboxValues[i].value;

						}
					}

					$.ajax({
						type: "POST",
						url: actionUrl,
						data: data,
						success: function(response) {
							if (response.Edescription || response.Erolename) {
								$('#error_Ndescription').text(response.Edescription);

								$('#error_Nname').text(response.Erolename);

								setTimeout(function() {
									$('#error_Nname').text('');
									$('#error_Ndescription').text('');
								}, 3000);
							} else {
								$('#alert-successNewRole').css('display', 'block');
								$('#messNewRole').text('Successfull!');
								setTimeout(function() {
									$('#alert-successNewRole').css('display', 'none');
								}, 3000);
								var url = '{{ route("userrole.destroy", ":id") }}'.replace(':id',
									response.id);
								var newOption = '<option value="' + response.id + '">' + response
									.name + '</option>'
								var newRow = '<tr>' +
									'<td id="idcopy">' + response.id + '</td>' +
									'<td id="namecopy">' + response.name + '</td>' +
									'<td id="descriptioncopy">' + response.description + '</td>' +
									'<td style="display: flex;flex-wrap: wrap;justify-content: center;gap: 3px;">' +

									'<button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal-edit-role" onclick="editRow(this)">Edit</button>' +
									'<button class="btn btn-info waves-effect waves-light copy-button" type="button" style="width: 70px;" onclick="copyRow(this)">Copy</button>' +
									'<form class="formDeleteRole" method="POST" action="' + url +
									'">' +
									'@csrf' +
									'@method("DELETE")' +
									'<button class="btn btn-danger btn-bordered waves-effect waves-light" type="submit">Delete</button>' +
									'</form>' +
									'</td>' +
									'</tr>';
								$("#TableBody").prepend(newRow);
								$("#roleOption").append(newOption);
								$('.formDeleteRole').on('submit', function(e) {
									e.preventDefault();
									var form = $(this);
									var actionUrl = form.attr('action');
									var formData = form.serialize();
									$.ajax({
										type: "DELETE",
										url: actionUrl,
										data: formData,
										success: function(response) {
											var row = form.closest("tr");
											row.remove();
										}
									});
								});
							}

						}
					});

				});
			});

			function editRow(button) {
				var idcopy = button.closest('tr').querySelector('#idcopy').textContent;
				var namecopy = button.closest('tr').querySelector('#namecopy').textContent;
				var descriptioncopy = button.closest('tr').querySelector('#descriptioncopy').textContent;
				document.getElementById('idedit').value = idcopy;
				document.getElementById('rolenameEdit').value = namecopy;
				document.getElementById('descriptionEdit').value = descriptioncopy;
			}
			$(document).ready(function() {
				$("#idFormEdit").on("submit", function(e) {
					e.preventDefault();
					var permission = [];
					var checkboxValues = [];
					var id = $('#idedit').val();
					var rolename = $('#rolenameEdit').val();
					var description = $('#descriptionEdit').val();
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					var form = $(this);
					var actionUrl = form.attr('action');

					$(".myCheckboxEdit").each(function() {
						var checkbox = $(this);
						var value = checkbox.val();
						var isChecked = checkbox.is(":checked");
						checkboxValues.push({
							value: value,
							checked: isChecked
						});
					});

					for (var i = 0; i < checkboxValues.length; i++) {
						if (checkboxValues[i].checked === true) {
							permission[i] = parseInt(checkboxValues[i].value, 10);

						}
					}
					var data = {
						id: id,
						rolename: rolename,
						description: description,
						_token: csrfToken,
						permission,
					};
					$.ajax({
						type: "PUT",
						url: actionUrl,
						data: data,
						success: function(response) {
							if (response.description || response.rolename) {
								$('#error_description').text(response.description);

								$('#error_rolename').text(response.rolename);

								setTimeout(function() {
									$('#error_rolename').text('');
									$('#error_description').text('');
								}, 3000);
							} else {
								location.reload();
							}
						},
					});
				});
			});
			$(document).ready(function() {
				$('.formDeleteRole').on('submit', function(e) {
					e.preventDefault();
					var form = $(this);
					var actionUrl = form.attr('action');
					var formData = form.serialize();
					$.ajax({
						type: "DELETE",
						url: actionUrl,
						data: formData,
						success: function(response) {
							var row = form.closest("tr");
							row.remove();
						}
					});
				});
			});
			var dataTable = $('#datatableRole').DataTable();
			dataTable.on('draw', function() {
				$(document).ready(function() {
					$('.formDeleteRole').on('submit', function(e) {
						e.preventDefault();
						var form = $(this);
						var actionUrl = form.attr('action');
						var formData = form.serialize();
						$.ajax({
							type: "DELETE",
							url: actionUrl,
							data: formData,
							success: function(response) {
								var row = form.closest("tr");
								row.remove();
							}
						});
					});
				});
			});
			$('#selectDepartment').on("change", function() {
				var selectedValue = $(this).val();
				$.ajax({
					type: "GET",
					url: '{{ route("userrole.show", ["userrole" => ":selectedValue"]) }}'.replace(
						':selectedValue', selectedValue),
					success: function(response) {
						console.log(response);
						if (response) {
							$('#department').val(response.department.department_name);
							$('#floor').val(response.department.floor);
							$('#unit').val(response.department.unit);
							$('#building').val(response.department.building);
							$('#address').val(response.department.street_address);
							$('#city').val(response.department.city_name);
							$('#state').val(response.department.state_name);
							$('#country').val(response.department.country);
							$('#zipcode').val(response.department.zip_code);
						}
					}
				})
				$('#showdepartment').css("display", "block");
			});
		</script>
	@endpush
@endonce
