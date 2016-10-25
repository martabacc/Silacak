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
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_peneliti'); ?></span>
					</div>
					<div class="actions filter-control">
						<div class="btn-group column-visibility margin-right-10">
							<button type="button" class="btn grey-gallery dropdown-toggle fix-nested-dropdown" data-toggle="dropdown">
								<i class="fa fa-columns"></i> Kolom <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu">
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('peg_name'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('peg_fakultas'); ?></li>
								<li><input type="checkbox" data-column="3" checked><?php echo $this->lang->line('peg_jurusan'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('peg_tarik_1'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('peg_tarik_2'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">

					<div class="masterpage-filter form-inline">
						<div class="filter-part col-md-5">
							<div class="form-group">
								<label class="control-label col-md-4"><?php echo $this->lang->line('peg_fakultas'); ?></label>
								<div class="col-md-8 input-placement">
									<?php make_object_combobox($list_fakultas, 'fak_id', 'fak_singkatan', array('id'=>'filter_fakultas', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="filter-part col-md-5">
							<div class="form-group">
								<label class="control-label col-md-4"><?php echo $this->lang->line('peg_jurusan'); ?></label>
								<div class="col-md-8 input-placement">
									<?php make_object_combobox($list_jurusan, 'jur_id', 'jur_nama_indonesia', array('id'=>'filter_jurusan', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="clearfix"></div>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_reset">Reset</button>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
						<hr class="no-margin"/>
						<a href="#" id="btn-download" class="btn green-seagreen margin-top-10">Download Laporan</a>
					
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('peg_name'); ?></th>
									<th><?php echo $this->lang->line('peg_fakultas'); ?></th>
									<th><?php echo $this->lang->line('peg_jurusan'); ?></th>
									<th><?php echo $this->lang->line('peg_tarik_1'); ?></th>
									<th><?php echo $this->lang->line('peg_tarik_2'); ?></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>