<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<!-- <div class="note note-warning">
			<p><?php echo $this->lang->line('module_description'); ?></p>
		</div> -->
		<div id="master-page">
			<div class="table-page portlet light bg-inverse">
				<!-- <div class="portlet-title">
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
								<li><input type="checkbox" data-column="1"><?php echo $this->lang->line('pub_detilkodepub'); ?></li>
								<li><input type="checkbox" data-column="12" checked><?php echo $this->lang->line('pub_tahun'); ?></li>
								<li><input type="checkbox" data-column="14" checked><?php echo $this->lang->line('pub_judul'); ?></li>
								<li><input type="checkbox" data-column="19" checked><?php echo $this->lang->line('pub_pengarang'); ?></li>
								<li><input type="checkbox" data-column="20" checked><?php echo $this->lang->line('pub_keterangan'); ?></li>
								<li><input type="checkbox" data-column="26" checked><?php echo $this->lang->line('pub_created_at'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div> -->
				<div class="portlet-body">
					<div class="masterpage-filter form-inline" >
						<div class="filter-part">
							<?php echo $this->lang->line('pub_filterstart'); ?> : <input type="text" id="filter_year" class="form-control input-small mask-integer filter-text" value="<?php echo $year; ?>" />
						</div> 
						<div class="clearfix"></div>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_reset">Reset</button>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
						<hr class="no-margin"/>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-red-sunglo bold uppercase">Statistik Pengunduhan Data per Bulan</span>
                                        <span class="caption-helper">Tahun <span id="caption-helper-tahun"><?php echo $year;?></span></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="stats-penarikan-data" class="display-none">

                                        <div id="stats-penarikan" style="height: 228px;"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
					</div>
					<a href="#" id="btn-download" class="btn green-seagreen">Download Laporan</a>
					<div class="table-scrollable">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th ><?php echo $this->lang->line('pub_bulan'); ?></th>
									<th ><?php echo $this->lang->line('pub_tahun'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_total'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($result) == 0): ?>
								<tr>
									<td colspan="3" class="text-center">Data Tidak Ditemukan</td>
								</tr>
								<?php endif; ?>
								<?php $number = 1; foreach ($result as $key => $value) { ?>
								<tr>
									<td><?php echo $number++; ?></td>
									<td ><?php echo get_month_name($value->month); ?></th>
									<td ><?php echo $value->year; ?></th>
									<td class="text-right" ><?php echo number_format($value->jumlah,0,',','.'); ?></th>
								</tr>	
								<?php } ?>
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php echo "var dataPenarikan = ["; 
		foreach ($result as $key => $value) { 
			echo "['".substr(get_month_name($value->month),0,3)."',".$value->jumlah."],";
		}
	echo "];"?>
</script>