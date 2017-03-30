<?php

define('EMAIL_FOR_REPORTS', 'srsharathreddy@gmail.com');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-dark.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#545e56;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Sign Up</h2></div>
	<div class="element-select<?php frmd_add_class("select"); ?>" title="Designation"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="select" required="required">

		<option value="Designation">Designation</option>
		<option value="Student">Student</option>
		<option value="Instructor">Instructor</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-input<?php frmd_add_class("input5"); ?>" title="User Name"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input5" required="required" placeholder="User Name"/><span class="icon-place"></span></div></div>
	<div class="element-password<?php frmd_add_class("password1"); ?>" title="Password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password1" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	<div class="element-password<?php frmd_add_class("password"); ?>" title="Password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	<div class="element-name<?php frmd_add_class("name"); ?>"><label class="title"></label><span class="nameFirst"><input placeholder="Name First" type="text" size="8" name="name[first]" /><span class="icon-place"></span></span><span class="nameLast"><input placeholder="Name Last" type="text" size="14" name="name[last]" /><span class="icon-place"></span></span></div>
	<div class="element-checkbox<?php frmd_add_class("checkbox"); ?>" title="Gender"><label class="title">Checkboxes</label>		<div class="column column1"><label><input type="checkbox" name="checkbox[]" value="Male"/ ><span>Male</span></label><label><input type="checkbox" name="checkbox[]" value="Female"/ ><span>Female</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-file<?php frmd_add_class("file"); ?>"><label class="title"></label><div class="item-cont"><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="file" /><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-solid-dark.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>