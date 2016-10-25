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
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('alb_pegawai'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('alb_laboratorium'); ?></li>
								<li><input type="checkbox" data-column="3" checked><?php echo $this->lang->line('alb_status_ketua'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('alb_periode_aktif'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline" style="display: none;">
						<h4><?php echo $this->lang->line('master_filter'); ?></h4>
						<div class="filter-part">
							<?php echo $this->lang->line('alb_pegawai'); ?> : <?php make_object_combobox($pegawai,
																											'peg_id',
																											'peg_name',
																											array('id'=>'filter_pegawai',
																												'title'=>$this->lang->line('peg_id_help'),
																												'class'=>'form-control input-medium'),
																											TRUE,
																											TRUE,
																											'master_all'); ?>
						</div>
						<div class="filter-part">
							<?php echo $this->lang->line('alb_laboratorium'); ?> : <?php make_object_combobox($laboratorium_penelitian,
																											'lab_id',
																											'lab_name',
																											array('id'=>'filter_laboratorium_penelitian',
																												'title'=>$this->lang->line('lab_id_help'),
																												'class'=>'form-control input-medium'),
																											TRUE,
																											TRUE,
																											'master_all'); ?>
						</div>
						<div class="clearfix"></div>
						<hr class="no-margin"/>
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('alb_pegawai'); ?></th>
									<th><?php echo $this->lang->line('alb_laboratorium'); ?></th>
									<th><?php echo $this->lang->line('alb_status_ketua'); ?></th>
									<th><?php echo $this->lang->line('alb_periode_aktif'); ?></th>
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
						<input type="hidden" id="alb_id" name="alb_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('alb_pegawai'); ?></label>
								<div class="col-md-9 input-placement">
									<?php make_object_combobox($pegawai,
															  'peg_id',
															  'peg_name',
															  array('id'=>'alb_pegawai',
															  		'name'=>'alb_pegawai',
															  		'title'=>$this->lang->line('alb_pegawai_help'),
															  		'class'=>'form-control'),
															  		TRUE,
															  		TRUE,
															  		'master_none'); ?>
									<span class="help-block"><?php echo $this->lang->line('alb_pegawai_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('alb_laboratorium'); ?></label>
								<div class="col-md-9 input-placement">
									<?php make_object_combobox($laboratorium_penelitian,
															  'lab_id',
															  'lab_name',
															  array('id'=>'alb_laboratorium',
															  		'name'=>'alb_laboratorium',
															  		'title'=>$this->lang->line('alb_laboratorium_help'),
															  		'class'=>'form-control'),
															  		TRUE,
															  		TRUE,
															  		'master_none'); ?>
									<span class="help-block"><?php echo $this->lang->line('alb_laboratorium_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('alb_status_ketua'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="alb_status_ketua" name="alb_status_ketua" type="text" maxlength="1" placeholder="<?php echo $this->lang->line('alb_status_ketua_help'); ?>" title="<?php echo $this->lang->line('alb_status_ketua_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('alb_status_ketua_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('alb_periode_aktif'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="alb_periode_aktif" name="alb_periode_aktif" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('alb_periode_aktif_help'); ?>" title="<?php echo $this->lang->line('alb_periode_aktif_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('alb_periode_aktif_help'); ?></span>
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