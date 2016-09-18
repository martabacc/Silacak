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
								<li><input type="checkbox" data-column="1" checked><?php echo $this->lang->line('usr_username'); ?></li>
								<li><input type="checkbox" data-column="3" checked><?php echo $this->lang->line('usr_email'); ?></li>
								<li><input type="checkbox" data-column="4" checked><?php echo $this->lang->line('usr_name'); ?></li>
								<li><input type="checkbox" data-column="5" checked><?php echo $this->lang->line('usr_fullname'); ?></li>
								<li><input type="checkbox" data-column="6" checked><?php echo $this->lang->line('usr_last_logtime'); ?></li>
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
									<th><?php echo $this->lang->line('usr_username'); ?></th>
									<th><?php echo $this->lang->line('usr_email'); ?></th>
									<th><?php echo $this->lang->line('usr_name'); ?></th>
									<th><?php echo $this->lang->line('usr_fullname'); ?></th>
									<th><?php echo $this->lang->line('usr_issa'); ?></th>
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
						<input type="hidden" id="usr_id" name="usr_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('usr_username'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="usr_username" name="usr_username" type="text" maxlength="60" placeholder="<?php echo $this->lang->line('usr_username_help'); ?>" title="<?php echo $this->lang->line('usr_username_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('usr_username_help'); ?></span>
								</div>
							</div>
							<div class="form-group" id="insert-new-password">
								<label class="control-label col-md-3"><?php echo $this->lang->line('usr_password'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="usr_password" name="usr_password" type="password" maxlength="255" placeholder="" title="<?php echo $this->lang->line('usr_password_help'); ?>" class="form-control" />
									<span class="help-block" id="password-help"><?php echo $this->lang->line('usr_password_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('usr_email'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="usr_email" name="usr_email" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('usr_email_help'); ?>" title="<?php echo $this->lang->line('usr_email_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('usr_email_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('usr_name'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="usr_name" name="usr_name" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('usr_name_help'); ?>" title="<?php echo $this->lang->line('usr_name_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('usr_name_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('usr_fullname'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="usr_fullname" name="usr_fullname" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('usr_fullname_help'); ?>" title="<?php echo $this->lang->line('usr_fullname_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('usr_fullname_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" style="padding-top:15px;"><?php echo $this->lang->line('usr_issa'); ?></label>
								<div class="col-md-9 input-placement">
									<input type="checkbox" id="usr_issa" name="usr_issa" value="1" class="form-control" />
								</div>
							</div>
							<!-- <div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('usr_last_logtime'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="usr_last_logtime" name="usr_last_logtime" type="text"  placeholder="<?php echo $this->lang->line('usr_last_logtime_help'); ?>" title="<?php echo $this->lang->line('usr_last_logtime_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('usr_last_logtime_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('usr_created_at'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="usr_created_at" name="usr_created_at" type="text"  placeholder="<?php echo $this->lang->line('usr_created_at_help'); ?>" title="<?php echo $this->lang->line('usr_created_at_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('usr_created_at_help'); ?></span>
								</div>
							</div> -->
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