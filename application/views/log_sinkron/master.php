<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
	var list_jurusan = JSON.parse('<?php echo $list_jurusan_json; ?>');	
</script>

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
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('pub_judul'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('pub_pengarang'); ?></li>
								<li><input type="checkbox" data-column="3" checked><?php echo $this->lang->line('snk_tanggal'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('snk_action'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('snk_distance'); ?></li>
								<li><input type="checkbox" data-column="6" checked><?php echo $this->lang->line('snk_status'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline">
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-3"><?php echo $this->lang->line('snk_filterstart'); ?></label>
								<div class="col-md-9">
									<div class="input-group input-medium date-picker input-daterange" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control input-medium" id="filter_startdate" style="text-align: left">
                                        <span class="input-group-addon"><?php echo $this->lang->line('snk_filterend'); ?></span>
                                        <input type="text" class="form-control input-medium" id="filter_enddate" style="text-align: left"> 
                                    </div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-3"><?php echo $this->lang->line('snk_status'); ?></label>
								<div class="col-md-9">
									<?php make_combobox($status, array('id'=>'filter_status','name'=>'filter_status', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_reset">Reset</button>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
						
						<hr class="margin"/>
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-3">Fakultas</label>
								<div class="col-md-9">
									<?php make_object_combobox($filter_fakultas, 'fak_id', 'fak_singkatan', array('id'=>'filter_fakultas', 'class'=>'form-control input-medium'), FALSE, FALSE); ?>
								</div>
							</div>
						</div>
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-3">Jurusan</label>
								<div class="col-md-9">
									<?php make_object_combobox($filter_jurusan, 'jur_id','jur_nama_indonesia', array('id'=>'filter_jurusan', 'class'=>'form-control input-medium'), FALSE, FALSE); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button type="button" class="btn red btn-sm" id="btn_clear">Bersihkan PDT</button>
						<button type="button" class="btn blue btn-sm" id="btn_sync">Sinkronkan PDT</button>

						<hr class="margin"/>
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('pub_judul'); ?></th>
									<th><?php echo $this->lang->line('pub_pengarang'); ?></th>
									<th><?php echo $this->lang->line('snk_tanggal'); ?></th>
									<th><?php echo $this->lang->line('snk_action'); ?></th>
									<th><?php echo $this->lang->line('snk_distance'); ?></th>
									<th><?php echo $this->lang->line('snk_status'); ?></th>
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
						<input type="hidden" id="snk_id" name="snk_id"/>
						<input type="hidden" id="pub_id" name="pub_id"/>
						<input type="hidden" id="snk_pdt" name="snk_pdt"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_judul'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="pub_judul" name="pub_judul" type="text"  placeholder="<?php echo $this->lang->line('pub_judul_help'); ?>" title="<?php echo $this->lang->line('pub_judul_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_judul_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_judul'); ?> PDT</label>
								<div class="col-md-9 input-placement">
									<input id="pdt_judul" name="pdt_judul" type="text" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_judul_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_pengarang'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="pub_pengarang" name="pub_pengarang" type="text"  placeholder="<?php echo $this->lang->line('pub_pengarang_help'); ?>" title="<?php echo $this->lang->line('pub_pengarang_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_pengarang_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('snk_tanggal'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="snk_tanggal" name="snk_tanggal" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('snk_tanggal_help'); ?>" title="<?php echo $this->lang->line('snk_tanggal_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('snk_tanggal_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('snk_action'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="snk_action" name="snk_action" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('snk_action_help'); ?>" title="<?php echo $this->lang->line('snk_action_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('snk_action_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('snk_distance'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="snk_distance" name="snk_distance" type="text"  placeholder="<?php echo $this->lang->line('snk_distance_help'); ?>" title="<?php echo $this->lang->line('snk_distance_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('snk_distance_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('snk_status'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="snk_status" name="snk_status" type="text" maxlength="1000" placeholder="<?php echo $this->lang->line('snk_status_help'); ?>" title="<?php echo $this->lang->line('snk_status_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('snk_status_help'); ?></span>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control">
										<button id="btn-insert-pdt" class="btn green-seagreen btn-verify"><i class="fa fa-floppy-o"></i> Insert</button>
										<button id="btn-update-pdt" class="btn green-seagreen btn-verify"><i class="fa fa-floppy-o"></i> Update</button>
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