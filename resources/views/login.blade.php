@include('header')
    <section class="main-slider mt-15 mb-15">
		<div class="container">
			<div style="justify-content: center;"  class="row">
				<div class="col-12">
					<div class="sec-title light centered">
						<h2 style="color: black;">Giriş</h2>
						<div class="text">Giriş Paneli</div>
					</div>
                                
                    @if(session('message'))
                    <div class="alert alert-danger alert_container d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{session('message')}}
                        </div>
                    </div>
                    @endif
					<form class="needs-validation" action="{{ route('login') }}" method="POST">
                        @csrf
						<div style="justify-content: center;" class="form-row">
							<div class="col-md-4 mb-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">123</span>
									</div>
									<input type="text" class="form-control" name="student_no" placeholder="Öğrenci Numaranız..." required>
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">***</span>
									</div>
									<input type="password" class="form-control" name="password"  placeholder="Şifreniz..." required>
								</div>
							</div>
						</div>
						</div>
						<button class="btn btn-primary col-8" type="submit">Giriş Yap</button>
					</form>
				</div>  
			</div>
		</div>
	</section>
@include('footer')