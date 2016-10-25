<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="detail-page portlet light bg-inverse form-fit" >
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_tarik_data'); ?></span>
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body form">
					<form action="javascript:void(0);" method="post" class="form-detail form-horizontal form-bordered form-label-stripped">
						<input type="hidden" id="peg_id" name="peg_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_name'); ?></label>
								<div class="col-md-9 input-placement" >
									<div class="input-group input-large">
										<input id="peg_name" name="peg_name" type="text" class="form-control" readonly  />
										<span class="input-group-btn">
											<a class=" btn green search" onclick="javascript:showModalPegawai()"><i class="fa fa-search"></i> Cari</a>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Tahun</label>
								<div class="col-md-9 input-placement">
									<input id="filter_tahun" name="filter_tahun" type="text" maxlength="255"  title="<?php echo $this->lang->line('peg_google_schoolar_help'); ?>" class="form-control input-small" />
									<span class="help-block"><?php echo $this->lang->line('filter_tahun_tarik_data_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_google_schoolar'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_google_schoolar" name="peg_google_schoolar" type="text" maxlength="255" readonly placeholder="<?php echo $this->lang->line('peg_google_schoolar_help'); ?>" title="<?php echo $this->lang->line('peg_google_schoolar_help'); ?>" class="form-control" />
									<!-- <span class="help-block"><?php echo $this->lang->line('peg_google_schoolar_help'); ?></span> -->
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control">
										<!-- <button type="button" class="btn red-thunderbird mp-cancel-button">
											<i class="fa fa-times"></i> Batal
										</button> -->
										<button id="btn-save" type="button" class="btn green-seagreen mp-save-button">
											<i class="fa fa-download"></i> <span>Tarik Data</span>
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

<div class="modal fade" id="lookup-pegawai" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<!-- <h4><?php echo $this->lang->line('module_pegawai_master'); ?></h4> -->
      </div>
      <div class="modal-body">
      	<div id="master-pegawai">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_master'); ?></span>
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

							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_nomor_ktp'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_nomor_ktp" name="peg_nomor_ktp" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_nomor_ktp_help'); ?>" title="<?php echo $this->lang->line('peg_nomor_ktp_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_nomor_ktp_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_gelar_depan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_gelar_depan" name="peg_gelar_depan" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_gelar_depan_help'); ?>" title="<?php echo $this->lang->line('peg_gelar_depan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_gelar_depan_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_gelar_belakang'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_gelar_belakang" name="peg_gelar_belakang" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_gelar_belakang_help'); ?>" title="<?php echo $this->lang->line('peg_gelar_belakang_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_gelar_belakang_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_tempat_lahir'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_tempat_lahir" name="peg_tempat_lahir" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_tempat_lahir_help'); ?>" title="<?php echo $this->lang->line('peg_tempat_lahir_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_tempat_lahir_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_tanggal_lahir'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_tanggal_lahir" name="peg_tanggal_lahir" type="text"  placeholder="<?php echo $this->lang->line('peg_tanggal_lahir_help'); ?>" title="<?php echo $this->lang->line('peg_tanggal_lahir_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_tanggal_lahir_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_alamat'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_alamat" name="peg_alamat" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_alamat_help'); ?>" title="<?php echo $this->lang->line('peg_alamat_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_alamat_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_telepon'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_telepon" name="peg_telepon" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_telepon_help'); ?>" title="<?php echo $this->lang->line('peg_telepon_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_telepon_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_handphone'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_handphone" name="peg_handphone" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_handphone_help'); ?>" title="<?php echo $this->lang->line('peg_handphone_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_handphone_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_tanggal_berhenti'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_tanggal_berhenti" name="peg_tanggal_berhenti" type="text"  placeholder="<?php echo $this->lang->line('peg_tanggal_berhenti_help'); ?>" title="<?php echo $this->lang->line('peg_tanggal_berhenti_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_tanggal_berhenti_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_tanggal_masuk'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_tanggal_masuk" name="peg_tanggal_masuk" type="text"  placeholder="<?php echo $this->lang->line('peg_tanggal_masuk_help'); ?>" title="<?php echo $this->lang->line('peg_tanggal_masuk_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_tanggal_masuk_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_nomor_sertifikasi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_nomor_sertifikasi" name="peg_nomor_sertifikasi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_nomor_sertifikasi_help'); ?>" title="<?php echo $this->lang->line('peg_nomor_sertifikasi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_nomor_sertifikasi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_tanggal_keluar_sertifikasi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_tanggal_keluar_sertifikasi" name="peg_tanggal_keluar_sertifikasi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_tanggal_keluar_sertifikasi_help'); ?>" title="<?php echo $this->lang->line('peg_tanggal_keluar_sertifikasi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_tanggal_keluar_sertifikasi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_is_dosen'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_is_dosen" name="peg_is_dosen" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_is_dosen_help'); ?>" title="<?php echo $this->lang->line('peg_is_dosen_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_is_dosen_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_periode_pelaporan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_periode_pelaporan" name="peg_periode_pelaporan" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_periode_pelaporan_help'); ?>" title="<?php echo $this->lang->line('peg_periode_pelaporan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_periode_pelaporan_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_penelitian'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_penelitian" name="peg_penelitian" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_penelitian_help'); ?>" title="<?php echo $this->lang->line('peg_penelitian_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_penelitian_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_created_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_created_at" name="peg_created_at" type="text"  placeholder="<?php echo $this->lang->line('peg_created_at_help'); ?>" title="<?php echo $this->lang->line('peg_created_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_created_at_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_updated_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_updated_at" name="peg_updated_at" type="text"  placeholder="<?php echo $this->lang->line('peg_updated_at_help'); ?>" title="<?php echo $this->lang->line('peg_updated_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_updated_at_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_deleted_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_deleted_at" name="peg_deleted_at" type="text"  placeholder="<?php echo $this->lang->line('peg_deleted_at_help'); ?>" title="<?php echo $this->lang->line('peg_deleted_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_deleted_at_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_perguruan_tinggi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_perguruan_tinggi" name="peg_perguruan_tinggi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_perguruan_tinggi_help'); ?>" title="<?php echo $this->lang->line('peg_perguruan_tinggi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_perguruan_tinggi_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_fakultas'); ?></label>
								<div class="col-md-9 input-placement">
									<?php make_object_combobox($fakultas,
															  'fak_id',
															  'fak_name',
															  array('id'=>'peg_fakultas',
															  		'name'=>'peg_fakultas',
															  		'title'=>$this->lang->line('peg_fakultas_help'),
															  		'class'=>'form-control'),
															  		TRUE,
															  		TRUE,
															  		'master_none'); ?>
									<span class="help-block"><?php echo $this->lang->line('peg_fakultas_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_jurusan'); ?></label>
								<div class="col-md-9 input-placement">
									<?php make_object_combobox($jurusan,
															  'jur_id',
															  'jur_name',
															  array('id'=>'peg_jurusan',
															  		'name'=>'peg_jurusan',
															  		'title'=>$this->lang->line('peg_jurusan_help'),
															  		'class'=>'form-control'),
															  		TRUE,
															  		TRUE,
															  		'master_none'); ?>
									<span class="help-block"><?php echo $this->lang->line('peg_jurusan_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_program_studi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_program_studi" name="peg_program_studi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_program_studi_help'); ?>" title="<?php echo $this->lang->line('peg_program_studi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_program_studi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_jenjang_pendidikan'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_jenjang_pendidikan" name="peg_jenjang_pendidikan" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_jenjang_pendidikan_help'); ?>" title="<?php echo $this->lang->line('peg_jenjang_pendidikan_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_jenjang_pendidikan_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_satuan_kerja'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_satuan_kerja" name="peg_satuan_kerja" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_satuan_kerja_help'); ?>" title="<?php echo $this->lang->line('peg_satuan_kerja_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_satuan_kerja_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_ikatan_kerja_pegawai'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_ikatan_kerja_pegawai" name="peg_ikatan_kerja_pegawai" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_ikatan_kerja_pegawai_help'); ?>" title="<?php echo $this->lang->line('peg_ikatan_kerja_pegawai_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_ikatan_kerja_pegawai_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_status_aktivitas_pegawai'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_status_aktivitas_pegawai" name="peg_status_aktivitas_pegawai" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_status_aktivitas_pegawai_help'); ?>" title="<?php echo $this->lang->line('peg_status_aktivitas_pegawai_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_status_aktivitas_pegawai_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_jenis_pegawai'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_jenis_pegawai" name="peg_jenis_pegawai" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_jenis_pegawai_help'); ?>" title="<?php echo $this->lang->line('peg_jenis_pegawai_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_jenis_pegawai_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_jenis_dosen'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_jenis_dosen" name="peg_jenis_dosen" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_jenis_dosen_help'); ?>" title="<?php echo $this->lang->line('peg_jenis_dosen_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_jenis_dosen_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_pangkat_pns'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_pangkat_pns" name="peg_pangkat_pns" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_pangkat_pns_help'); ?>" title="<?php echo $this->lang->line('peg_pangkat_pns_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_pangkat_pns_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_jabatan_fungsional'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_jabatan_fungsional" name="peg_jabatan_fungsional" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_jabatan_fungsional_help'); ?>" title="<?php echo $this->lang->line('peg_jabatan_fungsional_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_jabatan_fungsional_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_jabatan_struktural'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_jabatan_struktural" name="peg_jabatan_struktural" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_jabatan_struktural_help'); ?>" title="<?php echo $this->lang->line('peg_jabatan_struktural_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_jabatan_struktural_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_jenis_kelamin'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_jenis_kelamin" name="peg_jenis_kelamin" type="text"  placeholder="<?php echo $this->lang->line('peg_jenis_kelamin_help'); ?>" title="<?php echo $this->lang->line('peg_jenis_kelamin_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_jenis_kelamin_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_provinsi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_provinsi" name="peg_provinsi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_provinsi_help'); ?>" title="<?php echo $this->lang->line('peg_provinsi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_provinsi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_kota'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_kota" name="peg_kota" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_kota_help'); ?>" title="<?php echo $this->lang->line('peg_kota_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_kota_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_kode_pos'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_kode_pos" name="peg_kode_pos" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_kode_pos_help'); ?>" title="<?php echo $this->lang->line('peg_kode_pos_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_kode_pos_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_kode_validasi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_kode_validasi" name="peg_kode_validasi" type="text" maxlength="3" placeholder="<?php echo $this->lang->line('peg_kode_validasi_help'); ?>" title="<?php echo $this->lang->line('peg_kode_validasi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_kode_validasi_help'); ?></span>
								</div>
							</div> -->
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_log_audit'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_log_audit" name="peg_log_audit" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_log_audit_help'); ?>" title="<?php echo $this->lang->line('peg_log_audit_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_log_audit_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_nip_baru'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_nip_baru" name="peg_nip_baru" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_nip_baru_help'); ?>" title="<?php echo $this->lang->line('peg_nip_baru_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_nip_baru_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_nip_lama'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_nip_lama" name="peg_nip_lama" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_nip_lama_help'); ?>" title="<?php echo $this->lang->line('peg_nip_lama_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_nip_lama_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_nidn'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="peg_nidn" name="peg_nidn" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('peg_nidn_help'); ?>" title="<?php echo $this->lang->line('peg_nidn_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('peg_nidn_help'); ?></span>
								</div>
							</div> -->