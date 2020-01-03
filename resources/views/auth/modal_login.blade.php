<!-- The Modal -->
<div class="modal fade" id="modal-login" tabindex='-1'>
	<div class="modal-dialog">
		<div class="modal-content modal-windows">
      
	        <!-- Modal Header -->
		    <div class="modal-header">
				<h4 class="modal-title mx-auto">{{ __('Login') }}</h4>
				<button type="button" class="close text-white" data-dismiss="modal">×</button>
	        </div>
        
		    <!-- Modal body -->
			<div class="modal-body">
                    <form id="n-login-form" method="POST" action="#">

                        <div class="form-group row">
                            <label for="login-email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="login-email" type="text" class="form-control" name="email" value="" autocomplete="email" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="login-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="login-password" type="password" class="form-control" name="password" autocomplete="current-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="login-remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="login-remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white" id="open-modal-email" href="#">
                                        {{ __('Forgot Your Password') . '?' }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
	        </div>

		</div>
	</div>
</div>

