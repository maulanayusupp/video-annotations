<div class="row">
	<div class="col-sm-12">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		<div class="form-group row {{ $errors->has('name') ? ' form-group-error' : '' }} ">
			<div class="col-sm-3 m-t-md form-control-label text-form">Name</div>
			<div class="col-sm-6">
				<p class="form-control-static">
					{!! Form::text('name', null, ['class'=>'form-control', 'required'=>'required']) !!}
					@if($errors->has('name'))
						<div class="form-tooltip-error">{{ $errors->first('name') }}</div>
					@endif
				</p>
			</div>
		</div>

        <div class="form-group row {{ $errors->has('file') ? ' form-group-error' : '' }} ">
            <div class="col-sm-3 m-t-md form-control-label text-form">Document</div>
            <div class="col-sm-6">
                <input type="file" name="file" class="form-control">
            </div>
            @if(isset($brochure->path))
                <div class="col-sm-3">
                    
                </div>
            @endif
        </div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr>
		<button type="submit" class="btn btn-block btn-danger">
			<i class="fa fa-save" aria-hidden="true"></i> Save Video
		</button>
	</div>
</div>