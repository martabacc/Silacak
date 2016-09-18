<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
    var pub_fak_tahun = JSON.parse('<?php echo $pub_fak_tahun_json; ?>');
    var listfakultas = JSON.parse('<?php echo $list_fakultas_json; ?>');
    var minyear = <?php echo $minyear; ?>;
    var dataPenarikan = new Array();

    for (var i=0; i<5; i++) {
        dataPenarikan.push({
            label: listfakultas[i].fak_singkatan,
            data: new Array(),
            points: { show: true },
            lines: { show: true}
        })
    }
    
    for (var i=0; i < 5; i++) {
        for (var j=0; j < pub_fak_tahun[i].length; j++) {
            var tahun = j + minyear;
            var jumlah = pub_fak_tahun[i][j];
            var newData = [tahun, jumlah];
            dataPenarikan[i].data.push(newData);
        }
    }

</script>
<div class="row">
	<div class="col-md-12">
        <div class="row margin-bottom-25">
            <div class="col-md-6 col-sm-12">
                <a href="#" id="btn-download" class="btn green-seagreen">Download Laporan</a>
            </div>
        </div>
        <div class="clearfix"></div>
		<div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-folder"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"><?php echo $num_pub_all; ?></span>
                        </div>
                        <div class="desc"><?php echo $this->lang->line('stats_pub_tarik_1'); ?></div>
                    </div>
                    <a class="more" href="<?php echo base_url(); ?>publikasi_dosen">
                        <?php echo $this->lang->line('view_more'); ?>
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-folder-open"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"><?php echo $num_pub_done; ?></span>
                        </div>
                        <div class="desc"><?php echo $this->lang->line('stats_pub_tarik_2'); ?></div>
                    </div>
                    <a class="more" href="<?php echo base_url(); ?>publikasi_dosen?status_tarik=1">
                        <?php echo $this->lang->line('view_more'); ?>
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"><?php echo $num_dosen; ?></span>
                        </div>
                        <div class="desc"><?php echo $this->lang->line('stats_pegawai'); ?></div>
                    </div>
                    <a class="more" href="<?php echo base_url(); ?>report/peneliti">
                        <?php echo $this->lang->line('view_more'); ?>
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-refresh"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="89"></span><?php echo $num_masuk_pdt; ?> </div>
                        <div class="desc"><?php echo $this->lang->line('stats_pdt'); ?></div>
                    </div>
                    <a class="more" href="<?php echo base_url(); ?>log_sinkron">
                        <?php echo $this->lang->line('view_more'); ?>
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-cursor font-purple"></i>
                            <span class="caption-subject font-purple bold uppercase"><?php echo $this->lang->line('stats_yearly_title'); ?></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                             <?php for ($i = 3; $i >= 0; $i--) { ?>
                             <?php $percentage = round($status_per_tahun[$yearnow - $i]["sudah"] / $status_per_tahun[$yearnow - $i]["total"] * 100, 1); ?>
                             	<div class="col-md-3">
	                                <div class="easy-pie-chart">
	                                    <div class="number transactions" data-percent="<?php echo $percentage; ?>">
	                                        <span><?php echo $percentage; ?></span>% </div>
	                                    	<span><?php echo $status_per_tahun[$yearnow - $i]["sudah"] . ' / ' . $status_per_tahun[$yearnow - $i]["total"]; echo '<br />'; echo '('; if ($i==3) echo '<='; echo $yearnow - $i . ')'; ?>
	                                    	</span>
	                                </div>
	                            </div>
								<div class="margin-bottom-10 visible-sm"> </div>
					    	<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-red-sunglo hide"></i>
                            <span class="caption-subject font-red-sunglo bold uppercase">Statistik Publikasi Per Unit Per Tahun</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="stats-penarikan-data" class="display-none">

                            <div id="stats-penarikan"  style="height: 300px;"> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
	</div>
</div>