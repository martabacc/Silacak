<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="detail-page portlet light bg-inverse form-fit" >
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase">
							<!-- TODO LANG -->
							Klasifikasi Data Scopus
						</span>
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body form">
					<form action="javascript:void(0);" method="post" class="form-detail form-horizontal form-bordered form-label-stripped">

						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">
									<!-- todo lang -->
									Klasifikasi File Scopus
								</label>
								<div class="col-md-9 input-placement" >
									<div class="input-group input-large">
										<select id="filename" name="filename"class="form-control" required >
											<?php foreach($result as $r){
												if( $r!= '.' && $r != '..'){	
												?>
												<option value='<?php echo $r?>'><?php echo $r?> </option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
							
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control">
										<button id="btn-save" type="button" class="btn green-seagreen mp-save-button">
											<i class="fa fa-refresh"></i> <span>Klasifikasi</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
