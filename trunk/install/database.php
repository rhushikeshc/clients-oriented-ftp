<?php
$timestampdate = time();
$query = '
CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `client_user` varchar('.MAX_USER_CHARS.') COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `address` text COLLATE latin1_general_ci NOT NULL,
  `phone` text COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `notify` tinyint(1) NOT NULL,
  `contact` text COLLATE latin1_general_ci NOT NULL,
  `timestamp` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=62 ;
';

$query2 = '
CREATE TABLE IF NOT EXISTS `tbl_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `filename` text NOT NULL,
  `description` text NOT NULL,
  `client_user` varchar('.MAX_USER_CHARS.') NOT NULL,
  `timestamp` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=257 ;
';

$query3 = '
CREATE TABLE IF NOT EXISTS `tbl_options` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `value` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;
';


$query4 = '
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar('.MAX_USER_CHARS.') NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `timestamp` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;
';

$query5 = '
INSERT INTO `tbl_options` (`id`, `name`, `value`) VALUES
(1, \'base_uri\', \''.$base_uri.'\'),
(2, \'max_thumbnail_width\', \'100\'),
(3, \'max_thumbnail_height\', \'100\'),
(4, \'thumbnails_folder\', \'../../img/custom/thumbs/\'),
(5, \'thumbnail_default_quality\', \'90\'),
(6, \'max_logo_width\', \'300\'),
(7, \'max_logo_height\', \'300\'),
(8, \'this_install_title\', \''.$this_install_title.'\'),
(9, \'selected_clients_template\', \'default\'),
(10, \'logo_thumbnails_folder\', \'/img/custom/thumbs\'),
(11, \'timezone\', \'America/Argentina/Buenos_Aires\'),
(12, \'timeformat\', \'d/m/Y\'),
(13, \'allowed_file_types\', \'bmp|jpg|jpeg|gif|png|rar|tar|gz|gzip|z|zip|7z|ace|iso|bin|tiff|tif|mpg|avi|mp4|flv|wav|mp3|oog|txt|rtf|doc|docx|xls|xlsx|odt|fla|html|htm|psd|ai|eps|pdf|cdr\');
';

$query6 = '
INSERT INTO `tbl_users` (`id`, `user`, `password`, `name`, `email`, `level`, `timestamp`) VALUES
(1, \'admin\', \''.$got_admin_pass.'\', \''.$got_admin_name.'\', \''.$got_admin_email.'\', 9, '.$timestampdate.');
';

$success = mysql_query($query); mysql_query($query2); mysql_query($query3); mysql_query($query4); mysql_query($query5); mysql_query($query6);
if ($success) {
	$query_state = 'ok';
}
else {
	$query_state = 'err';
}
?>