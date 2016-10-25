<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="note note-warning">
			<h4><?php echo $this->lang->line('module_title'); ?></h4>
			<p><?php echo $this->lang->line('module_description'); ?></p>
		</div>
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
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('lab_kode'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('lab_perguruan_tinggi'); ?></li>
								<li><input type="checkbox" data-column="3" checked><?php echo $this->lang->line('lab_fakultas'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('lab_jurusan'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('lab_program_studi'); ?></li>
								<li><input type="checkbox" data-column="6" checked><?php echo $this->lang->line('lab_validasi'); ?></li>
								<li><input type="checkbox" data-column="7" checked><?php echo $this->lang->line('lab_log_audit'); ?></li>
								<li><input type="checkbox" data-column="8" checked><?php echo $this->lang->line('lab_nama_indonesia'); ?></li>
								<li><input type="checkbox" data-column="9" checked><?php echo $this->lang->line('lab_nama_inggris'); ?></li>
								<li><input type="checkbox" data-column="10" checked><?php echo $this->lang->line('lab_periode_pelaporan'); ?></li>
								<li><input type="checkbox" data-column="11" checked><?php echo $this->lang->line('lab_jumlah_aktifitas'); ?></li>
								<li><input type="checkbox" data-column="12" checked><?php echo $this->lang->line('lab_created_at'); ?></li>
								<li><input type="checkbox" data-column="13" checked><?php echo $this->lang->line('lab_updated_at'); ?></li>
								<li><input type="checkbox" data-column="14" checked><?php echo $this->lang->line('lab_deleted_at'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline" style="display: none;">
						<h4><?php echo $this->lang->line('master_filter'); ?></h4>

						<div class="clearfix"></div>
						<hr class="no-margin"/>
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('lab_kode'); ?></th>
									<th><?php echo $this->lang->line('lab_perguruan_tinggi'); ?></th>
									<th><?php echo $this->lang->line('lab_fakultas'); ?></th>
									<th><?php echo $this->lang->line('lab_jurusan'); ?></th>
									<th><?php echo $this->lang->line('lab_program_studi'); ?></th>
									<th><?php echo $this->lang->line('lab_validasi'); ?></th>
									<th><?php echo $this->lang->line('lab_log_audit'); ?></th>
									<th><?php echo $this->lang->line('lab_nama_indonesia'); ?></th>
									<th><?php echo $this->lang->line('lab_nama_inggris'); ?></th>
									<th><?php echo $this->lang->line('lab_periode_pelaporan'); ?></th>
									<th><?php echo $this->lang->line('lab_jumlah_aktifitas'); ?></th>
									<th><?php echo $this->lang->line('lab_created_at'); ?></th>
									<th><?php echo $this->lang->line('lab_updated_at'); ?></th>
									<th><?php echo $this->lang->line('lab_deleted_at'); ?></th>
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
						<input type="hidden" id="lab_id" name="lab_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_kode'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_kode" name="lab_kode" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_kode_help'); ?>" title="<?php echo $this->lang->line('lab_kode_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_kode_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_perguruan_tinggi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_perguruan_tinggi" name="lab_perguruan_tinggi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_perguruan_tinggi_help'); ?>" title="<?php echo $this->lang->line('lab_perguruan_tinggi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_perguruan_tinggi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_fakultas'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_fakultas" name="lab_fakultas" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_fakultas_help'); ?>" title="<?php echo $this->lang->line('lab_fakultas_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_fakultas_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_jurusan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_jurusan" name="lab_jurusan" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_jurusan_help'); ?>" title="<?php echo $this->lang->line('lab_jurusan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_jurusan_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_program_studi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_program_studi" name="lab_program_studi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_program_studi_help'); ?>" title="<?php echo $this->lang->line('lab_program_studi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_program_studi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_validasi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_validasi" name="lab_validasi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_validasi_help'); ?>" title="<?php echo $this->lang->line('lab_validasi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_validasi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_log_audit'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_log_audit" name="lab_log_audit" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_log_audit_help'); ?>" title="<?php echo $this->lang->line('lab_log_audit_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_log_audit_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_nama_indonesia'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_nama_indonesia" name="lab_nama_indonesia" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_nama_indonesia_help'); ?>" title="<?php echo $this->lang->line('lab_nama_indonesia_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_nama_indonesia_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_nama_inggris'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_nama_inggris" name="lab_nama_inggris" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_nama_inggris_help'); ?>" title="<?php echo $this->lang->line('lab_nama_inggris_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_nama_inggris_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_periode_pelaporan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_periode_pelaporan" name="lab_periode_pelaporan" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('lab_periode_pelaporan_help'); ?>" title="<?php echo $this->lang->line('lab_periode_pelaporan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_periode_pelaporan_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_jumlah_aktifitas'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_jumlah_aktifitas" name="lab_jumlah_aktifitas" type="text"  placeholder="<?php echo $this->lang->line('lab_jumlah_aktifitas_help'); ?>" title="<?php echo $this->lang->line('lab_jumlah_aktifitas_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_jumlah_aktifitas_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_created_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_created_at" name="lab_created_at" type="text"  placeholder="<?php echo $this->lang->line('lab_created_at_help'); ?>" title="<?php echo $this->lang->line('lab_created_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_created_at_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_updated_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_updated_at" name="lab_updated_at" type="text"  placeholder="<?php echo $this->lang->line('lab_updated_at_help'); ?>" title="<?php echo $this->lang->line('lab_updated_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_updated_at_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('lab_deleted_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="lab_deleted_at" name="lab_deleted_at" type="text"  placeholder="<?php echo $this->lang->line('lab_deleted_at_help'); ?>" title="<?php echo $this->lang->line('lab_deleted_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('lab_deleted_at_help'); ?></span>
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