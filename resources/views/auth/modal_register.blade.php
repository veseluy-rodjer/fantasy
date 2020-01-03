<!-- The Modal -->
<div class="modal fade" id="modal-register" tabindex='-1'>
	<div class="modal-dialog">
		<div class="modal-content modal-windows">
      
	        <!-- Modal Header -->
		    <div class="modal-header">
				<h4 class="modal-title mx-auto">{{ __('Register') }}</h4>
				<button type="button" class="close text-white" data-dismiss="modal">×</button>
	        </div>
        
		    <!-- Modal body -->
			<div class="modal-body">
                    <form id="n-register-form" method="POST" action="{{ route('register') }}">

                        <div class="form-group row">
                            <label for="register-name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="register-name" type="text" class="form-control" name="name" value="" autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="register-email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="register-email" type="text" class="form-control" name="email" value="" autocomplete="email">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="register-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="register-password" type="password" class="form-control" name="password" autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="register-password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="register-password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
	        </div>

		</div>
	</div>
</div>

