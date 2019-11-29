<!-- The Modal -->
<div class="modal fade" id="modal-verify" tabindex='-1'>
	<div class="modal-dialog">
		<div class="modal-content modal-windows">
      
	        <!-- Modal Header -->
		    <div class="modal-header">
				<h4 class="modal-title mx-auto">{{ __('Login') }}</h4>
				<button type="button" class="close text-white" data-dismiss="modal">×</button>
	        </div>
        
		    <!-- Modal body -->
			<div class="modal-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
	        </div>

		</div>
	</div>
</div>

