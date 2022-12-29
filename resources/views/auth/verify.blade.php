<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>
                    <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="alert alert-success" role="alert">
                           {{ __('The link below will be expired in 60 seconds') }}
                    </div>
                    <a href="{{ url('/reset-password/'.$token) }}">Click Here</a>
               </div>
           </div>
       </div>
   </div>
</div>
