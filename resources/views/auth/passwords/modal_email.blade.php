<!-- The Modal -->
<div class="modal fade" id="modal-email" tabindex='-1'>
	<div class="modal-dialog">
		<div class="modal-content modal-windows">
      
	        <!-- Modal Header -->
		    <div class="modal-header">
				<h4 class="modal-title mx-auto">{{ __('Reset Password') }}</h4>
				<button type="button" class="close text-white" data-dismiss="modal">×</button>
	        </div>
        
		    <!-- Modal body -->
			<div class="modal-body">

					<form id="n-email-form" method="POST" action="#">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="reset-email" type="text" class="form-control" name="email" value="" autocomplete="email" autofocus>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
	        </div>

		</div>
	</div>
</div>

