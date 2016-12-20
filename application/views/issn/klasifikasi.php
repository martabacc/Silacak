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
                        <div class="alert alert-info">
                            <strong>Informasi : </strong> Klik tombol dibawah untuk me-refresh / mengklasifikasikan / mencocokkan data di database dengan data Jurnal ISSN yang telah dimasukkan di halaman <a href="<?php echo base_url('issn');?>">Data Issn
				</a>
                        </div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control">
										<button id="btn-save" type="submit" class="btn green-seagreen mp-save-button">
											<i class="fa fa-refresh"></i> <span>Klasifikasi Jurnal ISSN</span>
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
