@if(session('alert_error'))
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
	{{ session('alert_error') }}
</div>
@endif


@if(session('alert_success'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
	{{ session('alert_success') }}
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif