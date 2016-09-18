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
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('log_tanggal'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('log_aktivitas'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('log_pegawai'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('peg_google_scholar'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('log_data'); ?></li>
								<li><input type="checkbox" data-column="6" checked><?php echo $this->lang->line('log_keterangan'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline">
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-3"><?php echo $this->lang->line('log_filterstart'); ?></label>
								<div class="col-md-9">
									<div class="input-group input-medium date-picker input-daterange" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control input-medium" id="filter_startdate" style="text-align: left">
                                        <span class="input-group-addon"><?php echo $this->lang->line('log_filterend'); ?></span>
                                        <input type="text" class="form-control input-medium" id="filter_enddate" style="text-align: left"> 
                                    </div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-3"><?php echo $this->lang->line('log_keterangan'); ?></label>
								<div class="col-md-9">
									<?php make_combobox($keterangan, array('id'=>'filter_keterangan', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_reset">Reset</button>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
						<hr class="no-margin"/>
						<a href="#" id="btn-download-url-kosong" class="btn green-seagreen margin-top-10">Download Daftar URL Kosong</a>
						<hr class="no-margin"/>
						<br/>
						Periode : <select id="filter-periode" class="form-control">
							<option value="0">Sedang Berjalan</option>
							<?php foreach ($periode as $key => $value) { ?>
								<option value="<?php echo $value->tar_id;?>"><?php echo $value->tar_tanggal ?></option>
							<?php } ?>
						</select>
						<br/>
						<a href="#" id="btn-download-sukses" class="btn green-seagreen margin-top-10">Download Daftar Unduh Data Sukses</a>
						<a href="#" id="btn-download" class="btn green-seagreen margin-top-10">Download Daftar Unduh Data Gagal</a>
						<a href="#" id="btn-download-kosong" class="btn green-seagreen margin-top-10">Download Daftar Sukses - Data Kosong</a>
					
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('log_tanggal'); ?></th>
									<th><?php echo $this->lang->line('log_aktivitas'); ?></th>
									<th><?php echo $this->lang->line('log_pegawai'); ?></th>
									<th><?php echo $this->lang->line('log_pegawai'); ?></th>
									<th><?php echo $this->lang->line('peg_google_schoolar'); ?></th>
									<th><?php echo $this->lang->line('log_data'); ?></th>
									<th><?php echo $this->lang->line('log_keterangan'); ?></th>
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
						<input type="hidden" id="log_id" name="log_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('log_tanggal'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="log_tanggal" name="log_tanggal" type="text"  placeholder="<?php echo $this->lang->line('log_tanggal_help'); ?>" title="<?php echo $this->lang->line('log_tanggal_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('log_tanggal_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('log_aktivitas'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="log_aktivitas" name="log_aktivitas" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('log_aktivitas_help'); ?>" title="<?php echo $this->lang->line('log_aktivitas_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('log_aktivitas_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('log_pegawai'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="log_pegawai" name="log_aktivitas" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('log_pegawai_help'); ?>" title="<?php echo $this->lang->line('log_pegawai_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('log_pegawai_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('log_data'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="log_data" name="log_data" type="text"  placeholder="<?php echo $this->lang->line('log_data_help'); ?>" title="<?php echo $this->lang->line('log_data_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('log_data_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('log_keterangan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="log_keterangan" name="log_keterangan" type="text" maxlength="1000" placeholder="<?php echo $this->lang->line('log_keterangan_help'); ?>" title="<?php echo $this->lang->line('log_keterangan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('log_keterangan_help'); ?></span>
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