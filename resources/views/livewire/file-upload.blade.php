<div>
	{{-- The Master doesn't talk, he acts. --}}
	@if (session()->has('message'))
		<div class="alert alert-success alert-dismissible fade show m-3" role="alert">
			<h4 class="alert-heading">Holy guacamole success!</h4>
			<p>{{ session('message') }}</p>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif
	<div class="flex h-screen justify-center items-center">
		<div class="row w-75">
			<div class="col-md-12">
				<form class="mb-5" wire:submit.prevent="uploadVideo">
					<div class="form-group row mt-5 mb-3">
						<div class="input-group">
							<input id="video" type="file" class="form-control @error('video') is-invalid @enderror"
							       placeholder="Choose file..." wire:model="video">
							@error('video')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<small class="text-muted text-center mt-2" wire:loading wire:target="video">
							{{ __('Uploading') }}&hellip;
						</small>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-sm btn-primary">
							{{ __('Upload Video') }}
							<i class="spinner-border spinner-border-sm ml-1 mt-1" wire:loading wire:target="uploadVideo"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
		</div>
	</div>
</div>
