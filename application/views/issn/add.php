<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="detail-page portlet light bg-inverse form-fit" >
				<div id="success-alert" class="alert alert-success" style="display:none;">
                    <button class="close" data-close="alert"></button>
                    <div class="alert-wrapper">
                    	<strong class="alert-title">Sukses!</strong> 
                    	<span class="alert-content">Data berhasil ditambahkan</span></div>
                </div>
                <div class='clearfix'></div>

				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase">
							<!-- TODO LANG -->
							Tambah Data ISSN
						</span>
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body form">
					<form action="" method="POST" class="form-detail form-horizontal form-bordered form-label-stripped">
						<input type="hidden" id='tkn' name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">
									<!-- TODO LANG -->
									Judul Jurnal
									</label>
								<div class="col-md-9 input-placement" >
									<div class="input-group input-large">
										<input id="issn_judul" name="issn_judul" type="text" class="form-control" />
										<span class="input-group-btn">
											<!-- <a class=" btn green search"><i class="fa fa-search"></i> Pilih File...</a> -->
										</span>
									</div>
								</div>
							</div>
							
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control">
										<button id="btn-save" type='button' class="btn green-seagreen mp-save-button">
											<i class="fa fa-plus"></i> <span>Tambah Data Issn</span>
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