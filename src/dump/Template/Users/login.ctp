<div class="row align-items-center justify-content-md-center h-p100">			
				<div class="col-12">
					<div class="row no-gutters justify-content-md-center">
						<div class="col-lg-4 col-md-5 col-12">
							<div class="content-top-agile h-p100">
								<h2>Get started <br> with IMMDESK</h2>
								<p class="text-white">Sign in to start your session</p>
							</div>				
						</div>
						<div class="col-lg-5 col-md-5 col-12">
							<div class="p-40 bg-white content-bottom h-p100">
								<?php $this->Form->templates(['inputContainer' => '{{content}}']); ?>
								<?php  echo $this->Form->create('User', array('action' => 'login','class'=>'form-element')); ?>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-info border-info"><i class="ti-user"></i></span>
											</div>
											 <?php echo $this->Form->input('email', array('label'=>false,'type' => 'text','placeholder'=>'Email','class'=>'form-control pl-15')); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-info border-info"><i class="ti-lock"></i></span>
											</div>
											<?php echo $this->Form->input('password', array('label'=>false,'type' => 'password','placeholder'=>'Password','class'=>'form-control pl-15')); ?>
										</div>
									</div>
									  <div class="row">
										<div class="col-12">
										 <div class="fog-pwd text-right">
											<a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot password?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <?php echo $this->Form->button('SIGN IN', array('type' => 'submit','class' => 'btn btn-info btn-block margin-top-10','escape' => false)); ?>
										</div>
										<!-- /.col -->
									  </div>
								<?php echo $this->Form->end(); ?>

								
							</div>
						</div>
					</div>
				</div>
			</div>





<?php
/*  echo $this->Form->create('User', array('action' => 'login'));
  echo $this->Form->input('email', array('type' => 'text'));
  echo $this->Form->input('password', array('type' => 'text'));
  echo $this->Form->submit();
  echo $this->Form->end();*/
?>