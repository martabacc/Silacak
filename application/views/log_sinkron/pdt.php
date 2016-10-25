<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase">Daftar Duplikasi Publikasi</span>
					</div>
					<div class="actions filter-control">
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('pub_judul'); ?></th>
									<th><?php echo $this->lang->line('pub_pengarang'); ?></th>
									<th><?php echo $this->lang->line('snk_tanggal'); ?></th>
									<th>Duplikasi</th>
									<th><?php echo $this->lang->line('snk_distance'); ?></th>
									<th><?php echo $this->lang->line('snk_status'); ?> Bersih</th>
								</tr>
							</thead>
							<tbody id="table-body-master"></tbody>
						</table>
					</form>
				</div>
			</div>
			<div class="detail-page portlet light bg-inverse form-fit" style="display:none;">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_detail'); ?></span>
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body form">
					<form action="javascript:void(0);" method="post" class="form-detail form-horizontal form-bordered form-label-stripped">
						<input type="hidden" id="adm_id" name="adm_id"/>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control"></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>