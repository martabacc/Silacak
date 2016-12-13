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
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('fak_perguruan_tinggi'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('fak_status_validasi'); ?></li>
								<li><input type="checkbox" data-column="3" checked><?php echo $this->lang->line('fak_log_audit'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('fak_singkatan'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('fak_nama_indonesia'); ?></li>
								<li><input type="checkbox" data-column="6" checked><?php echo $this->lang->line('fak_nama_inggris'); ?></li>
								<li><input type="checkbox" data-column="7" checked><?php echo $this->lang->line('fak_dosen_kepala'); ?></li>
								<li><input type="checkbox" data-column="8" checked><?php echo $this->lang->line('fak_tanggal_mulai_efektif'); ?></li>
								<li><input type="checkbox" data-column="9" checked><?php echo $this->lang->line('fak_tanggal_akhir_efektif'); ?></li>
								<li><input type="checkbox" data-column="10" checked><?php echo $this->lang->line('fak_deleted_at'); ?></li>
								<li><input type="checkbox" data-column="11" checked><?php echo $this->lang->line('fak_created_at'); ?></li>
								<li><input type="checkbox" data-column="12" checked><?php echo $this->lang->line('fak_updated_at'); ?></li>
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
									<th><?php echo $this->lang->line('fak_perguruan_tinggi'); ?></th>
									<th><?php echo $this->lang->line('fak_status_validasi'); ?></th>
									<th><?php echo $this->lang->line('fak_log_audit'); ?></th>
									<th><?php echo $this->lang->line('fak_singkatan'); ?></th>
									<th><?php echo $this->lang->line('fak_nama_indonesia'); ?></th>
									<th><?php echo $this->lang->line('fak_nama_inggris'); ?></th>
									<th><?php echo $this->lang->line('fak_dosen_kepala'); ?></th>
									<th><?php echo $this->lang->line('fak_tanggal_mulai_efektif'); ?></th>
									<th><?php echo $this->lang->line('fak_tanggal_akhir_efektif'); ?></th>
									<th><?php echo $this->lang->line('fak_deleted_at'); ?></th>
									<th><?php echo $this->lang->line('fak_created_at'); ?></th>
									<th><?php echo $this->lang->line('fak_updated_at'); ?></th>
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
						<input type="hidden" id="fak_id" name="fak_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_perguruan_tinggi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_perguruan_tinggi" name="fak_perguruan_tinggi" type="text" maxlength="6" placeholder="<?php echo $this->lang->line('fak_perguruan_tinggi_help'); ?>" title="<?php echo $this->lang->line('fak_perguruan_tinggi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_perguruan_tinggi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_status_validasi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_status_validasi" name="fak_status_validasi" type="text" maxlength="2" placeholder="<?php echo $this->lang->line('fak_status_validasi_help'); ?>" title="<?php echo $this->lang->line('fak_status_validasi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_status_validasi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_log_audit'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_log_audit" name="fak_log_audit" type="text" maxlength="2" placeholder="<?php echo $this->lang->line('fak_log_audit_help'); ?>" title="<?php echo $this->lang->line('fak_log_audit_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_log_audit_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_singkatan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_singkatan" name="fak_singkatan" type="text" maxlength="10" placeholder="<?php echo $this->lang->line('fak_singkatan_help'); ?>" title="<?php echo $this->lang->line('fak_singkatan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_singkatan_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_nama_indonesia'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_nama_indonesia" name="fak_nama_indonesia" type="text" maxlength="100" placeholder="<?php echo $this->lang->line('fak_nama_indonesia_help'); ?>" title="<?php echo $this->lang->line('fak_nama_indonesia_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_nama_indonesia_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_nama_inggris'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_nama_inggris" name="fak_nama_inggris" type="text" maxlength="100" placeholder="<?php echo $this->lang->line('fak_nama_inggris_help'); ?>" title="<?php echo $this->lang->line('fak_nama_inggris_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_nama_inggris_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_dosen_kepala'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_dosen_kepala" name="fak_dosen_kepala" type="text" maxlength="18" placeholder="<?php echo $this->lang->line('fak_dosen_kepala_help'); ?>" title="<?php echo $this->lang->line('fak_dosen_kepala_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_dosen_kepala_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_tanggal_mulai_efektif'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_tanggal_mulai_efektif" name="fak_tanggal_mulai_efektif" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('fak_tanggal_mulai_efektif_help'); ?>" title="<?php echo $this->lang->line('fak_tanggal_mulai_efektif_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_tanggal_mulai_efektif_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_tanggal_akhir_efektif'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_tanggal_akhir_efektif" name="fak_tanggal_akhir_efektif" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('fak_tanggal_akhir_efektif_help'); ?>" title="<?php echo $this->lang->line('fak_tanggal_akhir_efektif_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_tanggal_akhir_efektif_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_deleted_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_deleted_at" name="fak_deleted_at" type="text"  placeholder="<?php echo $this->lang->line('fak_deleted_at_help'); ?>" title="<?php echo $this->lang->line('fak_deleted_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_deleted_at_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_created_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_created_at" name="fak_created_at" type="text"  placeholder="<?php echo $this->lang->line('fak_created_at_help'); ?>" title="<?php echo $this->lang->line('fak_created_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_created_at_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('fak_updated_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="fak_updated_at" name="fak_updated_at" type="text"  placeholder="<?php echo $this->lang->line('fak_updated_at_help'); ?>" title="<?php echo $this->lang->line('fak_updated_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('fak_updated_at_help'); ?></span>
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