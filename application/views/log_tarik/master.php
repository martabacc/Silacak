<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_master'); ?></span>
					</div>
					<div class="actions filter-control">
						<div class="btn-group column-visibility margin-right-10">
							<button type="button" class="btn grey-gallery dropdown-toggle fix-nested-dropdown" data-toggle="dropdown">
								<i class="fa fa-columns"></i> Kolom <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu">
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('tar_tanggal'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('tar_jenis'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('tar_pegawai'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('peg_google_scholar'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('tar_status'); ?></li>
								<li><input type="checkbox" data-column="6" checked><?php echo $this->lang->line('tar_keterangan'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline">
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-3"><?php echo $this->lang->line('tar_filterstart'); ?></label>
								<div class="col-md-9">
									<div class="input-group input-medium date-picker input-daterange" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control input-medium" id="filter_startdate" style="text-align: left">
                                        <span class="input-group-addon"><?php echo $this->lang->line('tar_filterend'); ?></span>
                                        <input type="text" class="form-control input-medium" id="filter_enddate" style="text-align: left"> 
                                    </div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_reset">Reset</button>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
						<hr class="no-margin"/>
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('tar_tanggal'); ?></th>
									<th><?php echo $this->lang->line('tar_jenis'); ?></th>
									<th><?php echo $this->lang->line('tar_keterangan'); ?></th>
									<th><?php echo $this->lang->line('tar_status'); ?></th>
								</tr>
							</thead>
							<tbody></tbody>
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
						<input type="hidden" id="tar_id" name="tar_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('tar_tanggal'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="tar_tanggal" name="tar_tanggal" type="text"  placeholder="<?php echo $this->lang->line('tar_tanggal_help'); ?>" title="<?php echo $this->lang->line('tar_tanggal_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('tar_tanggal_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('tar_jenis'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="tar_jenis" name="tar_jenis" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('tar_jenis_help'); ?>" title="<?php echo $this->lang->line('tar_jenis_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('tar_jenis_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('tar_pegawai'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="tar_pegawai" name="tar_jenis" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('tar_pegawai_help'); ?>" title="<?php echo $this->lang->line('tar_pegawai_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('tar_pegawai_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('tar_status'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="tar_status" name="tar_status" type="text"  placeholder="<?php echo $this->lang->line('tar_status_help'); ?>" title="<?php echo $this->lang->line('tar_status_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('tar_status_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('tar_keterangan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="tar_keterangan" name="tar_keterangan" type="text" maxlength="1000" placeholder="<?php echo $this->lang->line('tar_keterangan_help'); ?>" title="<?php echo $this->lang->line('tar_keterangan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('tar_keterangan_help'); ?></span>
								</div>
							</div>
						</div>
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