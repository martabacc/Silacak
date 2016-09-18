<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
	var jurusan = JSON.parse('<?php echo $list_jurusan; ?>');
</script>

<div class="row">
	<div class="col-md-12">
		<div id="master-page-anggota">
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
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('pub_tahun'); ?></li>
								<li><input type="checkbox" data-column="2" checked><?php echo $this->lang->line('pub_judul'); ?></li>
								<li><input type="checkbox" data-column="3" checked><?php echo $this->lang->line('pub_detilkodepub'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('pub_keterangan'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('peg_name'); ?></li>
								<li><input type="checkbox" data-column="6" checked><?php echo $this->lang->line('ang_sebagai'); ?></li>
								<li><input type="checkbox" data-column="7"><?php echo $this->lang->line('peg_fakultas'); ?></li>
								<li><input type="checkbox" data-column="8"><?php echo $this->lang->line('peg_jurusan'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline">
						<div class="filter-part col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5"><?php echo $this->lang->line('pub_detilkodepub'); ?></label>
								<div class="col-md-7 input-placement" style="padding-left: 1px">
									<?php make_object_combobox($detil_kode_publikasi, 'dkp_id', 'dkp_keterangan', array('id'=>'filter_detil_kode_publikasi', 'title'=>$this->lang->line('dkp_id_help'), 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-10">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_filterstart'); ?></label>
								<div class="col-md-9 input-placement">
									<div class="input-group" style="padding-left: 0px">
										<input type="text" id="filter_startyear" class="form-control input-medium mask-integer" />
										<span class="input-group-addon"><?php echo $this->lang->line('pub_filterend'); ?></span>
										<input type="text" id="filter_endyear" class="form-control input-medium mask-integer" />
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="form-group">
								<label class="control-label col-md-6"><?php echo $this->lang->line('peg_fakultas'); ?></label>
								<div class="col-md-6 input-placement" style="padding-left: 5px">
									<?php make_object_combobox($fakultas, 'fak_id', 'fak_singkatan', array('id'=>'filter_fakultas', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="filter-part col-md-5">
							<div class="form-group">
								<label class="control-label col-md-5"><?php echo $this->lang->line('pub_judul'); ?></label>
								<div class="col-md-7 input-placement" style="padding-left: 21px">
									<input type="text"  id="filter_judul" class="form-control input-medium" />
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="form-group">
								<label class="control-label col-md-6"><?php echo $this->lang->line('peg_jurusan'); ?></label>
								<div class="col-md-6 input-placement" style="padding-left: 6px">
									<?php make_object_combobox($jurusan, 'jur_id', 'jur_nama_indonesia', array('id'=>'filter_jurusan', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="filter-part col-md-5">
							<div class="form-group">
								<label class="control-label col-md-5"><?php echo $this->lang->line('peg_name'); ?></label>
								<div class="col-md-7 input-placement" style="padding-left: 0px">
									<input id="filter_pegawai" name="filter_pegawai" type="hidden" />
									<div class="input-group input-medium">
										<input id="peg_name" name="peg_name" type="text" class="form-control" readonly style="cursor:pointer"  />
										<span class="input-group-btn">
											<a class=" btn green search" onclick="javascript:showModalPegawai(0)"><i class="fa fa-search"></i></a>
										</span>
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
									<th><?php echo $this->lang->line('pub_tahun'); ?></th>
									<th><?php echo $this->lang->line('pub_judul'); ?></th>
									<th><?php echo $this->lang->line('pub_detilkodepub'); ?></th>
									<th><?php echo $this->lang->line('pub_keterangan'); ?></th>
									<th><?php echo $this->lang->line('peg_name'); ?></th>
									<th><?php echo $this->lang->line('ang_sebagai'); ?></th>
									<th><?php echo $this->lang->line('peg_fakultas'); ?></th>
									<th><?php echo $this->lang->line('peg_jurusan'); ?></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</form>
				</div>
				<button class="btn"><?php echo $this->lang->line('pub_synchronize'); ?> <i class="fa fa-save"></i></button>
			</div>
			
			<?php echo $pub_view ?>
		</div>
	</div>
</div>

<div class="modal fade" id="lookup-pegawai-anggota" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<!-- <h4><?php echo $this->lang->line('module_pegawai_master'); ?></h4> -->
      </div>
      <div class="modal-body">
      	<div id="master-pegawai-anggota">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_pegawai_master'); ?></span>
					</div>
					<div class="actions filter-control">
						<div class="btn-group column-visibility margin-right-10">
							
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
									<th><?php echo $this->lang->line('peg_fakultas'); ?></th>
									<th><?php echo $this->lang->line('peg_jurusan'); ?></th>
									<th><?php echo $this->lang->line('peg_program_studi'); ?></th>
									<th><?php echo $this->lang->line('peg_jenjang_pendidikan'); ?></th>
									<th><?php echo $this->lang->line('peg_satuan_kerja'); ?></th>
									<th><?php echo $this->lang->line('peg_ikatan_kerja_pegawai'); ?></th>
									<th><?php echo $this->lang->line('peg_status_aktivitas_pegawai'); ?></th>
									<th><?php echo $this->lang->line('peg_jenis_pegawai'); ?></th>
									<th><?php echo $this->lang->line('peg_jenis_dosen'); ?></th>
									<th><?php echo $this->lang->line('peg_pangkat_pns'); ?></th>
									<th><?php echo $this->lang->line('peg_jenis_kelamin'); ?></th>
									<th><?php echo $this->lang->line('peg_provinsi'); ?></th>
									<th><?php echo $this->lang->line('peg_kota'); ?></th>
									<th><?php echo $this->lang->line('peg_kode_validasi'); ?></th>
									<th><?php echo $this->lang->line('peg_log_audit'); ?></th>
									<th><?php echo $this->lang->line('peg_nip_baru'); ?></th>
									<th><?php echo $this->lang->line('peg_nip_lama'); ?></th>
									<th><?php echo $this->lang->line('peg_nidn'); ?></th>
									<th><?php echo $this->lang->line('peg_name'); ?></th>
									<th><?php echo $this->lang->line('peg_gelar_depan'); ?></th>
									<th><?php echo $this->lang->line('peg_gelar_belakang'); ?></th>
									<th><?php echo $this->lang->line('peg_alamat'); ?></th>
									<th><?php echo $this->lang->line('peg_telepon'); ?></th>
									<th><?php echo $this->lang->line('peg_handphone'); ?></th>
									<th><?php echo $this->lang->line('peg_email'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_berhenti'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_masuk'); ?></th>
									<th><?php echo $this->lang->line('peg_is_dosen'); ?></th>
									<th><?php echo $this->lang->line('peg_google_schoolar'); ?></th>
									<th><?php echo $this->lang->line('peg_penelitian'); ?></th>
									<th><?php echo $this->lang->line('peg_created_at'); ?></th>
									<th><?php echo $this->lang->line('peg_updated_at'); ?></th>
									<th><?php echo $this->lang->line('peg_deleted_at'); ?></th>
									<th><?php echo $this->lang->line('peg_fakultas'); ?></th>
									<th><?php echo $this->lang->line('peg_jurusan'); ?></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
