
 <?php echo alert(); ?>
<div class="row-fluid">
	<div class="span12">
	    <!-- BEGIN widget widget-->
	    <div class="widget white-full">
	        <div class="widget-title">
	            <h4><i class="icon-search"></i> Searh Siswa <span class="badge tooltips" data-trigger="hover" data-placement="right" data-original-title="Pencarian data siswa berdasarkan NIS atau Nama Siswa" style="background-color: #4a8bc2;cursor: pointer;">?</span></h4>
	        </div>
	        <div class="widget-body">
	        	<form action="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('pelanggaransiswa','search')); ?>" method="post" class="form-horizontal" >
		            <div class="row-fluid">
		            	<div class="span11">
		            		<label for="" class="control-label">
		            			<span style="font-size: 21pt;color: #3399ff;font-weight: bold">
		            				S
		            			</span>
		            			<span style="font-size: 21pt;color: #ff3333;font-weight: bold">
		            				e
		            			</span>
		            			<span style="font-size: 21pt;color: #ffcc00;font-weight: bold">
		            				a
								</span>
								<span style="font-size: 21pt;color: #3399ff;font-weight: bold">
		            				r
								</span>
								<span style="font-size: 21pt;color: #339966;font-weight: bold">
		            				c
								</span>
								<span style="font-size: 21pt;color: #ff3333;font-weight: bold">
		            				h
								</span>
		            		</label>
				            <div class="control-group">
			                    <div class="controls">
			                        <input type="text" class="input-block-level" placeholder="Telusuri nis atau nama siswa" required name="search" autocomplete="off">
			                    </div>
			                </div>
		            	</div>
		            	<div class="span1">
		            		<button class="btn btn-primary"><i class="icon-search"></i> Cari </button>
		            	</div>
		            </div>
	        	</form>
	    <hr>
	        </div>
	    </div>
	    <!-- END widget widget-->
	</div>
</div>