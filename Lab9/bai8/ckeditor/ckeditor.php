<?php
class CKEditor
{
	public $basePath = '/ckeditor/';

	public function replace($id)
	{
		echo "<script type=\"text/javascript\">CKEDITOR.replace('" . addslashes($id) . "');</script>";
	}

	public function replaceall()
	{
		echo "<script type=\"text/javascript\">CKEDITOR.replaceAll();</script>";
	}
}
?>

